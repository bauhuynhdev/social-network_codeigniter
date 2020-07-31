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

    public function register($params)
    {
        $name = $this->db->escape($params['name']);
        $email = $this->db->escape($params['email']);
        $password = $this->db->escape(password_hash($params['password'], PASSWORD_BCRYPT));
        $sql = "INSERT INTO users (name, email, password) VALUES ({$name}, {$email}, {$password})";
        $this->db->query($sql);

        return true;
    }

    public function find($id)
    {
        $id = $this->db->escape($id);
        $sql = "SELECT * FROM users WHERE id = {$id}";

        return $this->db->query($sql)->row_array();
    }

    public function findBy($name, $var)
    {
        $var = $this->db->escape($var);
        $sql = "SELECT * FROM users WHERE {$name} = {$var}";

        return $this->db->query($sql)->row_array();
    }
}
