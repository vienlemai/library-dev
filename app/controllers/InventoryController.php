<?php

class InventoryController extends \BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        
    }

    public function create() {
        return View::make('inventory.create');
    }

    public function save() {
        $v = Inventory::validate(Input::all());
        if ($v->passes()) {
            $inventory = new Inventory(array(
                'title' => Input::get('title'),
                'reason' => Input::get('reason'),
            ));
            $inventory->save();
            return Redirect::route('inventory.excute', $inventory->id);
        } else {
            Former::withErrors($v->messages());
            return Redirect::route('inventory.create')->withInput()->withErrors($v->messages());
        }
    }

    public function excute($id) {
        $inventory = Inventory::find($id);
        return View::make('inventory.excute', array('inventory' => $inventory));
    }

}
