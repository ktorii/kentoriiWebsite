<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';
class Games extends CI_Controller {

	private $loader;
	private $twig;
    private $embed_dangoplop = "<div>dangoplop</div>";
    private $embed_dangopuck = "<div>dangopuck</div>";

	public function __construct() {
		parent::__construct();

		// load database
        $this->load->database();
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->library('session');

		// setup twig
		$this->loader = new Twig_Loader_Filesystem('ci/application/views');
		$this->twig = new Twig_Environment($this->loader);
	}


	public function index($page_name = "") {
        $game_embed = "";

        $dangoplop_info = array('name' => 'DangoPlop', 'active' => false);
        $dangopuck_info = array('name' => 'DangoPuck', 'active' => false);
        
        // initialize embed game and active tab
        switch ($page_name) {
            case "DangoPlop":
                $game_embed = $this->embed_dangoplop;
                $dangoplop_info['active'] = true;
                break;
            case "DangoPuck":
                $game_embed = $this->embed_dangopuck;
                $dangopuck_info['active'] = true;
                break;
            default:
                $game_embed = $this->embed_dangoplop;
        }

		$data = array(
			'base_url' => base_url(),
            'game_embed' => $game_embed,
            'game_tabs' => array(
                $dangoplop_info,
                $dangopuck_info
            )
		);

		// render views
		$this->output->set_output(
			$this->twig->render(
				'games/games.php',
				$data
			)
		);
	}
}

