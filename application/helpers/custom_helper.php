<?php

if (!function_exists('datetime_to_timestamp')) {
    function datetime_to_timestamp($datetime, $diff_for_human = true)
    {
        $ci =& get_instance();
        $ci->load->helper('date');

        $strtotime = strtotime($datetime);
        if ($diff_for_human) {
            return timespan($strtotime, now(), 1);
        }

        return $strtotime;
    }
}

if (!function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        die();
    }
}

if (!function_exists('view')) {
    function view($view, $vars = array(), $return = false)
    {
        $ci =& get_instance();
        $ci->load->view($view, $vars, $return);
    }
}
