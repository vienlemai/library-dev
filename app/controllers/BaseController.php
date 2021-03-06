<?php

class BaseController extends Controller {
    /**
     * for pagination: the number of items per page
     */
    const ITEMS_PER_PAGE = 30;

    protected $configs;

    public function __construct() {
        $this->beforeFilter(function() {
            $modules = array();
            if (Auth::check()) {
                if (Auth::user()->loginable_type == 'User') {
                    $user = Auth::user()->loginable;
                    $modules = array_merge(json_decode($user->permissions), json_decode($user->group->permissions));
                }
                View::share('modules', $modules);
                $lastExecuteObj = DB::table('configs')
                    ->where('key', 'last_execute')
                    ->remember(120)
                    ->first();
                $lastExecute = Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $lastExecuteObj->value);
                $now = Carbon\Carbon::now();
                if ($now->diffInDays($lastExecute) !== 0) {
                    JobForDay::updateStatus();
//                    if (!JobForDay::sendRemindCirculation()) {
//                        if (Route::currentRouteName() !== 'error') {
//                            return Redirect::route('error', array('internet'));
//                        }
//                    }
                    DB::table('configs')
                        ->where('key', 'last_execute')
                        ->update(array('value' => Carbon\Carbon::now()->format('Y-m-d H:i:s')));
                }
            }
        });
        $configs = DB::table('configs')->remember(120)->get();
        foreach ($configs as $config) {
            $this->configs[$config->key] = $config->value;
        }
        View::share('configs', $this->configs);
    }

    /**
     * Setup the layout used by the controller.
     *
     * @return void
     */
    protected function setupLayout() {
        if (!is_null($this->layout)) {
            $this->layout = View::make($this->layout);
        }
    }

    /**
     * Generate the last digit number for barcode
     */
    public function ean13_check_digit($digits) {
        $digits = (string) $digits;
        $even_sum = $digits{1} + $digits{3} + $digits{5} + $digits{7} + $digits{9} + $digits{11};
        $even_sum_three = $even_sum * 3;
        $odd_sum = $digits{0} + $digits{2} + $digits{4} + $digits{6} + $digits{8} + $digits{10};
        $total_sum = $even_sum_three + $odd_sum;
        $next_ten = (ceil($total_sum / 10)) * 10;
        $check_digit = $next_ten - $total_sum;
        return $digits . $check_digit;
    }

    protected function _checkInventory() {
        $inventoryDoing = Inventory::where('status', '=', Inventory::SS_DOING)->first();
        if ($inventoryDoing === null) {
            return true;
        } else {
            return false;
        }
    }

    protected function addMailToQueue($to, $subject, $content) {
        DB::table('mail_queues')
            ->insert(array(
                'mail_from' => '',
                'mail_to' => $to,
                'subject' => $subject,
                'content' => $content,
                'created_at' => Carbon\Carbon::now(),
                'updated_at' => Carbon\Carbon::now(),
        ));
    }

    protected function _countCirculationScope($circulations) {
        $countLocal = $circulations->filter(function($item) {
            if ($item->scope == Book::SCOPE_LOCAL) {
                return $item;
            }
        });
        return array(
            'local' => $countLocal->count(),
            'remote' => $circulations->count() - $countLocal->count(),
        );
    }

    protected function _countOrderScope($orders) {
        $countLocal = $orders->filter(function($item) {
            if ($item->scope == Book::SCOPE_LOCAL) {
                return $item;
            }
        });
        return array(
            'local' => $countLocal->count(),
            'remote' => $orders->count() - $countLocal->count(),
        );
    }

}
