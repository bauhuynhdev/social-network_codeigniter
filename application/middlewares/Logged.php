<?php


class Logged
{
    public function handle()
    {
        if (session()->has_userdata(SESSION)) {
            redirect('/');
        }
    }
}
