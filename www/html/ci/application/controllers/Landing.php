<?php
defined('BASEPATH') OR exit('No direct script access allowed');
session_start();
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
				'admin.html', 
				$data
			)
		);
	}
	
		public function login() {
		
		

		$data = array(
			'error' => '',
			'base_url' => base_url(),
		);

		$this->form_validation->set_rules('username', 'Username', 'required',
			array(
				'required' => 'You must provide a %s.',
				//'in_list' => 'Username is not in '
					
			)
		);

        $this->form_validation->set_rules('password', 'Password', 'required',
        	array(
				'required' => 'You must provide a %s.',
				'match' => 'password does not match username'

		   )
		);

		if($this->form_validation->run()== true){
			
			$this->output->set_output(
				$this->twig->render(
					'landing.php', 
					$data
				)
			);
		
		}else{
			//$data['error'] = " " . validaton_error('<p class ="formError">', '</p></br>');

			$this->output->set_output(
				$this->twig->render(
					'admin.html', 
					$data
				)
			);

		}
		


		
		
	}
}
