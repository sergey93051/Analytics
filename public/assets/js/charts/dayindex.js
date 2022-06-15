const dateJson2 = dbchart();


$(window).on("load", function() {

    var dateArr = [];
    var userArr = [];

    $.each(dateJson2.data, function(i, json) {
        dateArr.push(json.date);
        userArr.push(json.User);
    });

    dateArr = dateArr.slice(1).slice(-7);
    userArr = userArr.slice(1).slice(-7);


    $("#start-date-5").attr("value", dateArr[0]);
    $("#end-date-5").attr("value", dateArr[dateArr.length - 1]);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#dayindex");
    // Chart Options
    var chartOptions = {
        responsive: true,
        maintainAspectRatio: false,
        legend: {
            display: false,
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
                display: true,
                ticks: {
                    beginAtZero: true,
                },
                gridLines: {
                    color: "#f3f3f3",
                    drawTicks: true,
                },
                scaleLabel: {
                    display: false,
                    labelString: 'Users'
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
        labels: dateArr,
        datasets: [{
            label: "",
            data: userArr,
            backgroundColor: "#FFFFFF",
            // hoverBackgroundColor: "#A52A2A",
            borderColor: "#708090"
        }, ]
    };

    var config = {
        type: 'line',
        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var usersindex = new Chart(ctx, config);

    $("#select-chart-item-5").on("change", function() {

        var thisVal = $(this);

        usersindex.config.data.datasets.forEach(function(e, i) {

            if (thisVal.val() != e.label) {
                usersindex.getDatasetMeta(i).hidden = true;
                usersindex.update();
            } else {
                usersindex.getDatasetMeta(i).hidden = false;
                usersindex.update();
            }

        });
    });


    $("#start-date-5,#end-date-5").on("change", function() {
        const newDate = [];
        const newUser = [];

        const startDay = $("#start-date-5").val();
        const endDay = $("#end-date-5").val();

        $.each(dateJson2.data, function(i, json) {
            if (json.date >= startDay && json.date <= endDay) {
                newDate.push(json.date);
                newUser.push(json.User);
            }
        })
        usersindex.config.data.labels = newDate;
        usersindex.chart.data.datasets[0].data = newUser;
        usersindex.update();
    });


    //  $("#select-chart-count-1").on("change", function() {
    //      if ($(this).val() == "7") {
    //          newDate = dateArr.slice(1).slice(-7);
    //          newUser = userArr.slice(1).slice(-7);
    //          newAov = aovArr.slice(1).slice(-7);

    //          usersAov.config.data.labels = newDate;
    //          usersAov.chart.data.datasets[0].data = newUser;
    //          usersAov.chart.data.datasets[1].data = newAov;
    //          usersAov.update();

    //      } else if ($(this).val() == "14") {
    //          newDate = dateArr.slice(1).slice(-14);
    //          newUser = userArr.slice(1).slice(-14);
    //          newAov = aovArr.slice(1).slice(-14);

    //          usersAov.config.data.labels = newDate;
    //          usersAov.chart.data.datasets[0].data = newUser;
    //          usersAov.chart.data.datasets[1].data = newAov;
    //          usersAov.update();
    //      }
    //  });

});