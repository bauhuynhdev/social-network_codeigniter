<?php


class Auth extends MY_Controller
{
    public function login()
    {
        $this->load->helper('inflector');

        if ($params = $this->input->post()) {
            $validator = validator();
            $validator->set_rules('email', 'Email address', 'required');
            $validator->set_rules('password', 'Password', 'required');

            if ( ! $validator->run()) {
                session()->set_flashdata(FORM_ERRORS, $validator->error_array());
                redirect_url('/auth/login');
            }

            $this->load->model('auth_model');
            if ( ! $user = $this->auth_model->attempt($params)) {
                flash_error('Login failed');
                redirect_url('/auth/login');
            }

            flash_success('Logged in successfully');
            redirect_url('home');
        }

        $this->data['style'] = 'pages/auth/style';
        $this->data['page'] = 'pages/auth/login';

        view('layout', $this->data);
    }

    public function logout()
    {
        session()->unset_userdata(SESSION);
    }
}
