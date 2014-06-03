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

function storagesToJson($storages) {
    $storageOptions = array();
    array_push($storageOptions, array('id' => 'all', 'text' => 'Tất cả'));
    foreach ($storages as $storage) {
        if ($storage->isLeaf()) {
            array_push($storageOptions, array('id' => $storage->id . '', 'text' => $storage->name));
        }
    }
    return json_encode($storageOptions);
}

/**
 * 
 * @param string $text      -> the string wants to truncate
 * @param integer $limit    -> the length limited of given string
 * @param string $pad       -> replace truncated string by
 * @return string
 */
function truncate($text, $limit, $pad = "...") {

    $words = explode(' ', $text, ($limit + 1));
    if (count($words) > $limit) {
        array_pop($words);
        array_push($words, $pad);
    }
    return implode(' ', $words);
}