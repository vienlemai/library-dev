<?php

class PagingAjaxPresenter extends Illuminate\Pagination\Presenter {
    private $activeLinkClass;
    private $disableLinkClass;
    private $extraParameters;

    public function __construct(\Illuminate\Pagination\Paginator $paginator, $options = array()) {
        parent::__construct($paginator);
        $this->activeLinkClass = 'active';
        $this->disableLinkClass = 'disabled';

        if (isset($options['params']) && is_array($options['params'])) {
            $this->extraParameters = $options['params'];
        } else {
            $this->extraParameters = array();
        }
        if (isset($options['activeLinkClass']))
            $this->activeLinkClass = $options['activeLinkClass'];
        if (isset($options['disableLinkClass']))
            $this->disableLinkClass = $options['disableLinkClass'];
    }

    public function getActivePageWrapper($text) {
        return '<li class="' . $this->activeLinkClass . '"><a href="#">' . $text . '</a> </li>';
    }

    public function getDisabledTextWrapper($text) {
        return '<li class="' . $this->disableLinkClass . '"><a href="#">' . $text . '</a> </li>';
    }

    public function getPageLinkWrapper($url, $page) {
        $appendedParamsUrl = self::appendParams($url, $this->extraParameters);
        return '<li><a href="' . $appendedParamsUrl . '">' . $page . '</a></li>';
    }

    private static function appendParams($url, $params) {
        foreach ($params as $key => $value) {
            if ($value != '') {
                $url .= "&" . $key . '=' . $value;
            }
        }
        return $url;
    }

}