<?php


class Auth extends MY_Controller
{
    public function login()
    {
        if ($params = $this->input->post()) {
            $this->load->model('auth_model');
            if ($user = $this->auth_model->attempt($params)) {
                session()->set_userdata($user);
                redirect(
                    site_url('/home')
                );
            }
        }

        $this->data['style'] = 'pages/auth/style';
        $this->data['page'] = 'pages/auth/login';

        view('layout', $this->data);
    }
}
