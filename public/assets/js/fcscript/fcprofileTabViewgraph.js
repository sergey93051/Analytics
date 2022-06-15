function profileTabView(data) {

    const dataJson = data;

    var pageTitle = [];
    var pageCount = [];
    var end_time = '';

    $.each(dataJson, function(i, json) {

        if (json.data) {
            pageTitle.push(json.data.name);
            pageCount.push(json.data.value);
        }
        end_time = json.end_time;
    });

    $(".end-date-profTab").html(end_time);
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#profileTabView-chart");

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
        type: 'doughnut',
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
    var profTabChart = new Chart(ctx, config);

    $(".select-profTab-btn").on("click", function() {

        token_();
        $.ajax({
            url: "/private/admin/fb/profTabRequest",
            method: 'post',

            data: {
                'day': $("#select-chart-profTab").val(),
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
                var newend_time = '';


                $.each(response.profTabData, function(i, item) {

                    if (item.data) {
                        newpageTitle.push(item.data.name);
                        newpageCount.push(item.data.value);
                    }
                    newend_time = item.end_time

                });

                $(".end-date-profTab").html(newend_time);

                profTabChart.config.data.labels = newpageTitle;
                profTabChart.chart.data.datasets[0].data = newpageCount;
                profTabChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });


}