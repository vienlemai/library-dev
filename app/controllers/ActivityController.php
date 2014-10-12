<?php

class ActivityController extends \BaseController {

    public function search() {
        $activities = Activity::search(Input::only('group', 'range'))
            ->paginate(50);
        return View::make('activity._listing')
                ->with('activities', $activities);
    }

    public function deleteAll() {
        DB::table('activities')
            ->truncate();
        Session::flash('success', 'Xóa thành công tất cả các hoạt động của thư viện');
        return Redirect::back();
    }

}
