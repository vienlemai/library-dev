<?php

class BaseController extends Controller {
    /**
     * for pagination: the number of items per page
     */
    const ITEMS_PER_PAGE = 20;

    public function __construct() {
        $this->beforeFilter(function() {
            //$configs = Session::get('LibConfig');
            //var_dump($configs); exit();
            if (!Session::has('LibConfig')) {
                $configs = DB::table('configs')->get();
                foreach ($configs as $config) {
                    Session::set('LibConfig.' . $config->key, $config->value);
                }
            }
        });

        //$reader = Reader::with('circulations', 'circulations.bookItem', 'circulations.bookItem.book')
        //      ->get()->find(100);
        //var_dump($reader->circulations);
        //var_dump($reader);exit();
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

}
