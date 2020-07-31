<?php


class MY_Input extends CI_Input
{
    public function all()
    {
        return array_merge(
            $this->get(),
            $this->post()
        );
    }
}
