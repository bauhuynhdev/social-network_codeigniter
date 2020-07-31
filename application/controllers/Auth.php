<?php


class Auth extends MY_Controller
{
    protected $middlewares = array('call' => array('logged'), 'except' => array('logout'));

    public function login()
    {
        if ($params = $this->input->post()) {
            $validator = validator();
            $validator->set_rules('email', 'Email address', 'required');
            $validator->set_rules('password', 'Password', 'required');

            set_form_keep_data($params);

            if ( ! $validator->run()) {
                set_form_errors($validator->error_array());
                redirect_url('auth/login');
            }

            $this->load->model('auth_model');
            if ( ! $user = $this->auth_model->attempt($params)) {
                flash_error('Login failed');
                redirect_url('auth/login');
            }

            flash_success('Logged in successfully');
            redirect_url('home');
        }

        $this->data['title'] = 'Login';
        $this->data['style'] = 'pages/auth/style';
        $this->data['page'] = 'pages/auth/login';

        view('layout', $this->data);
    }

    public function logout()
    {
        session()->unset_userdata(SESSION);

        flash_success('Logged out successfully');
        redirect_url('auth/login');
    }

    public function register()
    {
        if ($params = $this->input->post()) {
            $validator = validator();
            $validator->set_rules('name', 'Full name', 'required');
            $validator->set_rules('email', 'Email address', 'required');
            $validator->set_rules('password', 'Password', 'required');
            $validator->set_rules('password_confirm', 'Confirm password', 'required');

            if ( ! $validator->run()) {
                set_form_errors($validator->error_array());
                set_form_keep_data($params);
                redirect_url('auth/register');
            }

            $this->load->model('auth_model');
            if ($this->auth_model->register($params)) {
                flash_success('Login successful, please login');
                redirect_url('auth/login');
            }

            flash_error('Something\'s wrong');
            redirect('auth/register');
        }

        $this->data['title'] = 'Register';
        $this->data['style'] = 'pages/auth/style';
        $this->data['page'] = 'pages/auth/register';

        view('layout', $this->data);
    }
}
