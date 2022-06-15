var overaldb = overallDb();

$(window).on("load", function() {

    var dateArr = [];
    var faceArr = [];
    var googCpcArr = [];
    var googOrgArr = [];
    var twiArr = [];
    var emailArr = [];
    var instArr = [];

    $.each(overaldb.data, function(i, json) {

        dateArr.push(json.date);
        faceArr.push(json.fc);
        googCpcArr.push(json.googleCpc);
        googOrgArr.push(json.googleOrg);
        twiArr.push(json.twitter);
        emailArr.push(json.mailsoc);
        instArr.push(json.instagram);

    });


    dateArr = dateArr.slice(1).slice(-7);
    faceArr = faceArr.slice(1).slice(-7);
    googCpcArr = googCpcArr.slice(1).slice(-7);
    googOrgArr = googOrgArr.slice(1).slice(-7);
    twiArr = twiArr.slice(1).slice(-7);
    emailArr = emailArr.slice(1).slice(-7);
    instArr = instArr.slice(1).slice(-7);


    $("#start-date-3").attr("value", dateArr[0]);
    $("#end-date-3").attr("value", dateArr[dateArr.length - 1]);
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
                        return "$" + value;
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
        labels: dateArr,
        datasets: [{
                label: "social/facebook",
                data: faceArr,
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
                label: "google/cpc",
                data: googCpcArr,
                fill: false,
                borderDash: [5, 5],
                borderColor: "#0000FF",
                pointBorderColor: "#0000FF",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },
            {
                label: "google/organic",
                data: googOrgArr,
                fill: false,
                borderDash: [7, 7],
                borderColor: "#DEB887",
                pointBorderColor: "#DEB887",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },
            {
                label: "social/twitter",
                data: twiArr,
                fill: false,
                borderDash: [7, 7],
                borderColor: "#FF4961",
                pointBorderColor: "#FF4961",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },
            {
                label: "newsletter/email",
                data: emailArr,
                fill: false,
                borderDash: [7, 7],
                borderColor: "#8A2BE2",
                pointBorderColor: "#8A2BE2",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
            },
            {
                label: "social/instagram",
                data: instArr,
                fill: false,
                borderDash: [7, 7],
                borderColor: "#5F9EA0",
                pointBorderColor: "#5F9EA0",
                pointBackgroundColor: "#FFF",
                pointBorderWidth: 2,
                pointHoverBorderWidth: 2,
                pointRadius: 4,
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
    var overallChart = new Chart(ctx, config);

    $("#select-chart-item-3").on("change", function() {

        var thisVal = $(this);

        overallChart.config.data.datasets.forEach(function(e, i) {
            var meta = overallChart.getDatasetMeta(i);
            if (thisVal.val() == e.label) {
                overallChart.getDatasetMeta(i).hidden = false;
                overallChart.update();
            } else if (thisVal.val() == "all") {
                meta.hidden = false;
                overallChart.update();
            } else {
                overallChart.getDatasetMeta(i).hidden = true;
                overallChart.update();
            }
        });
    });

    $("#start-date-3,#end-date-3").on("change", function() {

        const newdateArr = [];
        const newfaceArr = [];
        const newgoogCpcArr = [];
        const newgoogOrgArr = [];
        const newtwiArr = [];
        const newemailArr = [];
        const newinstArr = [];

        const startDay = $("#start-date-3").val();
        const endDay = $("#end-date-3").val();

        $.each(overaldb.data, function(i, json) {

            if (json.date >= startDay && json.date <= endDay) {
                newdateArr.push(json.date);
                newfaceArr.push(json.fc);
                newgoogCpcArr.push(json.googleCpc);
                newgoogOrgArr.push(json.googleOrg);
                newtwiArr.push(json.twitter);
                newemailArr.push(json.mailsoc);
                newinstArr.push(json.instagram);
            }
        });

        overallChart.config.data.labels = newdateArr;
        overallChart.chart.data.datasets[0].data = newfaceArr;
        overallChart.chart.data.datasets[1].data = newgoogCpcArr;
        overallChart.chart.data.datasets[2].data = newgoogOrgArr;
        overallChart.chart.data.datasets[3].data = newtwiArr;
        overallChart.chart.data.datasets[4].data = newemailArr;
        overallChart.chart.data.datasets[5].data = newinstArr;
        overallChart.update();

    });
});