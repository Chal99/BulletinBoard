$(document).ready(function () {
    /**
     * Remove pagination,search and show entries
     */
    $('#table-list').dataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "bSearch": false,
        sDom: 'lrtip'
    });
    /**
     * Click and search with user name
     */
    var oTable = $('#table-list').dataTable();
    $('#btnSearch').click(function () {
        oTable.fnFilter($('#user-search').val());
    });
});
