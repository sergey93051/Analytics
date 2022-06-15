function ordersDataItem(data) {
    var table = $('#orderItemShopifyTable').DataTable({
        "scrollX": true,
        "processing": true,
        "bInfo": false,
        "paging": false,
        "searching": false,
        data: data,
        columns: [{
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
            'targets': [0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11],
            'orderable': false,

        }],
    });

}