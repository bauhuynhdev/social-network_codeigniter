<?php


class Post_model extends MY_Model
{
    protected $table = 'posts';

    public function getAll($params = array())
    {
        $sql =
            "SELECT 
                p.id,
                p.content,  
                u.name user_name,
                p.user_id,
                IFNULL(l.likes, 0) likes,
                IFNULL(c.comments, 0) comments,
                p.created_at 
            FROM posts p 
                LEFT JOIN users u 
                    ON u.id = p.user_id 
                LEFT JOIN (
                    SELECT 
                        COUNT(l.user_id) likes, 
                        l.post_id
                    FROM likes l) l 
                        ON l.post_id = p.id
                LEFT JOIN (
                    SELECT 
                        COUNT(c.user_id) comments, 
                        c.post_id
                    FROM comments c GROUP BY c.post_id) c 
                        ON c.post_id = p.id
                GROUP BY p.id";

        if (isset($params['offset']) && is_numeric($params['offset'])) {
            $offset = $params['offset'];
            $limit = LIMIT;
            $sql .= " LIMIT {$offset},{$limit}";
        }

        return $this->db->query($sql)->result_array();
    }

    public function count()
    {
        $sql = 'SELECT COUNT(p.id) count FROM posts p';
        $row = $this->db->query($sql)->row_array();
        return $row['count'];
    }

    public function paginate()
    {
        $this->load->library('pagination');
        if ( ! $offset = $this->input->get('per_page')) {
            $offset = 0;
        }

        $config = $this->paginate_config();
        $this->pagination->initialize($config);

        return [
            'items' => $this->getAll(array('offset' => $offset)),
            'paginate' => $this->pagination->create_links()
        ];
    }

    private function paginate_config()
    {
        $config = [];

        $config['base_url'] = current_url();
        $config['total_rows'] = $this->count();
        $config['per_page'] = LIMIT;
        $config['page_query_string'] = true;

        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['attributes'] = ['class' => 'page-link'];
        $config['first_tag_open'] = '<li class="page-item">';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="page-item">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li class="page-item">';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li class="page-item">';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="page-item active"><a href="#" class="page-link">';
        $config['cur_tag_close'] = '<span class="sr-only">(current)</span></a></li>';
        $config['num_tag_open'] = '<li class="page-item">';
        $config['num_tag_close'] = '</li>';

        return $config;
    }
}
