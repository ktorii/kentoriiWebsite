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
$(document).ready(function() {
    $(".kt-tabs-component-content").hide();
    $("#aboutsite").show();
});
//tracking navbar

$("li").click(function() {

    //set global variables
    var city;
    var country;
    var page = $(this).text();

    //city and country
    $.get("http://ipinfo.io", function(response) {

        city = response.city;
        country = response.country;

    }, "jsonp");

    // current date
    var currentdate = new Date();
    var datetime = currentdate.getFullYear() + "-" +
        (currentdate.getMonth() + 1) + "-" +
        currentdate.getDate() + " " +
        currentdate.getHours() + ":" +
        currentdate.getMinutes() + ":" +
        currentdate.getSeconds();

    //call function
    updateNavbarTracking(page, datetime, city, country);


});

//ajax function
function updateNavbarTracking(page, time, city, country) {
    
    var data = [ page, time, city, country]
    
    $.ajax({
        url: 'index.php/landing/trackingnavigation',
        type: 'post',
        contentType: 'application/json',
        data: data
    });
}


//tracking landings
$(document).ready(function() {
    //set global variables
    var city;
    var country;

    //city and country
    $.get("http://ipinfo.io", function(response) {

        city = response.city;
        country = response.country;

    }, "jsonp");

    // current date
    var currentdate = new Date();
    var datetime = currentdate.getFullYear() + "-" +
        (currentdate.getMonth() + 1) + "-" +
        currentdate.getDate() + " " +
        currentdate.getHours() + ":" +
        currentdate.getMinutes() + ":" +
        currentdate.getSeconds();

    //call function
    updateLandingTracking(datetime, city, country);

});

//ajax function
function updateLandingTracking(time, city, country) {
   var data = [ time, city, country]; 
    
    $.ajax({
        url: 'index.php/landing/landingnavigation',
        type: 'post',
        contentType: 'application/json',
        data: data
    });
}