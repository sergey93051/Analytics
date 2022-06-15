function ordersData(data) {
    var table = $('#orderShopifyTable').DataTable({
        "scrollX": true,
        "processing": true,
        "scrollCollapse": true,
        data: data,
        columns: [{
                data: "count"
            },
            {
                data: "name"
            },
            {
                data: "total_weight"
            },
            {
                data: "email"
            },
            {
                data: "phone"
            },
            {
                data: "estimated_taxes"
            },
            {
                data: "financial_status"
            },
            {
                data: "current_total_price"
            },
            {
                data: "total_price_usd"
            },
            {
                data: "currency"
            },
            {
                data: "current_total_tax"
            },
            {
                data: "total_discounts"
            },
            {
                data: "created_at"
            },
        ],
        'columnDefs': [{
            'targets': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12],
            'orderable': false,
        }],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
    });


}