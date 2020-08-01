<?php


class Home extends MY_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index()
    {
        $params = array();
        if ($s = $this->input->get('s')) {
            $params['search'] = $s;
        }

        $this->load->model('post_model');
        $this->data['title'] = 'Home';
        $this->data['posts'] = $this->post_model->paginate($params);
        $this->data['page'] = 'pages/home/index';

        view('layout', $this->data);
    }
}
