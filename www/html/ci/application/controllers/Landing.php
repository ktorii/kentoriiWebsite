<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once 'vendor/autoload.php';
class Landing extends CI_Controller {

	private $loader;
	private $twig;
	

	public function __construct() {
		parent::__construct();

		// load database
 		$this->load->database();
		$this->load->helper('url');

		//setup twig
		$this->loader = new Twig_Loader_Filesystem('ci/application/views');
		$this->twig = new Twig_Environment($this->loader);
	}
	
	public function trackingnavigation(){
		
		$tracking = $this->load->database('tracking', TRUE);
		
		$pagname =  $_POST['phpvar1'];
		$time =  $_POST['phpvar2'];
		$city =  $_POST['phpvar3'];
		$country =  $_POST['phpvar4'];
		
		$data = array(
	        'page_name' => '$pagename',
	        'recorded_at' => '$time',
	        'city' => '$city',
	        'country' => '$country'
        );

        $tracking->db->insert('user_tracking_timing', $data);
	}
	public function trackinglanding(){
		
		$tracking = $this->load->database('tracking', TRUE);
		
	
		$time =  $_POST['phpvar1'];
		$city =  $_POST['phpvar2'];
		$country =  $_POST['phpvar3'];
		
		$data = array(
	   
	        'recorded_at' => '$time',
	        'city' => '$city',
	        'country' => '$country'
        );

        $tracking->db->insert('user_tracking_entry', $data);
	}
	

	public function index() {
		

		$info = "";
		$data = array(
			'raw_html' => $info,
			'base_url' => base_url(),
		);

		// render views
		$this->output->set_output(
			$this->twig->render(
				'landing.php',
				$data
			)
		);
	}
}
