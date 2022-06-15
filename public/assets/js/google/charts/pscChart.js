function pscChart(data, date) {

    var dateJson = date[0];
    var dataJson = data;
    var chartColorsArr = chartColors();

    var pageTitle = [];
    var pageCount = [];
    var colors = [];

    var dateJsonSum = sum(dataJson);

    $.each(dataJson, function(i, json) {
        colors.push(chartColorsArr[i]);
        pageTitle.push(json.pageTitle);
        var temppageCount = parseInt(json.pageCount);
        pageCount.push(
            Math.round(100 * temppageCount / dateJsonSum, 0)
        );
    });

    $(".start-date-psc").html(dateJson.data.startDate);
    $(".end-date-psc").html(dateJson.data.endDate);

    localStorage.setItem("pscData", JSON.stringify(dataJson));

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#psc-chart");

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
    var pageChart = new Chart(ctx, config);

    pageChart.innerHTML = pageChart.generateLegend();



    $(".select-psc-btn").on("click", function() {

        var day = $("#select-chart-pscView").val();

        token_();
        $.ajax({
            url: "/private/admin/analytics/pscRequest",
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

                    newpageTitle.push(item.pageTitle);

                    var rtemppageCount = parseInt(item.pageCount);

                    newpageCount.push(
                        Math.round(100 * rtemppageCount / respDataSum, 0)
                    );

                    newcolors.push(chartColorsArr[i]);

                });

                $(".start-date-psc").html(response.pscdate[0].data.startDate);
                $(".end-date-psc").html(response.pscdate[0].data.endDate);

                pageChart.chart.data.datasets[0].backgroundColor = newcolors;
                pageChart.config.data.labels = newpageTitle;
                pageChart.chart.data.datasets[0].data = newpageCount;
                pageChart.chart.data.datasets[0].label = "";
                pageChart.update();
                pageChart.innerHTML = pageChart.generateLegend();
                localStorage.setItem("pscData", JSON.stringify(response.analyticsData));
            },

        });
        //
    });

    function sum(data) {
        var sum = 0;
        $.each(data, function(i, json) {
            sum = (sum + parseInt(json.pageCount));
        })
        return sum;
    }
}
