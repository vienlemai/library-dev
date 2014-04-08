<?php

class ConfigController extends BaseController {
	/**
	 * The layout that should be used for responses.
	 */
	protected $layout = 'layouts.admin';

	public function edit() {
		$configs = Configs::all();
		return View::make('config.edit',array('configs'=>$configs));
	}
	
	public function update(){
		$inputs = Input::except('_token');
		foreach($inputs as  $k =>$v){
			Configs::where('key','=',$k)->update(array('value'=>$v));
		}
		Session::flash('success','Lưu thành công cấu hình');
		return Redirect::to('configs');
		
	}
	
	
}
