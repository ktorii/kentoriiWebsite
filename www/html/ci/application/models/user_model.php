<?php
    class User_model extends CI_Model {
                public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        public function get_user($user) {
            $query = $this->db->get_where('user_information', array('username' => $user));

            return $query->row_array();
        }
    }


?>