$(window).on("load", function() {

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-doughnut-chart");

    // Chart Options
    var chartOptions = {
        responsive: false,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
            display: false
        },
        legendCallback: function(chart) {
            var data = [];
            var ds = chart.data.datasets[0];
            var sum = ds.data.reduce(function add(a, b) {
                return a + b;
            }, 0);
            for (var i = 0; i < ds.data.length; i++) {
                ds.data[i] = ds.data[i] + " " + "/" + " " + Math.round(100 * ds.data[i] / sum, 0) + " " + "%";
            }
            // return ds.data[i];
        },
    };

    // Chart Data
    var chartData = {
        labels: ["social/facebook", "google/cpc", "(direct)/(none)", "google/organic", "social/twitter", "newsletter/email", "social/instagram"],
        datasets: [{
            label: "My First dataset",
            data: [13233.94, 12478.00, 24558.23, 19734.47, 9734.47, 19734.47, 19734.47],
            backgroundColor: ['#666EE8', '#28D094', '#FF4961', '#1E9FF2', '#FF9149', '#B0E0E6', '#8B008B'],
        }]
    };

    var config = {
        type: 'doughnut',

        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var totalChart3 = new Chart(ctx, config);

    totalChart3.innerHTML = totalChart3.generateLegend();

});