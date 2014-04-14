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
					Session::push('LibConfig.' . $config->key, $config->value);
				}
			}
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

}
