const revenueDb = socialDb();
$(window).on("load", function() {

    var dateArr = [];
    var faceArr = [];
    var googCpcArr = [];
    var googOrgArr = [];
    var twiArr = [];
    var emailArr = [];
    var instArr = [];

    $.each(revenueDb.data, function(i, json) {

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


    $("#start-date-2").attr("value", dateArr[0]);
    $("#end-date-2").attr("value", dateArr[dateArr.length - 1]);

    //Get the context of the Chart canvas element we want to select
    var ctx = $("#column-chart");

    // Chart Options
    var chartOptions = {
        // Elements options apply to all of the options unless overridden in a dataset
        // In this case, we are setting the border of each bar to be 2px wide and green
        elements: {
            rectangle: {
                borderWidth: 2,
                borderColor: 'rgb(0, 255, 0)',
                borderSkipped: 'bottom'
            }
        },
        responsive: true,
        maintainAspectRatio: false,
        responsiveAnimationDuration: 500,
        legend: {
            position: 'top',
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
                }
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
                    drawTicks: true,
                },
                scaleLabel: {
                    display: true,
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
                backgroundColor: "#A52A2A",
                hoverBackgroundColor: "#A52A2A",
                borderColor: "transparent"
            }, {
                label: "google/cpc",
                data: googCpcArr,
                backgroundColor: "#0000FF",
                hoverBackgroundColor: "#0000FF",
                borderColor: "transparent"
            },
            {
                label: "google/organic",
                data: googOrgArr,
                backgroundColor: "#DEB887",
                hoverBackgroundColor: "#DEB887",
                borderColor: "transparent"
            },
            {
                label: "social/twitter",
                data: twiArr,
                backgroundColor: "#FF4961",
                hoverBackgroundColor: "#FF4961",
                borderColor: "transparent"
            },
            {
                label: "newsletter/email",
                data: emailArr,
                backgroundColor: "#8A2BE2",
                hoverBackgroundColor: "#8A2BE2",
                borderColor: "transparent"
            },
            {
                label: "social/instagram",
                data: instArr,
                backgroundColor: "#5F9EA0",
                hoverBackgroundColor: "#5F9EA0",
                borderColor: "transparent"
            },
        ]
    };

    var config = {
        type: 'bar',

        // Chart Options
        options: chartOptions,

        data: chartData
    };

    // Create the chart
    var revenueChart = new Chart(ctx, config);

    $("#select-chart-item-2").on("change", function() {

        var thisVal = $(this);

        revenueChart.config.data.datasets.forEach(function(e, i) {
            var meta = revenueChart.getDatasetMeta(i);
            if (thisVal.val() == e.label) {
                revenueChart.getDatasetMeta(i).hidden = false;
                revenueChart.update();
            } else if (thisVal.val() == "all") {
                meta.hidden = false;
                revenueChart.update();
            } else {
                revenueChart.getDatasetMeta(i).hidden = true;
                revenueChart.update();
            }
        });
    });

    $("#start-date-2,#end-date-2").on("change", function() {

        const newdateArr = [];
        const newfaceArr = [];
        const newgoogCpcArr = [];
        const newgoogOrgArr = [];
        const newtwiArr = [];
        const newemailArr = [];
        const newinstArr = [];

        const startDay = $("#start-date-2").val();
        const endDay = $("#end-date-2").val();

        $.each(revenueDb.data, function(i, json) {
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

        revenueChart.config.data.labels = newdateArr;
        revenueChart.chart.data.datasets[0].data = newfaceArr;
        revenueChart.chart.data.datasets[1].data = newgoogCpcArr;
        revenueChart.chart.data.datasets[2].data = newgoogOrgArr;
        revenueChart.chart.data.datasets[3].data = newtwiArr;
        revenueChart.chart.data.datasets[4].data = newemailArr;
        revenueChart.chart.data.datasets[5].data = newinstArr;
        revenueChart.update();
    });
});