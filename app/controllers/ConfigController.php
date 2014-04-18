<?php

class ConfigController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function edit() {
        $configs = Configs::all();
        return View::make('config.edit', array('configs' => $configs));
    }

    public function update() {
        $v = Configs::validate(Input::all());
        if ($v->passes()) {
            $inputs = Input::except('_token');
            foreach ($inputs as $k => $v) {
                Configs::where('key', '=', $k)->update(array('value' => $v));
            }

            $configs = Session::get('LibConfig');
            foreach ($configs as $k => $v) {
                Session::forget('LibConfig.' . $k);
            }
            $configs = DB::table('configs')->get();
            foreach ($configs as $config) {
                Session::push('LibConfig.' . $config->key, $config->value);
            }
            Session::flash('success', 'Lưu thành công cấu hình');
            return Redirect::to('configs');
        } else {
            var_dump($v->messages());
            exit('error');
            return Redirect::to('configs')->withInput()->withErrors($v->messages());
        }
    }

}
