<?php


class Auth extends MY_Controller
{
    public function login()
    {
        if ($this->input->post()) {
            dd(1);
        }

        $this->data['style'] = 'pages/auth/style';
        $this->data['page'] = 'pages/auth/login';

        view('layout', $this->data);
    }
}
