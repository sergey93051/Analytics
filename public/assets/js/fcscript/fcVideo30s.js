function pageVideo30s(data) {

    const dataJson = data;

    var pageName = [];
    var pageCount = [];

    $.each(dataJson.data, function(i, json) {

        pageName.push(json.title);
        pageCount.push(json.value);

    });

    $(".end-date-pv30s").html(dataJson.end_time);
    var ctx = $("#chart-video-30s");

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
                            size: 18
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
    var pv30schart = new Chart(ctx, config);


    $(".select-pv30s-btn").on("click", function() {

        token_();
        $.ajax({
            url: "/private/admin/fb/pv30sRequest",
            method: 'post',
            data: {
                'day': $("#select-chart-pv30s").val(),
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

                $.each(response.pageVideo30sData.data, function(i, item) {

                    newpageTitle.push(item.title);
                    newpageCount.push(item.value);


                });

                $(".end-date-pv30s").html(response.pageVideo30sData.end_time);

                pv30schart.config.data.labels = newpageTitle;
                pv30schart.chart.data.datasets[0].data = newpageCount;
                pv30schart.update();
            },
            complete: function() {
                $("#loader").hide();
                $("body").css("opacity", "1");
            }
        });
    });

}