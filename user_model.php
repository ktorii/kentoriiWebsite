<?php
    class User_model extends CI_Model {
                public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        public function get_user() {
            $query = $this->db->get_where('news', array('id' => $id));
            return $query->row_array();
        }
    }


?>