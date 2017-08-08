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

        public function get_landing_data(){
            $minDate = $this->db->query('SELECT MIN(recorded_at) AS EarliestDate FROM user_tracking_entry;');
            $minDate = $minDate->result();

            $maxDate = $this->db->query('SELECT MAX(recorded_at) AS LatestDate FROM user_tracking_entry;');
            $maxDate = $maxDate->result();

            $currentDate = $minDate['EarliestDate'];

            if($currentDate <= $maxDate['LatestDate']){


            }

            $data =array(
                'recorded_at'=> array(),
                'city'=> array(),
                'country'=> array()
            );

            $query = $this->db->get('user_tracking_entry');
            foreach($query->result_array() as $row){
                array_push($data['recorded_at'], $row['recorded_at']);
                array_push($data['city'], $row['city']);
                array_push($data['country'], $row['country']);
            }
            
            return $minDate; 
        }
    }


?>