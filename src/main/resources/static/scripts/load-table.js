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
                data = '<a href="/fournisseur"><i class="fa-sharp fa-solid fa-circle-info" style="color: #b50303;"></i></a>';
                return data;
            }
        }],
    });
});