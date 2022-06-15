function pvv(data) {
    const dataJson = data;

    var pageName = [];
    var pageCount = [];

    $.each(dataJson.data, function(i, json) {

        pageName.push(json.title);
        pageCount.push(json.value);

    });

    // $(".end-date").html(dataJson.end_time);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#pvv-chart");

    const newdata = {
        labels: pageName,
        datasets: [{
            label: '',
            data: pageCount,
            backgroundColor: [
                "#008000",
                "#0000FF",
                "#FFD700",
                "#B22222",
                "#4B0082",
                "#DC143C",
                "#00008B",
                "#008B8B",
                "#B8860B",
                "#8B008B",
            ],
            borderColor: [
                "#008000",
                "#0000FF",
                "#FFD700",
                "#B22222",
                "#4B0082",
                "#DC143C",
                "#00008B",
                "#008B8B",
                "#B8860B",
                "#8B008B",
            ],
        }]
    };
    const config = {
        type: 'horizontalBar',
        responsive: true,
        data: newdata,
        options: {
            legend: {
                display: false
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
    var pvvChart = new Chart(ctx, config);

    $(".select-pvv-btn").on("click", function() {

        token_();
        $.ajax({
            url: "/private/admin/fb/pvvRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-pvv").val(),
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

                $.each(response.pageVideoViewData.data, function(i, item) {

                    newpageTitle.push(item.title);
                    newpageCount.push(item.value);

                });

                $(".end-date").html(response.pageVideoViewData.end_time);

                pvvChart.config.data.labels = newpageTitle;
                pvvChart.chart.data.datasets[0].data = newpageCount;
                pvvChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

}