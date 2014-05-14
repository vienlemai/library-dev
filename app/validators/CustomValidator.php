<?php

class CustomValidator {

    public function blevel() {
        
    }

    public function bxPermission($attribute, $value, $parameters) {
        $readerTypes = array_map('strtolower', Reader::$TYPE_LABELS);
        $valueArray = explode(',', $value);
        foreach ($valueArray as $k) {
            if (!in_array(trim(strtolower($k)), $readerTypes)) {
                return false;
            }
        }
        return true;
    }

    public function bxStorage($attribute, $value, $parameters) {
        return in_array(trim(strtolower($value)), array_map('strtolower', Book::$storageTitle));
    }

}
