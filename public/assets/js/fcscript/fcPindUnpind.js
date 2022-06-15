function PageLikePindorUnpind(data) {

    const dataJson = data;

    var pageName = [];
    var pageCount = [];
    var paid = 0;
    var unpaid = 0;
    var total = 0;


    $.each(dataJson.pagePind, function(i, json) {

        pageName.push(json.title);
        paid = +json.paid;
        unpaid = +json.unpaid;
        total = +json.total;

    });

    var ctx = $("#chart-paid-unpiad");

    var data = {
        labels: ['total', 'unpaid', 'paid'],
        datasets: [{
            label: pageName[0],
            data: [total, unpaid, paid],
            backgroundColor: [
                "yellow",
                'red',
                "green"
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
    new Chart(ctx, config);
}