$('document').ready(function() {
    $.get(
        'index.php/landing/navigationChartData',
        function(data) {
            data = JSON.parse(data);
            adminGraphNavigation(data);


        }
    );

    $.get(
        'index.php/landing/landingChartData',
        function(data) {
            data = JSON.parse(data);
            adminGraphLanding(data);


        }
    );

});

function adminGraphLanding(data) {

    var monthlyData = [];
    for (var key in data) {
        monthlyData.push(data[key]);
    }
    console.log(monthlyData);

    var ctx = document.getElementById("landingChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: '# of Votes',
                data: monthlyData,
                backgroundColor: 'rgba(255, 99, 132, 0.2)',
                borderColor: 'rgba(255,99,132,1)',
                borderWidth: 1
            }]
        },
    });

}


function adminGraphNavigation(data) {


    var chartData = [];

    for (var key in data) {
        var monthlyData = [];

        for (var month in data[key]) {
            monthlyData.push(data[key][month]);
        }

        colour = 'rgb(' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ',' + (Math.floor(Math.random() * 256)) + ')';
        chartData.push({
            label: key,
            data: monthlyData,
            backgroundColor: colour,
            borderColor: colour,
            borderWidth: 1
        });

    }

    var ctx = document.getElementById("navigationChart");
    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(data[Object.keys(data)[0]]),
            datasets: chartData
        },
    });

}