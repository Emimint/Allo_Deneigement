$(document).ready(function() {
    new DataTable('#showData', {
        ajax: '../test-table.json',
        scrollCollapse: true,
        scroller: true,
        scrollY: 300,
        columnDefs: [
        {
            targets: 6,
            render: function (data, type, row, meta)
            {
                data = '<a href="/fournisseur">Details</a>';
                return data;
            }
        }],
    });
});