<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Tracking_model extends CI_Model {
                public function __construct()
        {
                parent::__construct();
                // Your own constructor code
                $this->load->database();
        }
        
        public function input_navigation_data($data) {
            $this->db->insert('user_tracking_timing', $data);

        }

        public function input_landing_data($data) {
            $this->db->insert('user_tracking_entry', $data);

            
        }

        public function get_landing_data($min = null, $max = null, $country = null, $city = null){
            
            if(empty($min)){
                $minDate = $this->get_min('user_tracking_entry');
            }else{
                $minDate = date_create($min);

            }
            if(empty($max)){
                $maxDate = $this->get_max('user_tracking_entry');
            }else{
                    $maxDate = date_create($max);

            }

            return $this->get_chart('user_tracking_entry', null, $minDate, $maxDate, $country, $city); 
        }

        public function get_navigation_data($min = null, $max = null, $country = null, $city = null){
            $data = array();

            if(empty($min)){
                $minDate = $this->get_min('user_tracking_entry');
            }else{
                $minDate = date_create($min);

            }
            if(empty($max)){
                $maxDate = $this->get_max('user_tracking_entry');
            }else{
                    $maxDate = date_create($max);

            }
            
            $this->db->select('page_name');
            $this->db->distinct();
            $pages = $this->db->get('user_tracking_timing')->result_array();

            for($x = 0; $x < count($pages); $x++){
                $data[$pages[$x]['page_name']] = array();
            }
            
            foreach($data as $key => $value){
                
                $data[$key] = $this->get_chart('user_tracking_timing', $key, $minDate, $maxDate, $country, $city);
                

            } 
            return $data;
        }



        private function get_chart($table, $page, $min = null, $max = null, $country= null, $city = null){
            $currentDate = date_create(date_format($min,'Y-m-d' ));
            $finalDate = date_format($max,'Y-m-d 23:59:59');
            $maxDate = date_create($finalDate);
            $data = array();
            
            while($currentDate < $maxDate){
                
                $date =  date_format($currentDate,'Y-m-d' );
                $nextdate = date_create($date);
                $nextdate = date_format(date_add($currentDate,date_interval_create_from_date_string("1 month")),'Y-m-d' );
                

                $this->db->where('recorded_at >=', $date);
                $this->db->where('recorded_at <', $nextdate);
                $this->db->where('recorded_at <=', $finalDate);
                if(!empty($country)){$this->db->where('country =', $country);}
                if(!empty($city)){$this->db->where('city =', $city);}

                if($table == 'user_tracking_timing'){$this->db->where('page_name =', $page);}
                
                $count = $this->db->count_all_results($table);
                
                $data[$date] = $count;
                
            }
             return $data;
        }
        
        private function get_max($table){
            $this->db->select_max('recorded_at', 'maxDate');
            $maxDate = $this->db->get($table);
            $maxDate = date_create(substr($maxDate->result_array()[0]['maxDate'],0,8).'31');
            
            return $maxDate;
        }
        
        private function get_min($table){
            $this->db->select_min('recorded_at', 'minDate');
            $minDate = $this->db->get($table);
            $minDate = date_create(substr($minDate->result_array()[0]["minDate"],0,8)."01");

            return $minDate;
        }
        public function get_countries(){
            $this->db->select('country');
            $this->db->distinct();
            return $this->db->get('user_tracking_entry')->result_array();
        }
        
        public function get_cities(){
            $this->db->select('city');
            $this->db->distinct();
            return $this->db->get('user_tracking_entry')->result_array();
        }
        public function get_week_data(){
            $today = date_create('now');
            $weekEnd = date_format($today->modify('-1 days'), 'Y-m-d 23:59:59');
            $weekEndFormated = date_format($today, 'F d, Y 23:59:59');
            $weekStart = date_format($today->modify('-6 days'), 'Y-m-d 00:00:00');
            $weekStartFormated = date_format($today, 'F d, Y 00:00:00');
            
            $data = array($this->get_landing_data($weekStart, $weekEnd), $this->get_navigation_data($weekStart, $weekEnd), $weekStartFormated, $weekEndFormated);
            


            return $data;


        }
                   
    }
    