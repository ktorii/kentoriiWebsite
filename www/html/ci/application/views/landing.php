<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
	<title>Ken Torii &copy;</title>
	<meta content="width=device-width, initial-scale=1" name="viewport" />
	<link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" />
	<link href="<?php echo base_url(); ?>font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
	<link href="<?php echo base_url(); ?>css/index2.css" rel="stylesheet" />
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
	<script type="text/javascript">
	function googleTranslateElementInit() {
	  new google.translate.TranslateElement({pageLanguage: 'en', autoDisplay: false}, 'google_translate_element');
	}
	</script><script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
	<script>




	$(document).ready(function(){

	    var random_greeting;
		var random_int = Math.floor((Math.random() * 3) + 1);
		if (random_int == 1) {
		    random_greeting = "Hi!";
		}
		else if (random_int == 2) {
		    random_greeting = "Yo! What's up?";
		}
		else {
		    random_greeting = "Hey! How's it going?";
		}
		$("#randomGreeting").text(random_greeting);


	    $(".kt-tabs-component-nav li a").click(function(e){
	    	if(!$(this).hasClass('dropdown-toggle')){
	    		e.preventDefault();
		    	$(".kt-tabs-component-nav li").removeClass("active");
		    	$(this).parent().addClass("active");


		        $(".kt-tabs-component-content").hide();
		        $(".kt-tabs-component-content" + $(this).attr('href') ).fadeIn("slow");
	    	}

	    });
	    $("a.kt-tab-link").click(function(e){
    		e.preventDefault();
	    	$(".kt-tabs-component-nav li").removeClass("active");
	    	var tagId=$(this).attr('href');
	    	//console.log(tagId);

	    	$('.kt-tabs-component-nav li a[href="' + tagId + '"]').parent().addClass("active");


	        $(".kt-tabs-component-content").hide();
	        $(".kt-tabs-component-content" + $(this).attr('href') ).fadeIn("slow");

	    });

	});

	$( window ).load(function() {
            $(".kt-tabs-component-content").hide();
	    $("#aboutsite").show();
    	});

	</script>
</head>
<body>
<div class="container kt-tabs-component">
<div class="container strictly-no-padding ">
<div class="kt-google-translate-widget" id="google_translate_element"></div>
<nav class="navbar navbar-inverse kt-tabs-component-nav"><!--navbar-default-->
  <div class="container-fluid">
    <div class="navbar-header">

      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#" style="color:#fed136;">Menu</a>
    </div>
    <div class="collapse navbar-collapse kt-tabs-component-nav-div" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="#aboutsite">About This Site</a></li>
        <li><a href="#whatsup">What's Up?</a></li>
		<li><a href="#aboutme">About Me</a></li>
		<li><a href="#gamedev">Games</a></li>
		<li><a href="#otherprojects">Other Projects</a></li>
		<li><a href="#smash">Random</a></li>
		<li class="dropdown"><a aria-expanded="false" aria-haspopup="true" class="dropdown-toggle" data-toggle="dropdown" href="#" role="button">Tutorials</a>
			<ul class="dropdown-menu">
				<li><a href="#physics">Physics</a></li>
				<li><a href="#math">Math</a></li>
			</ul>
		</li>
		<li><a href="#contactme">Contact</a></li>
      </ul>


    </div>
  </div>
</nav>

</div>
</div>

<!--ABOUT THIS SITE-->
<div class="container kt-tabs-component-content clean-container-theme" id="aboutsite">
	<div class="jumbotron strictly-no-background-color">
		<div class="container">
		  <div class="text-center">
		  	<h1 id="randomGreeting" class="section-heading "></h1>
		  </div>

		  <div class="col-sm-12 maintenance-info-box">
			<h3>Take a look at <a class="kt-tab-link" href="#physics">tutorials</a>, <a class="kt-tab-link" href="#gamedev">games</a> and <a class="kt-tab-link" href="#otherprojects">other projects</a> I have worked on.</h3>
			<h3>Or ask me <a class="kt-tab-link" href="#whatsup">What's Up?</a></h3>
		  </div>
		  <div class="col-sm-12 text-center">
			<img src="<?php echo base_url(); ?>img/birdsleeping.png" class="img-responsive img-center" >
		  </div>
	  	</div>
	</div>
