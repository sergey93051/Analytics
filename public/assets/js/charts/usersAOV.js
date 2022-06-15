 const dateJson = dbchart();


 $(window).on("load", function() {


     var dateArr = [];
     var userArr = [];
     var aovArr = [];

     $.each(dateJson.data, function(i, json) {
         dateArr.push(json.date);
         userArr.push(json.User);
         aovArr.push(json.Aov);
     });

     dateArr = dateArr.slice(1).slice(-7);
     userArr = userArr.slice(1).slice(-7);
     aovArr = aovArr.slice(1).slice(-7);

     $("#start-date-1").attr("value", dateArr[0]);
     $("#end-date-1").attr("value", dateArr[dateArr.length - 1]);

     //Get the context of the Chart canvas element we want to select
     var ctx = $("#line-chart");
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
                 label: "Users",
                 data: userArr,
                 backgroundColor: "#A52A2A",
                 hoverBackgroundColor: "#A52A2A",
                 borderColor: "transparent"
             }, {
                 label: "AOV",
                 data: aovArr,
                 backgroundColor: "#0000FF",
                 hoverBackgroundColor: "#0000FF",
                 borderColor: "transparent"
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
     var usersAov = new Chart(ctx, config);

     $("#select-chart-item-1").on("change", function() {

         var thisVal = $(this);

         usersAov.config.data.datasets.forEach(function(e, i) {
             var meta = usersAov.getDatasetMeta(i);
             if (thisVal.val() == e.label) {
                 usersAov.getDatasetMeta(i).hidden = false;
                 usersAov.update();
             } else if (thisVal.val() == "all") {
                 meta.hidden = false;
                 usersAov.update();
             } else {
                 usersAov.getDatasetMeta(i).hidden = true;
                 usersAov.update();
             }

         });
     });


     $("#start-date-1,#end-date-1").on("change", function() {
         const newDate = [];
         const newUser = [];
         const newAov = [];

         const startDay = $("#start-date-1").val();
         const endDay = $("#end-date-1").val();

         $.each(dateJson.data, function(i, json) {
             if (json.date >= startDay && json.date <= endDay) {
                 newDate.push(json.date);
                 newUser.push(json.User);
                 newAov.push(json.Aov);
             }
         })
         usersAov.config.data.labels = newDate;
         usersAov.chart.data.datasets[0].data = newUser;
         usersAov.chart.data.datasets[1].data = newAov;
         usersAov.update();
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