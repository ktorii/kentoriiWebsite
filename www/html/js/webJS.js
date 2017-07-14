function googleTranslateElementInit() {
	new google.translate.TranslateElement({
		pageLanguage: 'en',
		autoDisplay: false
	}, 'google_translate_element');
}

$(document).ready(function() {
	var random_greeting;
	var random_int = Math.floor((Math.random() * 3) + 1);
	if (random_int == 1) {
		random_greeting = "Hi!";
	} else if (random_int == 2) {
		random_greeting = "Yo! What's up?";
	} else {
		random_greeting = "Hey! How's it going?";
	}
	$("#randomGreeting").text(random_greeting);
	$(".kt-tabs-component-nav li a").click(function(e) {
		if (!$(this).hasClass('dropdown-toggle')) {
			e.preventDefault();
			$(".kt-tabs-component-nav li").removeClass("active");
			$(this).parent().addClass("active");
			$(".kt-tabs-component-content").hide();
			$(".kt-tabs-component-content" + $(this).attr('href')).fadeIn("slow");
		}
	});
	$("a.kt-tab-link").click(function(e) {
		e.preventDefault();
		$(".kt-tabs-component-nav li").removeClass("active");
		var tagId = $(this).attr('href');
		//console.log(tagId);
		$('.kt-tabs-component-nav li a[href="' + tagId + '"]').parent().addClass("active");
		$(".kt-tabs-component-content").hide();
		$(".kt-tabs-component-content" + $(this).attr('href')).fadeIn("slow");
	});
});
$(window).load(function() {
	$(".kt-tabs-component-content").hide();
	$("#aboutsite").show();
});
