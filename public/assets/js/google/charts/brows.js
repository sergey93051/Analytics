function brows(data, date) {

    const chartColorsArr = chartColors();

    const browsdataJson = data;
    const browserdateJson = date[0];

    var browser = [];
    var count = [];
    var colors = [];


    var dateJsonSum = sum(browsdataJson);

    $.each(browsdataJson, function(i, json) {
        colors.push(chartColorsArr[i]);
        browser.push(json.browser);
        var temppageCount = parseInt(json.count);
        count.push(
            Math.round(100 * temppageCount / dateJsonSum, 0)
        );
    });

    $(".start-date-browser").html(browserdateJson.data.startDate);
    $(".end-date-browser").html(browserdateJson.data.endDate);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#browser-chart");

    localStorage.setItem("prowserData", JSON.stringify(browsdataJson));


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
        labels: browser,
        datasets: [{
            label: "",
            data: count,
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
    var browserChart = new Chart(ctx, config);

    browserChart.innerHTML = browserChart.generateLegend();

    $(".select-browser-btn").on("click", function() {

        var day = $("#select-chart-browsershow").val();
        token_();
        $.ajax({
            url: "/private/admin/analytics/browserRequest",
            type: 'POST',
            data: {
                "day": day,
            },
            success: function(response) {

                var newbrowser = [];
                var newcount = [];
                var newcolors = [];
                var respDataSum = sum(response.analyticsData);

                $.each(response.analyticsData, function(i, item) {
                    newcolors.push(chartColorsArr[i]);
                    newbrowser.push(item.browser);
                    var rtemppageCount = parseInt(item.count);
                    newcount.push(
                        Math.round(100 * rtemppageCount / respDataSum, 0)
                    );
                });

                $(".start-date-browser").html(response.datebrowser[0].data.startDate);
                $(".end-date-browser").html(response.datebrowser[0].data.endDate);

                browserChart.chart.data.datasets[0].backgroundColor = newcolors;
                browserChart.config.data.labels = newbrowser;
                browserChart.chart.data.datasets[0].data = newcount;
                browserChart.update();
                browserChart.innerHTML = browserChart.generateLegend();

                localStorage.setItem("prowserData", JSON.stringify(response.analyticsData));


            },

        });

        //
    });

    function sum(data) {
        var sum = 0;
        $.each(data, function(i, json) {
            if ($.isNumeric(json.count)) {
                sum = (sum + parseInt(json.count));
            }
        })

        return sum;
    }
}