</div>

<!--WHAT'S UP-->
<div class="container kt-tabs-component-content clean-container-theme" id="whatsup">
	<div class="jumbotron strictly-no-background-color">
	  <div class="container">
	    <h1 style="text-align:center;">What's up Ken?</h1>
	    <h2>Catching up with old friends after 3-6 years. Actually amazing.</h2>
	    <h3>On my coop term.</h3>

	    <h4 style="display:visible;">Feeling good.</h4>
	    <h4 style="display:none;">Feeling ok.</h4>
	    <h4 style="display:none;">Feeling done.</h4>

	    <div class="col-sm-12" style="text-align:center;">
	    	<img style="display:none;" src="<?php echo base_url(); ?>img/totorohappy.jpeg" width="100px" height="100px" />
	    	<img style="display:visible;" src="<?php echo base_url(); ?>img/totoroalright.png" width="100px" height="100px" />
	    	<img style="display:none;" src="<?php echo base_url(); ?>img/patrickover.png" width="100px" height="100px" />
	    </div>

	    <div style="text-align:center;">Follow me on <a href="https://twitter.com/kTmochi">Twitter</a></div>
	  </div>
	</div>

</div>

<!--ABOUT ME-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="aboutme">
	<div class="container bg-light-gray">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="whoami" class="section-heading">Who Am I?</h1>

			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Software Engineer &bull; Game Developer &bull; Web Developer &bull; Highschool Online Tutor &bull; Smasher</h3>
			</div>
		</div>
	</div>


	<div class="container bg-light-white">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="personality" class="section-heading">Personality</h1>
			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Perspective-Taking &bull; Competitive &bull; Chill &bull; To the point</h3>
			</div>
		</div>
	</div>

	<div class="container bg-light-gray">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="randomfacts" class="section-heading">Random</h1>
			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Want a maid &bull; Can't hold chopsticks properly &bull; Admire self-sacrifice &bull; Japorean</h3>
			</div>
		</div>
	</div>


	<!--
	<h3 id="casualvids">Casual Online Tutoring Videos</h3>
	<p>I always thought some teachers are so smart and experienced with what they teach that the students sometimes have a hard time following along because of this. In my eyes, a student teacher can be better. Professional language clouds a student's process of understanding concepts. Lets' dumb it down. My videos are 100% casual and relateable to the student's learning. May contain some swearing. All for the sake of them understanding of course. Check out my tutorial vids <a class="kt-tab-link" href="#physics">here!</a></p>

	<h3 id="smasher">Smasher</h3>
	<p>I love playing Super Smash Bros. Melee. I play it competitively and its great. I wish I could have it as an actual side-job after I graduate Waterloo. Find out more <a class="kt-tab-link" href="#smash">here!</a></p>
	-->

</div>

<!--GAMEDEV-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="gamedev">
	<div class="container bg-light-gray">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="randomfacts" class="section-heading">Game Development</h1>
			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Fun &bull; Competitive &bull; Simple &bull; Challenging &bull; Frustrating</h3>
			</div>
		</div>
	</div>
	<!-- Portfolio Grid Section -->
	<section class="bg-light-white" id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
				<h2 class="section-heading">Portfolio</h2>
				<h3 class="section-subheading text-muted">Take a look at the things I made!</h3>
				</div>
			</div>

			<div class="row">

				<div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal4">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/dangopuckpreview.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Dango Puck! v1.0</h4>
                        <p class="text-muted">Game+Graphics+Sound Developer</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal1">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/portfolio/space-dodgers.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Space Dodgers v1.2</h4>
                        <p class="text-muted">Game Developer</p>
                    </div>
                </div>

                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal5">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/straightslogo.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Straights Card Game</h4>
                        <p class="text-muted">Game Developer</p>
                    </div>
                </div>
                <!--
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/ums.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Widget Design</h4>
                        <p class="text-muted">Front-End Developer</p>
                    </div>
                </div>
-->
			</div>

			<div class="row">

				<div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal6">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/snakethumbnail2.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Custom Snake Game</h4>
                        <p class="text-muted">Game Developer</p>
                    </div>
                </div>


			</div>
		</div>
	</section>

