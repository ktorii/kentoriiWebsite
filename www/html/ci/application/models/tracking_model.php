<?php
    class Tracking_model extends CI_Model {
                public function __construct()
        {
                parent::__construct();
                // Your own constructor code
        }
        
        public function input_navigation_data($data) {
            $this->db->insert('user_tracking_timing', $data);

        }

        public function input_landing_data($data) {
            $this->db->insert('user_tracking_entry', $data);

            
        }
    }


?>