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
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->library('session');

		if(!isset($_SESSION['loggedIn'])){
			$newdata = array(
        		'username'  => null,
        		'loggedIn' => false
			);
			$this->session->set_userdata($newdata);
		}




		//setup twig
		$this->loader = new Twig_Loader_Filesystem('ci/application/views');
		$this->twig = new Twig_Environment($this->loader);
	}
	
	public function trackingnavigation(){
		
       
		
		$pagename =  $this->input->post('page');
		$time =  $this->input->post('time');
		$city =  $this->input->post('city');
		$country =  $this->input->post('country');
		
		$data = array(
	        'page_name' => $pagename,
	        'recorded_at' => $time,
	        'city' => $city,
	        'country' => $country
        );

        $this->db->insert('user_tracking_timing', $data);
	}
	public function trackinglanding(){
		
	
		
	
	
		$time =  $this->input->post('time');
		$city =  $this->input->post('city');
		$country =  $this->input->post('country');
		
		$data = array(
	   
	        'recorded_at' => $time,
	        'city' => $city,
	        'country' => $country
        );

        $this->db->insert('user_tracking_entry', $data);
	}
	


	public function index() {


		$info = "";
		$data = array(
			'session' => $_SESSION['loggedIn'],
			'base_url' => base_url()
		);

		// render views
		$this->output->set_output(
			$this->twig->render(
				'landing.php',
				$data
			)
		);
	}
	
		public function login() {
		$this->load->model('user_model');
		$data = array(
			'session' => $_SESSION,
			'error' => '',
			'base_url' => base_url(),
		);
		$GLOBALS['dbUser'] = $this->user_model->get_user($this->input->post('username'));

		
		$this->form_validation->set_rules('username', 'Username', "required",
			array(
				'required' => 'You must provide a %s.',
				
					
			)
		);

        $this->form_validation->set_rules('password', 'Password', "required|md5|callback_password_check",
        	array(
				'required' => 'You must provide a %s.',
				'password_check' => 'Password does not match Username',
				'md5' => 'didnt work'

		   )
		);

		if($this->form_validation->run()== true){
			$newdata = array(
        		'username'  => $this->input->post('username'),
        		'loggedIn' => true
			);

			$this->session->set_userdata($newdata);
			
			echo('loggedIn');
			
		
		}else{
			$data['error'] =  validation_errors(' ', ' ');;

			$this->output->set_output(
				$this->twig->render(
					'login.html', 
					$data
				)
			);

		}
		


		
		
	}


	public function password_check($password){
		if($password ==  $GLOBALS['dbUser']['password']){
			return true; 
		}
		return false;
	}
	
	public function logout(){
		
		$newdata = array(
        	'username'  => null,
        	'loggedIn' => false
		);

		$this->session->set_userdata($newdata);
		

	}
}

