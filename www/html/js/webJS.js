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

    adminGraph();
});
$(document).ready(function() {
    $(".kt-tabs-component-content").hide();
    $("#aboutsite").show();
});

function adminGraph() {
    var ctx = document.getElementById("chart");
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: ["Red", "Blue", "Yellow", "Green", "Purple", "Orange"],
            datasets: [{
                label: '# of Votes',
                data: [12, 19, 3, 5, 2, 3],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(255,99,132,1)',
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                yAxes: [{
                    ticks: {
                        beginAtZero: true
                    }
                }]
            }
        }
    });
}