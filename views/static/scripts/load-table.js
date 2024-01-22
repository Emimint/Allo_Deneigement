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
                data = '<div style="width:100%; display:flex; justify-content: space-around;"><a href="/fournisseur"><i class="fa-sharp fa-solid fa-circle-info" style="color: #b50303;"></i></a></div>';
                return data;
            }
        },
        {
            targets: 7, // Index of the new column
            render: function (data, type, row, meta) {
                data = '<div style="width:100%; display:flex; justify-content: space-around;"><button"><i class="fa-solid fa-trash" style="color: #b50303;"></i></button></div>';
                return data;
            }
        }],
    });
});