function pIPage(data) {

    const dataJson = data;

    var pageTitle = [];
    var pageCount = [];

    $.each(dataJson.data, function(i, json) {

        pageTitle.push(json.title);
        pageCount.push(json.value);

    });

    $(".end-date").html(dataJson.end_time);
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#pI-chart");

    const newdata = {
        labels: pageTitle,
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
        type: 'bar',
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
    var piChart = new Chart(ctx, config);

    $(".select-pI-btn").on("click", function() {
        token_();
        $.ajax({
            url: "/private/admin/fb/piRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-pI").val(),
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

                $.each(response.pIData.data, function(i, item) {

                    newpageTitle.push(item.title);
                    newpageCount.push(item.value);

                });

                $(".end-date").html(response.pIData.end_time);

                piChart.config.data.labels = newpageTitle;
                piChart.chart.data.datasets[0].data = newpageCount;
                piChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });


}