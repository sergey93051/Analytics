function customerDetails(data) {

    const dateJsonCustomer = data;

    var customerCount = [];
    var TotalSpent = [];
    var date = [];

    $.each(dateJsonCustomer, function(i, json) {

        customerCount.push(json.count);
        TotalSpent.push(json.total_spent);
        date.push(json.created_at);

    });

    date = date.slice(0).slice(-7);
    TotalSpent = TotalSpent.slice(0).slice(-7);
    customerCount = customerCount.slice(0).slice(-7);
    date = date.reverse();

    $("#start-date-customersDetails").attr("value", date[0]);
    $("#end-date-customersDetails").attr("value", date[date.length - 1]);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#custSpent-chart");
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
                    display: true,
                    labelString: ''
                }
            }],
            yAxes: [{
                display: false,
                ticks: {
                    callback: function(value, index, values) {
                        return value;
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
                label: "New Customers",
                data: customerCount,
                backgroundColor: "#ffffff",
                hoverBackgroundColor: "#ff00ff",
                borderColor: "#ff00ff"
            },
            {
                label: "Total Spent",
                data: TotalSpent,
                backgroundColor: "#ffffff",
                hoverBackgroundColor: "#0000FF",
                borderColor: "#0000FF"
            },

        ]
    };

    var config = {
        type: 'line',

        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var customerCharts = new Chart(ctx, config);



    $("#select-chart-customersDetails").on("change", function() {

        var thisVal = $(this);

        customerCharts.config.data.datasets.forEach(function(e, i) {
            var meta = customerCharts.getDatasetMeta(i);
            if (thisVal.val() == e.label) {
                customerCharts.getDatasetMeta(i).hidden = false;
                customerCharts.update();
            } else if (thisVal.val() == "all") {
                meta.hidden = false;
                customerCharts.update();
            } else {
                customerCharts.getDatasetMeta(i).hidden = true;
                customerCharts.update();
            }
        });
    });

    $(".btn-chart-customersDetails").on("click", function() {

        var newcustomerCount = [];
        var newTotalSpent = [];
        var newdate = [];

        const startDay = $("#start-date-customersDetails").val();
        const endDay = $("#end-date-customersDetails").val();

        $.each(dateJsonCustomer, function(i, item) {

            if (item.created_at >= startDay && item.created_at <= endDay) {

                newcustomerCount.push(item.count);
                newTotalSpent.push(item.total_spent);
                newdate.push(item.created_at);
            }
        });

        newdate = newdate.reverse();
        customerCharts.config.data.labels = newdate;
        customerCharts.chart.data.datasets[0].data = newcustomerCount;
        customerCharts.chart.data.datasets[1].data = newTotalSpent;

        customerCharts.update();

    });

}