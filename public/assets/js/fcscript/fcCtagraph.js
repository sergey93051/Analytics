function ctaPage(data) {

    const dataJson = data;


    var pageTitle = [];
    var pageCount = [];

    $.each(dataJson.data, function(i, json) {

        pageTitle.push(json.title);
        pageCount.push(parseInt(json.value));

    });


    $(".end-date").html(dataJson.end_time);

    var ctx = $("#cta-chart");

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
            label: "",
            data: pageCount,
            backgroundColor: ["#A52A2A", "#FFD700", "#7FFF00", "#D2691E"],

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
    var ctaChart = new Chart(ctx, config);

    $(".select-cta-btn").on("click", function() {
        token_();
        $.ajax({
            url: "/private/admin/fb/ctaRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-cta").val(),
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " : " + thrownError);
            },
            beforeSend: function() {
                $("#loader").show();
                $("body").css("opacity", "0.6");
            },
            success: function(response) {

                var newpageTitle = [];
                var newpageCount = [];

                $.each(response.ctaData.data, function(i, item) {

                    newpageTitle.push(item.title);
                    newpageCount.push(item.value);

                });


                $(".end-date").html(response.ctaData.end_time);

                ctaChart.config.data.labels = newpageTitle;
                ctaChart.chart.data.datasets[0].data = newpageCount;
                ctaChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

}