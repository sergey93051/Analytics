function city(data, date) {
    const chartColorsArr = chartColors();
    const citydataJson = data;
    const citydateJson = date[0];

    var pageTitle = [];
    var pageCount = [];
    var colors = [];

    var dateJsonSum = sum(citydataJson);

    $.each(citydataJson, function(i, json) {
        colors.push("#ffff00");
        colors.push(chartColorsArr[i]);
        pageTitle.push(json.city);
        var temppageCount = parseInt(json.count);
        pageCount.push(
            Math.round(100 * temppageCount / dateJsonSum, 0)
        );

    });

    $(".start-date-city").html(citydateJson.data.startDate);
    $(".end-date-city").html(citydateJson.data.endDate);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#city-chart");

    // Chart Options
    var chartOptions = {
        responsive: false,
        maintainAspectRatio: true,
        responsiveAnimationDuration: 500,
        legend: {
            display: false
        },
        legendCallback: function(chart) {

            var data = [];
            var ds = chart.data.datasets[0];

            for (var i = 0; i < ds.data.length; i++) {
                ds.data[i] = ds.data[i] + " " + "%";
            }
        },
    };
    // Chart Data
    var chartData = {
        labels: pageTitle,
        datasets: [{
            label: "",
            data: pageCount,
            backgroundColor: colors,
        }]
    };

    var config = {
        type: 'pie',
        // Chart Options
        options: chartOptions,
        data: chartData
    };

    // Create the chart
    var cityChart = new Chart(ctx, config);

    cityChart.innerHTML = cityChart.generateLegend();

    $(".select-city-btn").on("click", function() {

        var day = $("#select-chart-cityshow").val();

        token_();
        $.ajax({
            url: "/private/admin/analytics/cityRequest",
            type: 'POST',
            data: {
                "day": day,
            },
            success: function(response) {

                var newpageTitle = [];
                var newpageCount = [];
                var newcolors = [];
                var respDataSum = sum(response.analyticsData);

                $.each(response.analyticsData, function(i, item) {
                    newcolors.push(chartColorsArr[i]);
                    newpageTitle.push(item.city);

                    var rtemppageCount = parseInt(item.count);

                    newpageCount.push(
                        Math.round(100 * rtemppageCount / respDataSum, 0)
                    );
                });

                $(".start-date-city").html(response.date[0].data.startDate);
                $(".end-date-city").html(response.date[0].data.endDate);

                cityChart.config.data.labels = newpageTitle;
                cityChart.chart.data.datasets[0].data = newpageCount;
                cityChart.chart.data.datasets[0].backgroundColor = newcolors;
                cityChart.update();
                cityChart.innerHTML = cityChart.generateLegend();

            },

        });

        //
    });

    // pageViwesModel(response.analyticsData);


    function sum(data) {
        var sum = 0;
        $.each(data, function(i, json) {
            sum = (sum + parseInt(json.count));
        })
        return sum;
    }
}