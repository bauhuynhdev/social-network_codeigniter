<?php


class Post_model extends MY_Model
{
    protected $table = 'posts';

    public function paginate($params = array())
    {
        $this->load->library('pagination');
        if ( ! $offset = $this->input->get('per_page')) {
            $offset = 0;
        }

        $params['offset'] = $offset;
        $extend_url = '';
        if (isset($params['search'])) {
            $extend_url = '?s='.htmlspecialchars($params['search']);
        }

        $config = $this->paginate_config();
        $config['base_url'] = current_url().$extend_url;
        $config['total_rows'] = $this->count($params);
        $this->pagination->initialize($config);

        return [
            'items' => $this->getAll($params),
            'paginate' => $this->pagination->create_links()
        ];
    }

    private function paginate_config()
    {
        $config = [];

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

    public function count($params)
    {
        $search = isset($params['search']) ? $params['search'] : '';

        $sql = "SELECT COUNT(p.id) count FROM posts p WHERE p.content LIKE '%{$search}%'";
        $row = $this->db->query($sql)->row_array();
        return $row['count'];
    }

    public function getAll($params = array())
    {
        $select_friends_sql = '';
        $join_friends_sql = '';
        $search = isset($params['search']) ? $params['search'] : '';

        if ($auth = auth()) {
            $select_friends_sql = "CASE WHEN f.friend_id IS NULL THEN 0 ELSE 1 END mutual_friends,";
            $join_friends_sql = "
                LEFT JOIN ( 
                    SELECT 
                        * 
                    FROM friends f 
                    WHERE f.friend_id = {$auth['id']} ) f 
                        ON f.user_id = p.user_id";
        }

        $sql =
            "SELECT 
                p.id,
                p.content,  
                u.name user_name,
                p.user_id,
                {$select_friends_sql}
                IFNULL(l.likes, 0) likes,
                IFNULL(c.comments, 0) comments,
                p.created_at 
            FROM posts p 
                LEFT JOIN users u 
                    ON u.id = p.user_id 
                {$join_friends_sql}
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
                        ON c.post_id = p.id WHERE p.content LIKE '%{$search}%'
                GROUP BY p.id";

        if (isset($params['offset']) && is_numeric($params['offset'])) {
            $offset = $params['offset'];
            $limit = LIMIT;
            $sql .= " LIMIT {$offset},{$limit}";
        }

        return $this->db->query($sql)->result_array();
    }
}
