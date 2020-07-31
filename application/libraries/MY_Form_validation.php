<?php


class MY_Form_validation extends CI_Form_validation
{
    protected $ci;

    public function __construct($rules = array())
    {
        parent::__construct($rules);
        $this->ci =& get_instance();
        $this->ci->load->database();
    }

    public function unique($value)
    {
        $this->ci->form_validation->set_message('unique', $this->ci->lang->line('form_validation_is_unique'));
        $this->ci->load->model('auth_model');
        if ($user = $this->ci->auth_model->findBy('email', $value)) {
            return false;
        }

        return true;
    }
}
