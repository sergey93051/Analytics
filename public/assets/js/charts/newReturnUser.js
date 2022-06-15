const dateUserJson = dbchart();

$(window).on("load", function() {

    var dateArr = [];
    var userArr = [];
    var retUserArr = [];

    $.each(dateUserJson.data, function(i, json) {
        dateArr.push(json.date);
        userArr.push(json.User);
        retUserArr.push(json.Aov);
    });

    dateArr = dateArr.slice(1).slice(-7);
    userArr = userArr.slice(1).slice(-7);
    retUserArr = retUserArr.slice(1).slice(-7);

    $("#start-date-4").attr("value", dateArr[0]);
    $("#end-date-4").attr("value", dateArr[dateArr.length - 1]);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart-2");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
            position: 'top',
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: true,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    callback: function(value, index, values) {
                        return "$" + value;
                    },
                    beginAtZero: true,
                },
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: true,
                },
                scaleLabel: {
                    display: true,
                }
            }]
        },
        title: {
            display: true,
            text: ''
        }
    };

    // Chart Data
    var chartData = {
        labels: dateArr,
        datasets: [{
            label: "New Users",
            data: userArr,
            backgroundColor: "#A52A2A",
            hoverBackgroundColor: "#A52A2A",
            borderColor: "transparent"
        }, {
            label: "Retuming Users",
            data: retUserArr,
            backgroundColor: "#0000FF",
            hoverBackgroundColor: "#0000FF",
            borderColor: "transparent"
        }, ]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var ChartretUser = new Chart(ctx, config);

    $("#select-chart-item-4").on("change", function() {

        var thisVal = $(this);

        ChartretUser.config.data.datasets.forEach(function(e, i) {
            var meta = ChartretUser.getDatasetMeta(i);
            if (thisVal.val() == e.label) {
                ChartretUser.getDatasetMeta(i).hidden = false;
                ChartretUser.update();
            } else if (thisVal.val() == "all") {
                meta.hidden = false;
                ChartretUser.update();
            } else {
                ChartretUser.getDatasetMeta(i).hidden = true;
                ChartretUser.update();
            }

        });
    });

    $("#start-date-4,#end-date-4").on("change", function() {
        const newDate = [];
        const newUser = [];
        const newretuser = [];

        const startDay = $("#start-date-4").val();
        const endDay = $("#end-date-4").val();

        $.each(dateUserJson.data, function(i, json) {
            if (json.date >= startDay && json.date <= endDay) {
                newDate.push(json.date);
                newUser.push(json.User);
                newretuser.push(json.Aov);
            }
        })
        ChartretUser.config.data.labels = newDate;
        ChartretUser.chart.data.datasets[0].data = newUser;
        ChartretUser.chart.data.datasets[1].data = newretuser;
        ChartretUser.update();
    });
});