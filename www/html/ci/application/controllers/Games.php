<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';
class Games extends CI_Controller {

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
			'session' => $_SESSION['loggedIn'],
			'base_url' => base_url()
		);

		// render views
		$this->output->set_output(
			$this->twig->render(
				'games.php',
				$data
			)
		);
	}
}

