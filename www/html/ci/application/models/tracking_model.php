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
            
            $this->db->select_min('recorded_at', 'minDate');
            $minDate = $this->db->get('user_tracking_entry');
            $minDate = $minDate->result_array();
            
            $currentDate = date_create(substr($minDate[0]["minDate"],0,8)."01");

            $this->db->select_max('recorded_at', 'maxDate');
            $maxDate = $this->db->get('user_tracking_entry');
            $maxDate = date_create(substr($maxDate->result_array()[0]['maxDate'],0,8).'01');

            $data = array();
            
            while($currentDate <= $maxDate){
                
                $date =  date_format($currentDate,'Y-m-d' );
                $nextdate = date_create($date);
                $nextdate = date_format(date_add($currentDate,date_interval_create_from_date_string("1 month")),'Y-m-d' );
                

                $this->db->where('recorded_at >=', $date);
                $this->db->where('recorded_at <', $nextdate);
                $count = $this->db->count_all_results('user_tracking_entry');
                
                
                $data[substr($date,0,8)] = $count;
                
                
            }

            return $data; 
        }

        public function get_navigation_data(){
            $data = array();
            
            $this->db->select('page_name');
            $this->db->distinct();
            $pages = $this->db->get('user_tracking_timing')->result_array();

            for($x = 0; $x < count($pages); $x++){
                $data[$pages[$x]['page_name']] = array();
            }
            
            foreach($data as $key => $value){
                
                $data[$key] = $this->get_chart('user_tracking_timing', $key);
                

            } 
            return $data;
        }



        public function get_chart($table, $page){
            $this->db->select_min('recorded_at', 'minDate');
            $this->db->where('page_name =', $page);
            $minDate = $this->db->get($table);
            $minDate = $minDate->result_array();
            
            $currentDate = date_create(substr($minDate[0]["minDate"],0,8)."01");

            $this->db->select_max('recorded_at', 'maxDate');
            $this->db->where('page_name =', $page); 
            $maxDate = $this->db->get($table);
            $maxDate = date_create(substr($maxDate->result_array()[0]['maxDate'],0,8).'01');

            $data = array();
            
            while($currentDate <= $maxDate){
                
                $date =  date_format($currentDate,'Y-m-d' );
                $nextdate = date_create($date);
                $nextdate = date_format(date_add($currentDate,date_interval_create_from_date_string("1 month")),'Y-m-d' );
                

                $this->db->where('recorded_at >=', $date);
                $this->db->where('recorded_at <', $nextdate);
                $this->db->where('page_name =', $page);
                $count = $this->db->count_all_results($table);
                
                
                $data[substr($date,0,8)] = $count;
                
                
            }
             return $data;
        }   
    }
?>