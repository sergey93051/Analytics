function channels(data, date) {

    const chartColorsArr = chartColors();

    const channeldataJson = data;
    const channeldateJson = date[0];
    var channel = [];
    var users = [];
    var colors = [];


    var dateJsonSum = sum(channeldataJson);

    $.each(channeldataJson, function(i, json) {
        colors.push(chartColorsArr[i]);
        channel.push(json.channel);
        var temppageCount = parseInt(json.users);
        users.push(
            Math.round(100 * temppageCount / dateJsonSum, 0)
        );
    });

    $(".start-date").html(channeldateJson.data.startDate);
    $(".end-date").html(channeldateJson.data.endDate);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#channel-chart");

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
        labels: channel,
        datasets: [{
            label: "",
            data: users,
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
    var channelChart = new Chart(ctx, config);

    channelChart.innerHTML = channelChart.generateLegend();

    $(".select-channel-btn").on("click", function() {

        var day = $("#select-chart-channelshow").val();
        token_();
        $.ajax({
            url: "/private/admin/analytics/userChannelRequest",
            type: 'POST',
            data: {
                "day": day,
            },
            success: function(response) {

                var newchannel = [];
                var newusers = [];
                var newcolors = [];
                var respDataSum = sum(response.ChannelanalyticsData);


                $.each(response.ChannelanalyticsData, function(i, item) {
                    newcolors.push(chartColorsArr[i]);
                    newchannel.push(item.channel);

                    var rtemppageCount = parseInt(item.users);

                    newusers.push(
                        Math.round(100 * rtemppageCount / respDataSum, 0)
                    );
                });

                $(".start-date").html(response.dateChannel[0].data.startDate);
                $(".end-date").html(response.dateChannel[0].data.endDate);
                channelChart.chart.data.datasets[0].backgroundColor = newcolors;
                channelChart.config.data.labels = newchannel;
                channelChart.chart.data.datasets[0].data = newusers;
                channelChart.update();
                channelChart.innerHTML = channelChart.generateLegend();

            },

        });

        //
    });

    // pageViwesModel(response.analyticsData);

    function sum(data) {
        var sum = 0;
        $.each(data, function(i, json) {
            if ($.isNumeric(json.users)) {
                sum = (sum + parseInt(json.users));
            }
        })

        return sum;
    }
}