</div>

<!--OTHER PROJECTS-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="otherprojects">
	<div class="container bg-light-gray">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="" class="section-heading">Other Projects</h1>
			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Web Development &bull; Software &bull; And Other Cool Stuff</h3>
			</div>
		</div>
	</div>
	<!-- Portfolio Grid Section -->
	<section class="bg-light-white" id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
				<h2 class="section-heading">Portfolio</h2>
				<h3 class="section-subheading text-muted">Take a look at the things I made!</h3>
				</div>
			</div>

			<div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal2">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/ums.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Widget Design</h4>
                        <p class="text-muted">Front-End Developer</p>
                    </div>
                </div>



				<div class="col-md-4 col-sm-6 portfolio-item">
                    <a class="portfolio-link" data-toggle="modal" href="#portfolioModal3">
                        <div class="portfolio-hover">
                            <div class="portfolio-hover-content">
                                <i class="fa fa-info fa-3x"></i>
                            </div>
                        </div>
                        <img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/myro.png">
                    </a>
                    <div class="portfolio-caption">
                        <h4>Myro Robot Color Detector</h4>
                        <p class="text-muted">Python Programmer</p>
                    </div>
                </div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<div class="portfolio-hover">
						<div class="portfolio-hover-content"></div>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<!--SMASH-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="smash">
	<div class="jumbotron strictly-no-background-color">
		<div class="container">
		  <div class="text-center">
		  	<h1 class="section-heading ">I'll just throw other stuff here.</h1><!--'-->
		  </div>
		  <div class="col-sm-12 maintenance-info-box">
			<h3>Follow me on <a href="https://twitter.com/kTmochi">Twitter</a></h3>
			<h3>Listen to some music on spotify that I listen to:</h3>
			<iframe src="https://embed.spotify.com/?uri=spotify%3Auser%3Aktorii%3Aplaylist%3A4z1Tkn4FCpt5ARe81ev1C6" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
			<iframe src="https://embed.spotify.com/?uri=spotify%3Auser%3Aktorii%3Aplaylist%3A5iRIXZAwETSNzgjZihwLGi" width="300" height="380" frameborder="0" allowtransparency="true"></iframe>
		  </div>
	  	</div>
	</div>

</div>

<!--MATH-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="math">
	<div class="container bg-light-gray">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="" class="section-heading">Math</h1>
			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Calculus &bull; Small Tricks</h3>
			</div>
		</div>
	</div>

	<!-- Portfolio Grid Section -->
	<section class="bg-light-white" id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
				<h2 class="section-heading">Videos</h2>
				</div>
			</div>

			<div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
					<div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <!--<i class="fa fa-caret-square-o-right fa-3x"></i>-->
                        </div>
                    </div>
					<a class="portfolio-link" href="https://drive.google.com/file/d/0B7TI-OA8_nbqb09SaTRlb3Y2TUE/view?usp=sharing" target="_blank"><img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/derivativeskenvideo.jpg" /> </a>
					<div class="portfolio-caption">
					<h4>Derivatives<br>(Power/Quotient/Chain Rules)</h4>
					<p class="text-muted">Did you miss that one important calculus class? You&#39;ll be good soon.(Contains mild swearing; 30mins)</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <!--<i class="fa fa-caret-square-o-right fa-3x"></i>-->
                        </div>
                    </div>
					<a class="portfolio-link" href="https://youtu.be/6qTN57qlfKs" target="_blank"><img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/wipeglasses.png" /> </a>
					<div class="portfolio-caption">
					<h4>Why is the derivative of a constant zero?</h4>
					<p class="text-muted">It's good to understand the little things even though we know it's a fact.</p>
					</div>
				</div>
				<div class="col-md-4 col-sm-6 portfolio-item">
					<div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <!--<i class="fa fa-caret-square-o-right fa-3x"></i>-->
                        </div>
                    </div>
					<a class="portfolio-link" href="https://www.youtube.com/watch?v=UCnDysoZwAs" target="_blank"><img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/canwhat.png" /> </a>
					<div class="portfolio-caption">
					<h4>A trick to divide big numbers</h4>
					<p class="text-muted">After you can do this with paper, try doing it in your head!</p>
					</div>
				</div>
			</div>
		</div>
	</section>

