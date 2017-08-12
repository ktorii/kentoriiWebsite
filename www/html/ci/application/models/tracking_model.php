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

        public function get_landing_data($min = null, $max = null, $country = null){
            
            if(null === $min){
                $minDate = $this->get_min('user_tracking_entry');
                }else{
                    $minDate = $min;

            }
            if(null === $max){
                $maxDate = $this->get_max('user_tracking_entry');
            }else{
                    $maxDate = $max;

            }

            return $this->get_chart('user_tracking_entry', null, $minDate, $maxDate, $country); 
        }

        public function get_navigation_data($min = null, $max = null, $country = null){
            $data = array();

            if(null === $min){
                $minDate = $this->get_min('user_tracking_entry');
                }else{
                    $minDate = $min;

            }
            if(null === $max){
                $maxDate = $this->get_max('user_tracking_entry');
            }else{
                    $maxDate = $max;

            }
            
            $this->db->select('page_name');
            $this->db->distinct();
            $pages = $this->db->get('user_tracking_timing')->result_array();

            for($x = 0; $x < count($pages); $x++){
                $data[$pages[$x]['page_name']] = array();
            }
            
            foreach($data as $key => $value){
                
                $data[$key] = $this->get_chart('user_tracking_timing', $key, $minDate, $maxDate, $country);
                

            } 
            return $data;
        }



        public function get_chart($table, $page, $min, $max, $country){
            $currentDate = date_create(date_format($min,'Y-m-d' ));
            $maxDate = date_create(date_format($max,'Y-m-d' ));
            $data = array();
            
            while($currentDate <= $maxDate){
                
                $date =  date_format($currentDate,'Y-m-d' );
                $nextdate = date_create($date);
                $nextdate = date_format(date_add($currentDate,date_interval_create_from_date_string("1 month")),'Y-m-d' );
                

                $this->db->where('recorded_at >=', $date);
                $this->db->where('recorded_at <', $nextdate);
                if($country !== null){$this->db->where('country =', $country);}
                if($table == 'user_tracking_timing'){$this->db->where('page_name =', $page);}
                $count = $this->db->count_all_results($table);
                
                
                $data[substr($date,0,8)] = $count;
                
                
            }
             return $data;
        }
        
        public function get_max($table){
            $this->db->select_max('recorded_at', 'maxDate');
            $maxDate = $this->db->get($table);
            $maxDate = date_create(substr($maxDate->result_array()[0]['maxDate'],0,8).'01');
            
            return $maxDate;
        }
        
        public function get_min($table){
            $this->db->select_min('recorded_at', 'minDate');
            $minDate = $this->db->get($table);
            $minDate = date_create(substr($minDate->result_array()[0]["minDate"],0,8)."01");

            return $minDate;
        }           
    }
?>