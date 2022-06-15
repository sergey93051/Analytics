function checkouts(data, date) {

    const dataJson = data;
    const dateJson = date[0];

    var pageTitle = [];
    var pageCount = [];

    $.each(dataJson, function(i, json) {

        pageTitle.push(json.pageTitle);
        pageCount.push(parseInt(json.pageCount));

    });

    $(".start-date-checkout").html(dateJson.data.startDate);
    $(".end-date-checkout").html(dateJson.data.endDate);
    checkoutModel(dataJson);
    var ctx = $("#column-chart");

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
                display: false,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: true,
                },
                scaleLabel: {
                    display: true,
                }
            }],
            yAxes: [{
                display: false,
                ticks: {
                    callback: function(value, index, values) {
                        return value;
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
            display: false,
            text: ''
        }
    };

    // Chart Data
    var chartData = {
        labels: pageTitle,
        datasets: [{
            label: "7 day",
            data: pageCount,
            backgroundColor: ["#A52A2A", "#80ff00", "#ff0000", "#ff0040"],

            borderColor: "transparent"
        }]
    };

    var config = {
        type: 'polarArea',
        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var cartCheckoutChart = new Chart(ctx, config);

    $(".select-chart-btn").on("click", function() {
        var day = $("#select-chart-checkoutView").val();
        token_();
        $.ajax({
            url: "/private/admin/analytics/checkoutRequest",
            type: 'POST',
            data: {
                "day": day,
            },
            success: function(response) {

                var newpageTitle = [];
                var newpageCount = [];

                $.each(response.analyticsData, function(i, item) {

                    newpageTitle.push(item.pageTitle);
                    newpageCount.push(item.pageCount);

                });

                $(".start-date-checkout").html(response.date[0].data.startDate);
                $(".end-date-checkout").html(response.date[0].data.endDate);

                cartCheckoutChart.config.data.labels = newpageTitle;
                cartCheckoutChart.chart.data.datasets[0].data = newpageCount;
                cartCheckoutChart.chart.data.datasets[0].label = response.day + " " + "day";
                cartCheckoutChart.update();
                checkoutModel(response.analyticsData);
            }
        });
    });


}
