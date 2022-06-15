function country(data, date) {
    const chartColorsArr = chartColors();
    const countrydataJson = data;
    var countrydateJson = '';
    if (date) {
        countrydateJson = date[0];
    }
    var pageTitle = [];
    var pageCount = [];
    var colors = [];
    var dateJsonSum = sum(countrydataJson);
    $.each(countrydataJson, function(i, json) {

        colors.push(chartColorsArr[i]);
        pageTitle.push(json.country);
        var temppageCount = parseInt(json.count);
        pageCount.push(
            Math.round(100 * temppageCount / dateJsonSum, 0)
        );

    });
    if (date) {
        $(".start-date-country").html(countrydateJson.data.startDate);
        $(".end-date-country").html(countrydateJson.data.endDate);
    }
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#country-chart");

    // Chart Options
    var chartOptions = {
        responsive: false,
        maintainAspectRatio: true,
        responsiveAnimationDuration: 500,
        legend: {
            display: false
        },
        legendCallback: function(chart) {

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
    var countryChart = new Chart(ctx, config);

    countryChart.innerHTML = countryChart.generateLegend();

    $(".select-country-btn").on("click", function() {

        var day = $("#select-chart-countryshow").val();

        token_();
        $.ajax({
            url: "/private/admin/analytics/countryRequest",
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
                    newpageTitle.push(item.country);

                    var rtemppageCount = parseInt(item.count);

                    newpageCount.push(
                        Math.round(100 * rtemppageCount / respDataSum, 0)
                    );
                });

                $(".start-date-country").html(response.countrydate[0].data.startDate);
                $(".end-date-country").html(response.countrydate[0].data.endDate);

                countryChart.config.data.labels = newpageTitle;
                countryChart.chart.data.datasets[0].data = newpageCount;
                countryChart.chart.data.datasets[0].label = "";
                countryChart.chart.data.datasets[0].backgroundColor = newcolors;
                countryChart.update();
                countryChart.innerHTML = countryChart.generateLegend();

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