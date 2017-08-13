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


    $('#logout').click(function(event) {
        event.preventDefault();

        $.get('index.php/landing/logout',
            function(data) {
                location.reload();
            }
        );
    });

    $("#myBtn").click(function(event) {
        $("#myModal").modal("show");
    });

    //tracking navbar
    $(".navbar-tab").click(function() {
        page = $(this).text();
        trackUser(updateNavbarTracking, page);
    });

    //tracking landings
    trackUser(updateLandingTracking);

    $('#signInForm').submit(function(event) {
        event.preventDefault();

        $.post('index.php/landing/login',
            $('#signInForm').serializeArray(),
            function(data) {
                if (data == 'loggedIn') {
                    location.reload();
                } else {
                    $('#errorMessage').html(data);
                    $('#errorMessage').show();


                }
            }
        )
    });

});


$(document).ready(function() {
    $(".kt-tabs-component-content").hide();
    $("#aboutsite").show();
});



//ajax function
function updateNavbarTracking(time, city, country) {

    $.ajax({
        url: 'index.php/landing/trackingNavigation',
        type: 'post',
        dataType: 'json',
        data: { 'page': page, 'time': time, 'city': city, 'country': country }
    });
}

//ajax function
function updateLandingTracking(time, city, country) {


    $.ajax({
        url: 'index.php/landing/trackingLanding',
        type: 'post',
        dataType: 'json',
        data: { 'time': time, 'city': city, 'country': country }
    });
}

function trackUser(callback, page) {
    $.get("http://ipinfo.io", function(userlocation) {

        city = userlocation.city;
        country = userlocation.country;
        datetime = getDate();

        callback(datetime, city, country, page);
    }, 'jsonp');


}

function getDate() {
    // current date
    var currentdate = new Date();
    var datetime = currentdate.getFullYear() + "-" +
        (currentdate.getMonth() + 1) + "-" +
        currentdate.getDate() + " " +
        currentdate.getHours() + ":" +
        currentdate.getMinutes() + ":" +
        currentdate.getSeconds();

    return datetime;

}

function unlock(x) {
    x.classList.remove("fa-lock");
    x.classList.add("fa-unlock");
}

function lock(x) {
    x.classList.remove("fa-unlock");
    x.classList.add("fa-lock");
}