</div>

<!--PHYSICS-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="physics">
	<!--<div class="jumbotron strictly-no-background-color">
		<div class="container">
		  <div class="text-center">
		  	<h1 class="section-heading ">Will be updated soon!</h1>
		  </div>
		</div>
	</div>-->

	<div class="container bg-light-gray">
		<div class="col-lg-12 text-center div-extra-padding">
			<h1 id="" class="section-heading">Physics</h1>
			<div class="weight-decrease-header-tags">
				<h3 class="text-muted">Learn dynamics in a week (incomplete)</h3>
			</div>
		</div>
	</div>
	<!-- Portfolio Grid Section -->
	<section class="bg-light-white" id="portfolio">
		<div class="container">
			<div class="row">
				<div class="col-lg-12 text-center">
				<h2 class="section-heading">Videos</h2>
				</div>
			</div>

			<div class="row">
                <div class="col-md-4 col-sm-6 portfolio-item">
					<div class="portfolio-hover">
                        <div class="portfolio-hover-content">
                            <!--<i class="fa fa-caret-square-o-right fa-3x"></i>-->
                        </div>
                    </div>
					<a class="portfolio-link" href="https://www.youtube.com/watch?v=n4_G3cM6mqo" target="_blank"><img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/intro.png" /> </a>
					<div class="portfolio-caption">
					<h4>Intro</h4>
					<p class="text-muted">The purpose of these videos. Only for highschool students and first year university kids.</p>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Team Section -->
	<!--
    <section id="team" style="background-image:url(img/notebook.jpg);">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">Math/Physics HELP</h2>
                    <h3 class="section-subheading text-muted" style="margin-bottom:0;">WARNING: This section is purposely not professional. Please do not judge my professionalism based on this section. Thank you in advance.</h3><br />
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-lg-offset-2 text-center">
                    <p class="large text-muted" style="margin-top:5px;">I make the school studying less frustrating. How? These videos are kept CASUAL and UNDERSTANDABLE. Big professional vocabulary just clouds up understanding. And a student teacher can relate more easily to the difficulties of the student.</p>
                </div>
            </div>
            <br>
            <div class="row">
            <div class="col-lg-12 text-center">
            <div class="col-md-4 col-sm-6 portfolio-item" style="background-color:#EBEBF5;">
		<div class="portfolio-hover">
		<div class="portfolio-hover-content">
		</div>
		</div>
		<a class="portfolio-link" href="https://drive.google.com/file/d/0B7TI-OA8_nbqb09SaTRlb3Y2TUE/view?usp=sharing" target="_blank"><img alt="" class="img-responsive" src="<?php echo base_url(); ?>img/derivativeskenvideo.jpg" /> </a>
		<div class="portfolio-caption">
		<h4>Derivatives<br>(Power/Quotient/Chain Rules)</h4>
		<p class="text-muted">Did you miss that one important calculus class? You&#39;ll be good soon.(Contains mild swearing; 30mins)</p>
		</div>
	    </div>
	    </div>
	    </div>
	</div>
    </section>
-->
</div>


<!--CONTACT ME-->
<div class="container kt-tabs-component-content clean-container-theme strictly-no-padding" id="contactme">
	<div class="jumbotron strictly-no-background-color">
		<div class="container">
		  <div class="text-center">
		  	<h1 class="section-heading ">Contact Me</h1><!--'-->
		  	<h3 class="text-muted"><a href="https://ca.linkedin.com/in/ken-torii-444118a6" target="_blank">Linkedin</a> &bull; ken.torii7@gmail.com &bull; <a href="https://www.facebook.com/ken.torii.1?fref=ts" target="_blank">Facebook</a> &bull; <a href="https://twitter.com/kTmochi" target="_blank">Twitter</a></h3>
		  </div>
		</div>
	</div>

</div>











<!-- Portfolio Modal 1 -->

<div aria-hidden="true" class="portfolio-modal modal fade" id="portfolioModal1" role="dialog" tabindex="-1">
<div class="modal-content">
<div class="close-modal" data-dismiss="modal">
<div class="lr">
<div class="rl"></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="modal-body"><!-- Project Details Go Here -->
<h2>Space Dodgers v1.2</h2>

