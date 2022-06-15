function demographics(data) {

    const dataJson = data;

    var pageTitle = [];
    var pageCount = [];


    var dateJsonSum = sum(dataJson.data);

    $.each(dataJson.data, function(i, json) {

        pageTitle.push(json.title + " " + "%");

        var temppageCount = parseInt(json.value);
        pageCount.push(
            Math.round(100 * temppageCount / dateJsonSum, 0)
        );
    });

    $(".end-date").html(dataJson.end_time);
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#demographics-chart");


    // Chart Options
    var chartOptions = {
        elements: {
            line: {
                skipNull: true,
                drawNull: false,
            }
        },
        responsive: true,
        maintainAspectRatio: true,
        responsiveAnimationDuration: 500,
        legend: {
            display: false //This will do the task
        },
    };

    // Chart Data
    var chartData = {
        labels: pageTitle,
        datasets: [{
            label: "",
            data: pageCount,
            backgroundColor: [
                "#008000",
                "#ff0000",
            ],
        }]
    };

    var config = {
        type: 'polarArea',
        options: chartOptions,
        data: chartData
    };

    // Create the chart
    var demographicsChart = new Chart(ctx, config);

    // demographicsChart.innerHTML = demographicsChart.generateLegend();

    $(".select-demographics-btn").on("click", function() {

        token_();
        $.ajax({
            url: "/private/admin/fb/demographicsRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-demographics").val(),
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

                var dateJsonSumres = sum(response.demographicsData.data);

                $.each(response.demographicsData.data, function(i, json) {

                    newpageTitle.push(json.title + " " + "%");

                    var temppageCount = parseInt(json.value);

                    newpageCount.push(
                        Math.round(100 * temppageCount / dateJsonSumres, 0)
                    );

                });

                $(".end-date").html(response.demographicsData.end_time);

                demographicsChart.config.data.labels = newpageTitle;
                demographicsChart.chart.data.datasets[0].data = newpageCount;
                demographicsChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

    function sum(data) {
        var sum = 0;
        $.each(data, function(i, json) {
            sum = (sum + parseInt(json.value));
        })
        return sum;
    }

}
