<?php

class ActivityController extends \BaseController {

    public function search() {
        $activities = Activity::search(Input::only('group', 'range'))
            ->paginate(Activity::PER_PAGE);
        return View::make('activity._listing')
                ->with('activities', $activities);
    }

}