<p class="item-intro text-muted">My first successful game. Had a lot of fun playing it.</p>
<img alt="" class="img-responsive img-centered" src="<?php echo base_url(); ?>img/portfolio/space.png" />

<p>Do you want to play an arcade game that has you flying a jetplane while playing epic music in space? Avoid the space obstacles and enemies and get to the end of the song! If you get hit, the space gods will give you another chance by having you press a keyboard key within a certain time limit. If you press it in time, then you are safe! If not, then I guess you are starting the song over again. Inspired by my childhood space arcade games and The Impossible Game.</p>

<p><strong>Watch the trailer </strong><a href="https://youtu.be/tYUymiCDOY8" target="_blank">here!</a></p>
<p><strong>Download the game! </strong><a href="SpaceDodgersGithub.zip" download="SpaceDodgers">WindowsOS</a></p>
<p><strong>Requires:</strong> python+pygame| WindowsOS</p>
<p><strong>Check out the GitHub <a href="https://github.com/ktorii/Space-Dodgers-1.2" target="_blank">here!</a></strong></p>
<ul class="list-inline">
	<li>Date: June 2013</li>
	<li>Game Developer: Ken Torii</li>
	<li>Category: Desktop PC Game</li>
</ul>
<button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button></div>
</div>
</div>
</div>
</div>
</div>

<!-- Portfolio Modal 2 -->

<div aria-hidden="true" class="portfolio-modal modal fade" id="portfolioModal2" role="dialog" tabindex="-1">
<div class="modal-content">
<div class="close-modal" data-dismiss="modal">
<div class="lr">
<div class="rl"></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="modal-body">
<h2>Front-End Widget Developing</h2>

<p class="item-intro text-muted">Designed a bank payment form widget for a client from Malaysia</p>
<img alt="" class="img-responsive img-centered" src="<?php echo base_url(); ?>img/paymentform.png" />
<p>The client had a design in mind for the user-interface of the payment form. This was given to me and I designed the widget exactly down to the same hex-color-code and programmed features wanted by the client. Bootstrap and JQuery were used to make the desktop and mobile interface as shown on the two right images. The widget uses the Google Translate Widget to be able to be shown in many different languages. The inputs have X&#39;s for easy deleting. The bank logo changes depending on the bank selected. A hand-over document was for the deisgn of the form also written so that any other developer could use or alter the design.</p>

<p></p>
<button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button></div>
</div>
</div>
</div>
</div>
</div>
<!-- Portfolio Modal 3 -->

<div aria-hidden="true" class="portfolio-modal modal fade" id="portfolioModal3" role="dialog" tabindex="-1">
<div class="modal-content">
<div class="close-modal" data-dismiss="modal">
<div class="lr">
<div class="rl"></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="modal-body"><!-- Project Details Go Here -->
<h2>Myro Robot Color Detector </h2>

<p class="item-intro text-muted">A team project to make a mini-game with a myro robot. The user types what colour to look for, and the myro robot tries to find it in square boundaries.</p>
<img alt="" class="img-responsive img-centered" src="<?php echo base_url(); ?>img/code.png" />
<p>The Myro Robot uses its camera and an algorithm is used to find what colour any box in front of it is. If the colour is the same as the user specifies, then the robot types in the terminal "YES" and then makes a long beep sound, to signify it has found the user&#39;s colour. If the box&#39;s colour is not the same, then the robot moves around the box and continues on to try to find the correct box colour. If the robot has run through the whole area and has not found the colour, then the robot says that it has not found the colour in the terminal. This was programmed using python and using the pygame and myro library. (The above code is part of another color detection task)</p>

<p>Contact me for any other questions at the bottom of the website.</p>
<button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button></div>
</div>
</div>
</div>
</div>
</div>

<!-- Portfolio Modal 4 -->

<div aria-hidden="true" class="portfolio-modal modal fade" id="portfolioModal4" role="dialog" tabindex="-1">
<div class="modal-content">
<div class="close-modal" data-dismiss="modal">
<div class="lr">
<div class="rl"></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="modal-body"><!-- Project Details Go Here -->
<h2>Dango Puck!</h2>

