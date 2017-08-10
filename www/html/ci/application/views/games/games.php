{% extends "games/base.html" %}

{% block extra %}<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
{% endblock %}

{% block content %}

<div class="container kt-tabs-component-content clean-container-theme"><!--id="aboutsite"-->
	<div class="jumbotron strictly-no-background-color">
		<div class="container">
			<div class="text-center">
				<h1 class="section-heading"></h1>
			</div>
			<div class="col-sm-12 maintenance-info-box">
				{{ game_embed | raw }}
			</div>
		</div>
	</div>
</div>

{% endblock %}
