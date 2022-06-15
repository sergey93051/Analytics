$(window).on("load", function() {

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#simple-pie-chart-3");

    // Chart Options
    var chartOptions = {
        responsive: false,
        maintainAspectRatio: true,
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
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
        labels: [
            "Pet Lovers",
            "Movie Lovers",
            "Outdoor Enthusiasts",
            "Shutterbugs",
            "Music Lovers",
            "Health & Fitness Buffs",
            "Water Sports Enthusiasts",
            "Social Media Enthusiasts",
            "Technophiles",
            "Travel Buffs"
        ],
        datasets: [{
            label: "",
            data: [165266.94, 178266.00, 208266.23, 227340.47, 197342.47, 297343.47, 217340.47, 217340.47, 197340.47],
            backgroundColor: ['#666EE8', '#28D094', '#FF4961', '#1E9FF2', '#FF9149', '#B0E0E6', '#8B008B', '#2F4F4F', '#228B22'],
        }]
    };

    var config = {
        type: 'pie',

        // Chart Options
        options: chartOptions,
        data: chartData
    };

    // Create the chart
    var totalChart2 = new Chart(ctx, config);

    totalChart2.innerHTML = totalChart2.generateLegend();

});