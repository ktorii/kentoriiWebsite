<?php
defined('BASEPATH') OR exit('No direct script access allowed');

require_once 'vendor/autoload.php';
class Games extends CI_Controller {

	private $loader;
	private $twig;
    private $embed_dangoplop;
    private $embed_dangopuck;
    private $embed_css_dangopuck;
    private $embed_css_dangoplop;

	public function __construct() {
		parent::__construct();

		// load database
        $this->load->database();
		$this->load->helper(array('url', 'form'));
		$this->load->library('form_validation');
		$this->load->library('session');

        // setup games embed code
        $this->embed_dangopuck = "
        <script src='".base_url()."games/general/TemplateData/UnityProgress.js'></script>
        <div class='template-wrap clear'>
            <canvas class='emscripten' id='canvas' oncontextmenu='event.preventDefault()' height='540px' width='960px'></canvas>
            <br>
            <div class='logo'></div>
            <div class='fullscreen'><img src='".base_url()."games/general/TemplateData/fullscreen.png' width='38' height='38' alt='Fullscreen' title='Fullscreen' onclick='SetFullscreen(1);' /></div>
            <div class='title'>Dango Puck!</div>
            </div>
            <script type='text/javascript'>
        var Module = {
            TOTAL_MEMORY: 268435456,
            errorhandler: null,			// arguments: err, url, line. This function must return 'true' if the error is handled, otherwise 'false'
            compatibilitycheck: null,
            backgroundColor: '#222C36',
            splashStyle: 'Light',
            dataUrl: '".base_url()."games/dangopuck/Release/DangoPuckv1.data',
            codeUrl: '".base_url()."games/dangopuck/Release/DangoPuckv1.js',
            asmUrl: '".base_url()."games/dangopuck/Release/DangoPuckv1.asm.js',
            memUrl: '".base_url()."games/dangopuck/Release/DangoPuckv1.mem',
        };
        </script>
        <script src='".base_url()."games/dangopuck/Release/UnityLoader.js'></script>
        ";

        $this->embed_css_dangopuck = "
        <link rel='stylesheet' href='".base_url()."games/general/TemplateData/style.css'>
        <style>
            .template-wrap {
                -webkit-transform: translate(-50%, -10%) !important;
                transform: translate(-50%, -10%) !important;
            }
        </style>
        <link rel='shortcut icon' href='".base_url()."games/general/TemplateData/favicon.ico' />
        ";
        

        $this->embed_dangoplop = "
        <script src='".base_url()."games/dangoplop/TemplateData/UnityProgress.js'></script>  
        <script src='".base_url()."games/dangoplop/Build/UnityLoader.js'></script>
        
        <div class='webgl-content'>
            <div id='gameContainer' style='width: 960px; height: 600px'></div>
            <div class='footer'>
            <div class='webgl-logo'></div>
            <div class='fullscreen' onclick='gameInstance.SetFullscreen(1)'></div>
            <div class='title'>DangoPlop</div>
            </div>
        </div>
        <script>
        var gameInstance = UnityLoader.instantiate('gameContainer', '".base_url()."games/dangoplop/Build/dangoplopWeb.json');
        </script>
        ";

        $this->embed_css_dangoplop = "
        <link rel='stylesheet' href='".base_url()."games/dangoplop/TemplateData/style.css'>
        <style>
            .webgl-content {
                -webkit-transform: translate(-50%, -15%) !important;
                transform: translate(-50%, -15%) !important;
            }
        </style>
        <link rel='shortcut icon' href='".base_url()."games/dangoplop/TemplateData/favicon.ico' />
        ";


		// setup twig
		$this->loader = new Twig_Loader_Filesystem('ci/application/views');
		$this->twig = new Twig_Environment($this->loader);
	}


	public function index($page_name = "") {
        $game_embed = "";
        $css_embed = "";

        $dangoplop_info = array('name' => 'DangoPlop', 'active' => false);
        $dangopuck_info = array('name' => 'DangoPuck', 'active' => false);
        
        // initialize embed game and active tab
        switch ($page_name) {
            case "DangoPlop":
                $game_embed = $this->embed_dangoplop;
                $css_embed = $this->embed_css_dangoplop;
                $dangoplop_info['active'] = true;
                break;
            case "DangoPuck":
                $game_embed = $this->embed_dangopuck;
                $css_embed = $this->embed_css_dangopuck;
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
            ),
            'css_embed' => $css_embed
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

