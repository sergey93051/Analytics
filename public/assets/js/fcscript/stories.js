function stories(data) {

    const dataJson = data;

    var pageName = [];
    var pageCount = [];
    var end_time = '';


    $.each(dataJson, function(i, json) {
        if (json.data) {
            pageName.push(json.data.name);
            pageCount.push(json.data.value);
        }
        end_time = json.end_time;
    });
    $(".end-date").html(end_time);
    var ctx = $("#chart-stories");

    var data = {
        labels: pageName,
        datasets: [{
            label: '',
            data: pageCount,
            backgroundColor: [
                "#008000",
                "#0000FF",
                "#FFD700",
                "#B22222",
                "#4B0082",
                "#DC143C",
                "#00008B",
                "#008B8B",
                "#B8860B",
                "#8B008B",
            ]
        }]
    };

    const config = {
        type: 'polarArea',
        data: data,
        options: {
            responsive: true,
            scales: {
                r: {
                    pointLabels: {
                        display: true,
                        centerPointLabels: true,
                        font: {
                            size: 26
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    position: 'top',
                },
            }
        },
    };
    var storiesChart = new Chart(ctx, config);

    $(".select-stories-btn").on("click", function() {

        token_();
        $.ajax({
            url: "/private/admin/fb/storiesRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-stories").val(),
            },
            error: function(xhr, ajaxOptions, thrownError) {
                alert(xhr.status + " : " + thrownError);
            },
            beforeSend: function() {
                $("#loader").show();
                $("body").css("opacity", "0.6");
            },
            success: function(response) {

                var newpageTitle = [];
                var newpageCount = [];
                var newend_time = '';

                $.each(response.storiesData, function(i, item) {

                    if (item.data) {

                        newpageTitle.push(item.data.name);
                        newpageCount.push(item.data.value);
                    }
                    newend_time = item.end_time

                });

                $(".end-date").html(newend_time);

                storiesChart.config.data.labels = newpageTitle;
                storiesChart.chart.data.datasets[0].data = newpageCount;
                storiesChart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

}