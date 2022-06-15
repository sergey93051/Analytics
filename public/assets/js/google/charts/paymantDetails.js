function paymantDetails(date) {

    const dateJson2 = date;

    var price = [];
    var date = [];
    var taxes = [];
    var discounts = [];

    $.each(dateJson2, function(i, json) {

        date.push(json.create_date);
        price.push(json.total_price);
        taxes.push(json.total_tax);
        discounts.push(json.total_discounts);

    });

    date = date.slice(0).slice(-7);
    price = price.slice(0).slice(-7);
    taxes = taxes.slice(0).slice(-7);
    discounts = discounts.slice(0).slice(-7);

    $("#start-date-paymentDetails").attr("value", date[0]);
    $("#end-date-paymentDetails").attr("value", date[date.length - 1]);
    //Get the context of the Chart canvas element we want to select
    var ctx = $("#line-chart-2");

    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            position: 'bottom',
        },
        hover: {
            mode: 'label'
        },
        scales: {
            xAxes: [{
                display: true,
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: true,
                },
                scaleLabel: {
                    display: false,
                    labelString: ''
                },

            }],
            yAxes: [{
                display: true,
                ticks: {
                    callback: function(value, index, values) {
                        return dateJson2[0].currency + " " + value;
                    },
                    beginAtZero: true,
                },
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: false,
                },
                scaleLabel: {
                    display: false,
                    labelString: 'Value'
                }
            }]
        },
        title: {
            display: true,
            text: ''
        }
    };
    // Chart Data
    var chartData = {
        labels: date,
        datasets: [{
                label: "Taxes",
                data: taxes,
                fill: false,
                borderDash: [5, 5],
                borderColor: "#A52A2A",
                pointBorderColor: "#A52A2A",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },
            {
                label: "Prices",
                data: price,
                fill: false,
                borderDash: [10, 10],
                borderColor: "#00ff00",
                pointBorderColor: "#00ff00",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },
            {
                label: "Discounts",
                data: discounts,
                fill: false,
                borderDash: [3, 3],
                borderColor: "#0040ff",
                pointBorderColor: "#0040ff",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            }

        ]
    };
    var config = {
        type: 'line',
        // Chart Options
        options: chartOptions,
        data: chartData
    };

    // Create the chart
    var paymantDetails = new Chart(ctx, config);

    $("#select-chart-paymentDetails").on("change", function() {

        var thisVal = $(this);

        paymantDetails.config.data.datasets.forEach(function(e, i) {
            var meta = paymantDetails.getDatasetMeta(i);
            if (thisVal.val() == e.label) {
                paymantDetails.getDatasetMeta(i).hidden = false;
                paymantDetails.update();
            } else if (thisVal.val() == "all") {
                meta.hidden = false;
                paymantDetails.update();
            } else {
                paymantDetails.getDatasetMeta(i).hidden = true;
                paymantDetails.update();
            }
        });
    });

    $(".btn-chart-paymentDetails").on("click", function() {

        var newprice = [];
        var newdate = [];
        var newtaxes = [];
        var newdiscounts = [];

        const startDay = $("#start-date-paymentDetails").val();
        const endDay = $("#end-date-paymentDetails").val();

        $.each(dateJson2, function(i, item) {

            if (item.create_date >= startDay && item.create_date <= endDay) {
                newdate.push(item.create_date);
                newprice.push(item.total_price);
                newtaxes.push(item.total_tax);
                newdiscounts.push(item.total_discounts);
            }
        });

        paymantDetails.config.data.labels = newdate;
        paymantDetails.chart.data.datasets[0].data = newtaxes;
        paymantDetails.chart.data.datasets[1].data = newprice;
        paymantDetails.chart.data.datasets[2].data = newdiscounts;
        paymantDetails.update();
    });
}