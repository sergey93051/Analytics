function anyPagesView(data, date) {



    const chartColorsArr = chartColors();

    var dataJsonany = data;
    var dateJsonany = date[0];

    var pageTitle = [];
    var pageCount = [];
    var colors = [];

    $.each(dataJsonany, function(i, json) {
        colors.push(chartColorsArr[i]);
        pageTitle.push(json.pageTitle);
        pageCount.push(json.pageCount);
    });

    $(".start-date-any").html(dateJsonany.data.startDate);
    $(".end-date-any").html(dateJsonany.data.endDate);
    //Get the context of the Chart canvas element we want to select

    localStorage.setItem("anyPagedata", JSON.stringify([dataJsonany, $("#select-anychart-pageView").val()]));


    var ctx = $("#any-chart");

    // Chart Options
    var chartOptions = {
        elements: {
            line: {
                skipNull: true,
                drawNull: false,
            }
        },
        responsive: false,
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
    var anyChart = new Chart(ctx, config);

    anyChart.innerHTML = anyChart.generateLegend();


    $(".select-anychart-btn").on("click", function() {

        var day = $("#select-anychart-pageView").val();

        token_();
        $.ajax({
            url: "/private/admin/analytics/anypageViewsRequest",
            type: 'POST',
            data: {
                "day": day,
            },
            success: function(response) {

                var newpageTitle = [];
                var newpageCount = [];
                var newcolors = [];

                localStorage.setItem("anyPagedata", JSON.stringify([response.analyticsData, day]));

                $.each(response.analyticsData, function(i, item) {
                    newpageTitle.push(item.pageTitle);
                    newpageCount.push(item.pageCount);
                    newcolors.push(chartColorsArr[i]);
                });

                $(".start-date-any").html(response.anyPageDate[0].data.startDate);
                $(".end-date-any").html(response.anyPageDate[0].data.endDate);

                anyChart.config.data.labels = newpageTitle;
                anyChart.chart.data.datasets[0].backgroundColor = newcolors;
                anyChart.chart.data.datasets[0].data = newpageCount;
                anyChart.chart.data.datasets[0].label = "";
                anyChart.update();
                anyChart.innerHTML = anyChart.generateLegend();
            }
        });

    });

}
