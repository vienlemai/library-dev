<?php

class UserController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function create() {
        $groupsTmp = Group::all();
        foreach ($groupsTmp as $tmp) {
            $groups[$tmp->id] = $tmp->name;
        }
        $this->layout->content = View::make('user.create', array('groups' => $groups));
    }

    public function save() {
        $v = User::validate(Input::all());
        if ($v->passes()) {
            $user = User::where('username', '=', Input::get('username'))->first();
            if (empty($user)) {
                $user = new User(Input::all());
                $user->password = Hash::make(Input::get('password'));
                $user->save();
                return Redirect::back()->withInput();
            } else {
                Session::flash('error', 'Tên đăng nhập này đã tồn tại');
                return Redirect::back()->withInput();
            }
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function getPermission($id) {
        $user = User::with('group')->findOrFail($id);
        $groupsTmp = Group::all();
        foreach ($groupsTmp as $tmp) {
            $groups[$tmp->id] = $tmp->name;
        }
        foreach (Group::$ACTIONS as $k => $v) {
            $permissions[$k] = $v['title'];
        }
        $defaultPermissions = json_decode($user->group->permissions);
        foreach ($defaultPermissions as $k) {
            unset($permissions[$k]);
        }
        return View::make('user.permission', array('user' => $user, 'groups' => $groups, 'permissions' => $permissions));
    }

    public function postPermission($id) {
        var_dump(Input::all());
        exit();
    }

}
