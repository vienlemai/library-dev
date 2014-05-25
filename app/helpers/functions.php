<?php

function setActiveMenu($current, $menu) {
    return $current == $menu ? 'active' : '';
}

function activityRangesForSelect() {
    $options = array(
        'all' => 'Tất cả'
    );
    return array_merge($options, Activity::$DATE_RANGES);
}

function activityGroupsForSelect() {
    $options = array(
        'all' => 'Tất cả'
    );
    return array_merge($options, Activity::$GROUPS_TO_NAMES);
}

function bookTypesForSelect() {
    $options = array(
        'all' => 'Tất cả'
    );
    foreach (Book::$TYPE_TO_LABELS as $key => $value) {
        $options[$key . ''] = $value;
    }
    return $options;
}