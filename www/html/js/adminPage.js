$('document').ready(function() {
    if ($('#chartApply').length) {

        getAdminCharts();

        $('#chartApply').click(function(event) {
            event.preventDefault();
            updateAdminCharts();

        });
    }
});

function adminGraphLanding(data) {

    var monthlyData = [];
    for (var key in data) {
        monthlyData.push(data[key]);
    }

    var ctx = document.getElementById("landingChart");
    ctx.style.width = '100%';
    ctx.style.height = '100%';

    ctx.width = ctx.offsetWidth;
    ctx.height = ctx.offsetHeight;

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(data),
            datasets: [{
                label: '# of Landings',
                data: monthlyData,
                backgroundColor: 'red',
                borderColor: 'red',
                fill: false,
            }]
        },
    });

}


function adminGraphNavigation(data) {
    var colours = ['red', 'blue', 'green', 'black', 'yellow', 'grey', 'purple', 'orange', 'pink', 'cyan', 'brown']
    var colourCount = 0
    var chartData = [];

    for (var key in data) {
        var monthlyData = [];

        for (var month in data[key]) {
            monthlyData.push(data[key][month]);
        }

        colour = colours[colourCount];
        colourCount++;
        chartData.push({
            label: key,
            data: monthlyData,
            backgroundColor: colour,
            borderColor: colour,
            fill: false,
        });

    }

    var ctx = document.getElementById("navigationChart");
    ctx.style.width = '100%';
    ctx.style.height = '100%';

    ctx.width = ctx.offsetWidth;
    ctx.height = ctx.offsetHeight;

    var myChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: Object.keys(data[Object.keys(data)[0]]),
            datasets: chartData
        },
    });

}

function getAdminCharts() {
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
}

function updateAdminCharts() {

    var formData = $('#adminForm').serializeArray();
    $.post(
        'index.php/landing/navigationChartData',
        formData,
        function(data) {
            data = JSON.parse(data);
            adminGraphNavigation(data);


        }
    );

    $.post(
        'index.php/landing/landingChartData',
        formData,
        function(data) {
            data = JSON.parse(data);
            adminGraphLanding(data);



        }
    );
}