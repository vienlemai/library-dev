<?php

class BaseController extends Controller {
	/**
	 * for pagination: the number of items per page
	 */
	const ITEMS_PER_PAGE = 2;

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
