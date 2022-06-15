function cart(data) {

    const dateJson = data;

    var pageCount = [];
    var date = [];

    $.each(dateJson, function(i, json) {
        pageCount.push(json.pageCount);
        date.push(json.date);
    });

    $("#start-date-cart").attr("value", date[0]);
    $("#end-date-cart").attr("value", date[date.length - 1]);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#line-chart");
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
        hover: {
            mode: 'label'
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
                    labelString: ''
                }
            }],
            yAxes: [{
                display: true,
                ticks: {
                    callback: function(value, index, values) {
                        return value;
                    },
                    beginAtZero: true,
                },
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: false,
                    labelString: 'Value'
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
        labels: date,
        datasets: [{
            label: dateJson[0] != undefined ? dateJson[0].pageTitle : "",
            data: pageCount,
            backgroundColor: "#ff4000",
            //  hoverBackgroundColor: "#0000FF",
        }, ]
    };
    var config = {
        type: 'line',
        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var cartCharts = new Chart(ctx, config);

    $(".btn-filter-cart").on("click", function() {

        const newDate = [];
        const newpageCount = [];

        const startDay = $("#start-date-cart").val();
        const endDay = $("#end-date-cart").val();

        token_();

        $.ajax({
            url: "/private/admin/analytics/cartRequest",
            type: 'POST',
            data: {

                "startDay": startDay,
                "endDay": endDay
            },
            success: function(response) {

                $.each(response.analyticsData, function(i, item) {
                    if (item.date >= startDay && item.date <= endDay) {
                        newDate.push(item.date);
                        newpageCount.push(item.pageCount);
                    }
                });

                cartCharts.config.data.labels = newDate;
                cartCharts.chart.data.datasets[0].data = newpageCount;
                cartCharts.update();
            }
        });

    });

}