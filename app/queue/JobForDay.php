<?php

class JobForDay {
    protected $dayForRemind = 7;
    protected $mailRemindTitle = 'Nhắc nhở trả tài liệu cho thư viện';

    public function updateStatus($job, $data) {
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
        $job->delete();
    }

    public function sendRemindCirculation($job, $data) {
        $remindReaders = Reader::readerBorrowing();
        $now = Carbon\Carbon::now();
        foreach ($remindReaders as $reader) {
            $circulations = Circulation::with('bookItem.book')
                ->where('returned', false)
                ->where('reader_id', $reader->id)
                ->get();
            $dayForRemind = $this->dayForRemind;
            $remindCirculations = $circulations->filter(function($item)use ($now, $dayForRemind) {
                if ($now->diffInDays($item->expired_at) <= $dayForRemind) {
                    return $item;
                }
            });
            $mailTitle = $this->mailRemindTitle;
            Mail::send('admin.mail_remind', array('full_name' => $reader->full_name, 'circulations' => $remindCirculations), function($message) use ($mailTitle, $reader) {
                $message->to($reader->email, $reader->full_name)->subject($mailTitle);
            });
        }
        $job->delete();
    }

}