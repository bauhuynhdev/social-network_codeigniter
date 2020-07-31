<?php


class Home extends MY_Controller
{
    public function index()
    {
        $this->load->model('post_model');
        $this->data['posts'] = $this->post_model->getAll();
        $this->data['page'] = 'pages/home/index';

        view('layout', $this->data);
    }
}
