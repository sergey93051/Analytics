$(window).on("load", function() {

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-pie-chart");

    // Chart Options
    var chartOptions = {
        responsive: false,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
            display: false
        },
        legendCallback: function(chart) {
            var text = [];
            var ds = chart.data.datasets[0];

            var sum = ds.data.reduce(function add(a, b) {
                return a + b;
            }, 0);

            for (var i = 0; i < ds.data.length; i++) {
                ds.data[i] = ds.data[i] + "/" + Math.round(100 * ds.data[i] / sum, 0) + " " + "%";
            }
            return text.join("");
        },

    };
    // Chart Data
    var chartData = {
        labels: ["new Users", "returning User"],
        datasets: [{
            label: "",
            data: [15000, 12000],
            backgroundColor: ['#666EE8', '#28D094'],
        }]
    };

    var config = {
        type: 'pie',
        // Chart Options
        options: chartOptions,

        data: chartData
    };
    // Create the chart
    var totalChart = new Chart(ctx, config);

    totalChart.innerHTML = totalChart.generateLegend();


});