<p class="item-intro text-muted">Inspired by Mario Party 2's minigame: Speed Hockey. Made using the popular <strong>Unity5</strong> game dev software.</p>
<img alt="" class="img-responsive img-centered" src="<?php echo base_url(); ?>img/dangopuckpreviewmodal.png" />
<p>Combine the cuteness of mochi sticky rice balls and a classic game of speed hockey. You get Dango Puck! With the exception of the music, everything was made by me. All graphics, code, and audio clips were made by me.</p>

<p><strong>Download the game for </strong>
<a href="DangoPuckv1MacUniversal.zip" download="DangoPuckv1Mac" >MacOS</a>,
<a href="DangoPuckv1Win86.zip" download="DangoPuckv1Win86" >Windows</a>, or
<a href="DangoPuckv1LinuxUniversal.zip" download="DangoPuckv1Linux" >Linux Universal.</a>
</p>
<p><strong>Check out the GitHub <a href="https://github.com/ktorii/DangoPuckv1" target="_blank">here!</a></strong></p>


<p>Audio Development: Audacity and MAC's garageband. e.x: end game sound, score sounds, whistle sounds, etc.</p>
<p>Code Development: C#</p>
<p>Graphics Development: Blender, Adobe Photoshop, Illustrator. e.x: 3-d lamp objects, brick wall texture, main menu, how to play screen, etc.</p>
<p>Game Dev Software: Unity 5</p>
<ul class="list-inline">
	<li>Date: January 2017</li>
	<li>Game Developer: Ken Torii</li>
	<li>Category: Multi Platform Game</li>
</ul>
<button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button></div>
</div>
</div>
</div>
</div>
</div>
</div>

<!-- Portfolio Modal 5 -->

<div aria-hidden="true" class="portfolio-modal modal fade" id="portfolioModal5" role="dialog" tabindex="-1">
<div class="modal-content">
<div class="close-modal" data-dismiss="modal">
<div class="lr">
<div class="rl"></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="modal-body"><!-- Project Details Go Here -->
<h2>Straights Card Game</h2>

<p class="item-intro text-muted">A C++ gtkmm project</p>
<img alt="" class="img-responsive img-centered" src="<?php echo base_url(); ?>img/straights.png" />
<p>A classic card game with appropriate UI made with C++, object-oriented design patterns like MVC, and gtkmm toolkit.</p>
<div><strong>Due to University guidelines:</strong> the files for this game are not available for download online. If you would like to see the source and play the game, then please email me at ken.torii7@gmail.com and state who you are. </div>
<br>
<p><strong>Requires:</strong> gtkmm | LinuxOS</p>
<ul class="list-inline">
	<li>Date: July 2016</li>
	<li>Game Developer: Ken Torii</li>
	<li>Category: Linux C++ Game</li>
</ul>
<button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button>

</div>
</div>
</div>
</div>
</div>
</div>


<!-- Portfolio Modal 6 -->

<div aria-hidden="true" class="portfolio-modal modal fade" id="portfolioModal6" role="dialog" tabindex="-1">
<div class="modal-content">
<div class="close-modal" data-dismiss="modal">
<div class="lr">
<div class="rl"></div>
</div>
</div>

<div class="container">
<div class="row">
<div class="col-lg-8 col-lg-offset-2">
<div class="modal-body"><!-- Project Details Go Here -->
<h2>Custom Snake Game</h2>

<p class="item-intro text-muted">A C++ xlib project</p>
<img alt="" class="img-responsive img-centered" src="<?php echo base_url(); ?>img/snakepreview.png" />
<p>A classic snake game with appropriate UI made with C++, and the Xlib/X11 toolkit.</p>
<div><strong>Due to University guidelines:</strong> the files for this game are not available for download online. If you would like to see the source and play the game, then please email me at ken.torii7@gmail.com and state who you are. </div>
<br>
<p><strong>Requires:</strong> xlib | A running XServer</p>
<ul class="list-inline">
	<li>Date: January 2017</li>
	<li>Game Developer: Ken Torii</li>
	<li>Category: Multi-Platform C++ Game</li>
</ul>
<button class="btn btn-primary" data-dismiss="modal" type="button">Close Project</button>

</div>
</div>
</div>
</div>
</div>
</div>

</body>
</html>