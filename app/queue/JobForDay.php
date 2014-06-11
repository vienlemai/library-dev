<?php

class JobForDay {
    protected static $dayForRemind = 7;
    protected static $mailRemindTitle = 'Nhắc nhở trả tài liệu cho thư viện';

    public static function updateStatus() {
        $readers = Reader::get();
        $now = Carbon\Carbon::now();
        foreach ($readers as $reader) {
            $diff = $now->diffInDays($reader->expired_at);
            if ($reader->expired_at->lt($now) && $diff > 0) {
                Reader::where('id', '=', $reader->id)
                    ->update(array('expired' => true));
            }
        }
        $circulations = Circulation::get();
        foreach ($circulations as $circulation) {
            $diff = $now->diffInDays($circulation->expired_at);
            if ($circulation->expired_at->lt($now) && $diff > 0) {
                Circulation::where('id', '=', $circulation->id)
                    ->update(array('expired' => true));
            }
        }
    }

    public static function sendRemindCirculation() {
        $remindReaders = Reader::whereHas('circulations', function($query) {
                $query->where('is_lost', false)
                    ->where('is_reminded', false);
            })->get();
        $now = Carbon\Carbon::now();
        foreach ($remindReaders as $reader) {
            $circulations = Circulation::with('bookItem.book')
                ->where('returned', false)
                ->where('is_reminded', false)
                ->where('reader_id', $reader->id)
                ->get();
            $dayForRemind = self::$dayForRemind;
            $remindCirculations = $circulations->filter(function($item)use ($now, $dayForRemind) {
                if ($now->diffInDays($item->expired_at) <= $dayForRemind) {
                    return $item;
                }
            });
            if ($remindCirculations->count() > 0) {
                $mailTitle = self::$mailRemindTitle;
                try {
                    Mail::send('admin.mail_remind', array(
                        'full_name' => $reader->full_name,
                        'circulations' => $remindCirculations,
                        ), function($message) use ($mailTitle, $reader) {
                        $message->to($reader->email, $reader->full_name)->subject($mailTitle);
                    });
                    foreach ($remindCirculations as $circulation) {
                        $circulation->is_reminded = true;
                        $circulation->save();
                    }
                } catch (Exception $exc) {
                    return false;
                }
            }
        }
        return true;
    }

}
