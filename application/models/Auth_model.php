<?php


class Auth_model extends MY_Model
{
    public function attempt($params)
    {
        $email = $this->db->escape($params['email']);
        $sql = "SELECT * FROM users u WHERE u.email = {$email}";
        if ( ! $user = $this->db->query($sql)->row_array()) {
            return false;
        }

        if ( ! password_verify($params['password'], $user['password'])) {
            return false;
        }

        session()->set_userdata(SESSION, $user);
        return true;
    }
}
