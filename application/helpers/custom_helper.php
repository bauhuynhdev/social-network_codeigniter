<?php

if ( ! function_exists('datetime_to_timestamp')) {
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

if ( ! function_exists('dd')) {
    function dd($var)
    {
        echo '<pre>';
        var_dump($var);
        die();
    }
}

if ( ! function_exists('view')) {
    function view($view, $vars = array(), $return = false)
    {
        $ci =& get_instance();
        $ci->load->view($view, $vars, $return);
    }
}

if ( ! function_exists('session')) {
    /**
     * @return CI_Session
     */
    function session()
    {
        $ci =& get_instance();
        return $ci->session;
    }
}

if ( ! function_exists('validator')) {
    /**
     * @return CI_Form_validation
     */
    function validator()
    {
        $ci =& get_instance();
        return $ci->form_validation;
    }
}

if ( ! function_exists('error')) {
    /**
     * @param  string  $var
     * @return string
     */
    function error($var)
    {
        $errors = session()->flashdata(FORM_ERRORS);

        if (isset($errors[$var])) {
            return "<small class=\"form-text text-danger\">{$errors[$var]}</small>";
        }

        return '';
    }
}

if ( ! function_exists('redirect_url')) {
    function redirect_url($uri = '', $method = 'auto', $code = null)
    {
        redirect(site_url($uri), $method, $code);
    }
}

if ( ! function_exists('flash_success')) {
    function flash_success($message)
    {
        session()->set_flashdata(NOTIFY, sprintf('%s%s%s', 'success', NOTIFY_SPACE, $message));
    }
}

if ( ! function_exists('flash_error')) {
    function flash_error($message)
    {
        session()->set_flashdata(NOTIFY, sprintf('%s%s%s', 'error', NOTIFY_SPACE, $message));
    }
}

if ( ! function_exists('auth')) {
    function auth()
    {
        if (session()->has_userdata(SESSION)) {
            return session()->userdata(SESSION);
        }

        return null;
    }
}

if ( ! function_exists('set_form_errors')) {
    function set_form_errors($var)
    {
        session()->set_flashdata(FORM_ERRORS, $var);
    }
}

if ( ! function_exists('set_form_keep_data')) {
    function set_form_keep_data($var)
    {
        session()->set_flashdata(FORM_KEEP_DATA, $var);
    }
}

if ( ! function_exists('value')) {
    function value($var)
    {
        $params = session()->flashdata(FORM_KEEP_DATA);
        if (isset($params[$var])) {
            return $params[$var];
        }

        return null;
    }
}
