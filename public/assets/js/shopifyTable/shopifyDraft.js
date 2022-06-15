function shopifyDraft(data) {
    var table = $('#draftShopifyTable').DataTable({
        "scrollX": true,
        "processing": true,
        data: data,
        columns: [{
                data: "count"
            },
            {
                data: "name"
            },
            {
                data: "email"
            },
            {
                data: "taxes_included"
            },
            {
                data: "status"
            },
            {
                data: "total_price"
            },
            {
                data: "subtotal_price"
            },
            {
                data: "total_tax"
            },
            {
                data: "currency"
            },
            {
                data: "completed_at"
            },
            {
                data: "created_at"
            },
        ],
        'columnDefs': [{
            'targets': [1, 2, 3, 4, 5, 6, 7, 8, 9, 10],
            'orderable': false,
        }],
        "lengthMenu": [
            [5, 10, 25, 50, 100, -1],
            [5, 10, 25, 50, 100, "All"]
        ],
        "pageLength": 10,
    });
}
