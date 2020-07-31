<?php


class Post_model extends CI_Model
{
    protected $table = 'posts';

    public function __construct()
    {
        $this->load->database();
        parent::__construct();
    }

    public function getAll()
    {
        $sql =
            'SELECT 
                p.id,
                p.content,  
                u.name user_name,
                COUNT(l.user_id) likes,
                COUNT(c.user_id) comments,
                p.created_at 
            FROM posts p 
                LEFT JOIN users u 
                    ON u.id = p.user_id 
                LEFT JOIN likes l 
                    ON l.post_id = p.id
                LEFT JOIN comments c 
                    ON c.post_id = p.id
            GROUP BY p.id LIMIT 10';

        return $this->db->query($sql)->result_array();
    }
}
