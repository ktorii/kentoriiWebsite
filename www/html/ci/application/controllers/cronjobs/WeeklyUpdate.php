<?php
defined('BASEPATH') OR exit('No direct script access allowed');



require_once 'vendor/autoload.php';
class WeeklyUpdate extends CI_Controller {	

	public function __construct() {
		parent::__construct();

		// load database

        $this->load->database();
		$this->load->library('email');
		$this->load->model('tracking_model');
	}
	

	public function getWeekData(){
		$data = $this->tracking_model->get_week_data();
		$message = $data[2] . " to " . $data[3] . "\n \n";
		$message .= "Landing: ". current($data[0]). " \n \n";
		$message .="Clicks on each tab: \n";
		foreach($data[1] as $key => $value){
			$message .= $key .': '. current($value). " \n";
		}
		
		$this->email->set_newline("\r\n");
        $this->email->to("russellparco@gmail.com");
        $this->email->from("russellparco@gmail.com");
        $this->email->subject("Weekly kentorii.com update");
        $this->email->message($message);
        $this->email->send();

	}
}

