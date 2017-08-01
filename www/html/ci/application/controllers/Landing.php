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
	
	public function index() {	
		$info = "";
		$data = array(
			'raw_html' => $info,
			'base_url' => base_url(),
		);

		// render views
		$this->output->set_output(
			$this->twig->render(
				'login.html', 
				$data
			)
		);
	}
	
		public function login() {
		$data = array(
			'error' => '',
			'base_url' => base_url(),
		);

		if($this->session->loggedIn == true){
			$this->output->set_output(
			$this->twig->render(
				'admin.html', 
				$data
				)
			);

		}else{

		
		$this->form_validation->set_rules('username', 'Username', 'required',
			array(
				'required' => 'You must provide a %s.',
				//'in_list' => 'Username is not in '
					
			)
		);

        $this->form_validation->set_rules('password', 'Password', 'required',
        	array(
				'required' => 'You must provide a %s.',
				'match' => 'Password does not match Username'

		   )
		);

		if($this->form_validation->run()== true){
			$newdata = array(
        		'username'  => $this->input->post('username'),
        		'loggedIn' => true
			);

			$this->session->set_userdata($newdata);
			
			$this->output->set_output(
				$this->twig->render(
					'admin.html', 
					$data
				)
			);
		
		}else{
			$data['error'] =  validation_errors(' ', ' ');;

			$this->output->set_output(
				$this->twig->render(
					'login.html', 
					$data
				)
			);

		}
		


		
		
	}}
	
	public function logout(){
		$data = array(
			'base_url' => base_url(),
		);
		
		$newdata = array(
        	'username'  => null,
        	'loggedIn' => true
		);

		$this->session->set_userdata($newdata);


		$this->output->set_output(
			$this->twig->render(
				'landing.php', 
				$data
			)
		);
		

	}
}

