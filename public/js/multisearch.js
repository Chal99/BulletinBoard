/**
 * this function is to compare between from and to for search using moment.js
 */
$.fn.dataTable.ext.search.push(
    function (oSettings, aData, iDataIndex) {
        if (!$("#min").val() && !$("#max").val()) {
            return true;
        }
        var dateStart = moment($("#min").val(), "YYYY-MM-DD").valueOf();
        var dateEnd = moment($("#max").val(), "YYYY-MM-DD").valueOf();
        var evalDate = moment(aData[8], "YYYY/MM/DD").valueOf();
        if (evalDate >= dateStart && evalDate <= dateEnd) {
            return true;
        } else {
            return false;
        }
    }
);

$(document).ready(function () {
    /**
     * Remove pagination,search and show entries
     */
    $('#table-list').DataTable({
        "bPaginate": false,
        "bLengthChange": false,
        "bFilter": true,
        "bInfo": false,
        "bAutoWidth": false,
        "bSearch": false,
        sDom: 'lrtip'
    });
    var oTable = $('#table-list').DataTable();
    /**
     * Click and search with name,email and date range
     */
    $('#btnSearch').click(function () {
        oTable.columns(1).search($('#search-name').val())
            .columns(2).search($('#search-email').val())
            .draw();
    });
});
