<?php

function setActiveMenu($current, $menu) {
    return $current == $menu ? 'active' : '';
}