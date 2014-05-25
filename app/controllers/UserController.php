<?php

class UserController extends BaseController {
    /**
     * The layout that should be used for responses.
     */
    protected $layout = 'layouts.admin';

    public function index() {
        $users = User::with('group')->orderBy('created_at', 'DESC')->paginate(self::ITEMS_PER_PAGE);
        return View::make('user.index', array('users' => $users));
    }

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
                $account = new Account(array(
                    'username' => Input::get('username'),
                    'password' => Hash::make(Input::get('password')),
                ));
                $user->beforeCreat();
                $user->beforeSave();
                $user->save();
                $user->account()->save($account);
                $user->afterCreate();
                Session::flash('success', 'Tạo mới thành công nhân viên "' . $user->full_name . '"');
                return Redirect::route('users');
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
        foreach (Permission::$ACTIONS as $k => $v) {
            $permissions[$k] = $v['title'];
        }
        $defaultPermissions = json_decode($user->group->permissions);
        $curentPermissions = $user->permissions;
        foreach ($defaultPermissions as $k) {
            unset($permissions[$k]);
        }
        return View::make('user.permission', array(
                'user' => $user,
                'groups' => $groups,
                'permissions' => $permissions,
                'curentPermissions' => json_decode($curentPermissions)
        ));
    }

    public function postPermission($id) {
        $permissions = array();
        $user = User::findOrFail($id);
        if (Input::has('permissions')) {
            foreach (Input::get('permissions') as $p) {
                array_push($permissions, (int) $p);
            }
        }
        $permissions = json_encode($permissions);
        //dd($user);
        $user->beforeSave();
        $user->update(array('permissions' => $permissions));
        Session::flash('success', 'Phân quyền thành công');
        return Redirect::route('users');
    }

    public function view($id) {
        $user = User::findOrFail($id);
        return View::make('user.view', array('user' => $user));
    }

    public function edit($id) {
        $user = User::findOrFail($id);
        $groupsTmp = Group::all();
        foreach ($groupsTmp as $tmp) {
            $groups[$tmp->id] = $tmp->name;
        }
        return View::make('user.edit', array('user' => $user, 'groups' => $groups));
    }

    public function update($id) {
        $user = User::findOrFail($id);
        $v = User::validate(Input::all());
        if ($v->passes()) {
            $user->full_name = Input::get('full_name');
            $user->email = Input::get('email');
            $user->password = Hash::make(Input::get('password'));
            $user->sex = Input::get('sex');
            $user->group_id = Input::get('group_id');
            $user->date_of_birth = Input::get('date_of_birth');
            $user->beforeSave();
            $user->save();
            Session::flash('success', 'Sửa thành công thông tin nhân viên "' . $user->full_name . '"');
            return Redirect::route('users');
        } else {
            return Redirect::back()->withInput()->withErrors($v->messages());
        }
    }

    public function delete($id) {
        $user = User::findOrFail($id);
        User::where('id', '=', $id)->delete();
        Session::flash('error', 'Đã xóa nhân viên "' . $user->full_name . '"');
        return Redirect::route('users');
    }

    public function search() {
        $keyword = Input::get('keyword');
        $users = User::with('group')
            ->where('full_name', 'like', '%' . $keyword . '%')
            ->orderBy('created_at', 'DESC')
            ->paginate(self::ITEMS_PER_PAGE);
        return View::make('user.partials.index', array('users' => $users));
    }

}
