<?php

class BaseController extends Controller {
    /**
     * for pagination: the number of items per page
     */
    const ITEMS_PER_PAGE = 20;

    public function __construct() {
        $this->beforeFilter(function() {
            if (!Session::has('LibConfig')) {
                $configs = DB::table('configs')->get();
                foreach ($configs as $config) {
                    Session::set('LibConfig.' . $config->key, $config->value);
                }
            }
            $modules = array();
            if (Auth::check()) {
                $user = Auth::user();
                $modules = array_merge(json_decode($user->permissions), json_decode($user->group->permissions));
            }
            View::share('modules', $modules);
        });
        // Log request infor to the output of artisan serve 
        $this->afterFilter(function($route, $request, $response) {
            $log = "=========================================================================================\n";
            $log .= "Started " . Request::getMethod() . ' ' . Request::url() . "\n";
            $log .= "Processing by " . Route::currentRouteAction() . "\n";
            $requestType = 'HTML';
            if (Request::ajax()) {
                $requestType = 'AJAX';
            }
            $log .= "Type: " . $requestType . "\n";
            $log .= "Parameters: " . json_encode(Input::all()) . "\n";

            $log .= "=========================================================================================\n";
            file_put_contents('php://stdout', $log);
        });
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

}
