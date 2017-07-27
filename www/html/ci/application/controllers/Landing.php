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
<<<<<<< HEAD
	
	public function tracking($section, $date, $location){
		
		
		
		
		
		
		
	}
	
	public function index() {
		
		
=======
>>>>>>> original/develop

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
