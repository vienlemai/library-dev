<?php

function setActiveMenu($current, $menu) {
    return $current == $menu ? 'active' : '';
}

function activityRangesForSelect() {
    $options = array(
        '' => 'Tất cả'
    );
    return array_merge($options, Activity::$DATE_RANGES);
}

function activityGroupsForSelect() {
    $options = array(
        '' => 'Tất cả'
    );
    return array_merge($options, Activity::$GROUPS_TO_NAMES);
}