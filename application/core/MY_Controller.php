<?php


class MY_Controller extends CI_Controller
{
    protected $data = array();

    public function __construct()
    {
        $this->data['page'] = 'welcome_message';

        parent::__construct();
    }
}
