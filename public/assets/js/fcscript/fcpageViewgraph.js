function pageView(data) {

    const dataJson = data;

    var pageTitle = [];
    var pageCount = [];

    $.each(dataJson.data, function(i, json) {

        pageTitle.push(json.title);
        pageCount.push(json.value);

    });

    $(".end-date").html(dataJson.end_time);
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#pageView-chart");

    const newdata = {
        labels: pageTitle,
        datasets: [{
            label: '',
            data: pageCount,
            backgroundColor: [
                "#008000",
                "#0000FF",
                "#8B008B",
                "#FFD700",
                "#4B0082",
                "#B22222",
                "#DC143C",
                "#00008B",
                "#008B8B",
                "#B8860B",

            ],
            borderColor: [
                "#008000",
                "#0000FF",
                "#8B008B",
                "#FFD700",
                "#4B0082",
                "#B22222",
                "#DC143C",
                "#00008B",
                "#008B8B",
                "#B8860B",

            ],
        }]
    };
    const config = {
        type: 'polarArea',
        responsive: true,
        data: newdata,
        options: {
            legend: {
                display: false
            },
            scales: {
                xAxes: [{
                    display: false,
                    gridLines: {
                        color: "#f3f3f3",
                        drawTicks: false,
                    },
                    scaleLabel: {
                        display: false,
                        labelString: ''
                    }
                }],
                yAxes: [{
                    display: true,
                    ticks: {
                        // callback: function(value, index, values) {
                        //     return value;
                        // },
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
        }
    };

    // Create the chart
    var pageViewDataChart = new Chart(ctx, config);

    $(".select-view-btn").on("click", function() {

        token_();
        $.ajax({
            url: "/private/admin/fb/pageViewRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-view").val(),
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


                $.each(response.pageViewData.data, function(i, item) {

                    newpageTitle.push(item.title);
                    newpageCount.push(item.value);

                });

                $(".end-date").html(response.pageViewData.end_time);

                pageViewDataChart.config.data.labels = newpageTitle;
                pageViewDataChart.chart.data.datasets[0].data = newpageCount;
                pageViewDataChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });



}