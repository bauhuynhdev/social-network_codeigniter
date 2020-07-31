<?php


class MY_Controller extends CI_Controller
{
    protected $data = array();

    protected $middlewares = array();

    public function __construct()
    {
        parent::__construct();
        $this->data['page'] = '';
        if ($this->middlewares) {
            $this->middleware();
        }
    }

    protected function middleware()
    {
        $middlewares_folder = APPPATH.DIRECTORY_SEPARATOR.'middlewares'.DIRECTORY_SEPARATOR;
        if (is_dir($middlewares_folder)) {
            foreach (glob($middlewares_folder.'*.php') as $file_path) {
                $file_name = basename($file_path, '.php');
                if ($this->hasInList($file_name) && ! $this->hasInExceptList()) {
                    require_once $file_path;
                    (new $file_name())->handle();
                }
            }
        }
    }

    private function hasInList($file_name)
    {
        if ( ! isset($this->middlewares['call'])) {
            throw new Exception('Call field is required');
        }

        return in_array(strtolower($file_name), $this->middlewares['call']);
    }

    private function hasInExceptList()
    {
        if ( ! isset($this->middlewares['except'])) {
            return false;
        }

        return in_array($this->router->method, $this->middlewares['except']);
    }
}
