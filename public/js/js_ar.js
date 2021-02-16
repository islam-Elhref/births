
var count = 0 ;
if($('th').attr('aria-controls' , 'mytable').length > 3  ){
    count = 2
}

$(document).ready(function() {
    // Setup - add a text input to each footer cell
    $('#mytable thead tr').clone(true).appendTo( '#mytable thead' );
    $('#mytable thead tr:eq(1) th').each( function (i) {
        var title = $(this).text();
        $(this).html( '<input class="form-control" type="text" placeholder="'+title+'" />' );
        $(this).addClass('no-padding')
        $(this).find('input').addClass('input_table')
        $( 'input', this ).on( 'keyup change', function () {
            if ( table.column(i).search() !== this.value ) {
                table
                    .column(i)
                    .search( this.value )
                    .draw();
            }
        } );
    } );

    var table = $('#mytable').DataTable( {
        orderCellsTop: true,
        fixedHeader: true,
        "autoWidth": false,
        responsive: true,
        orderCellsTop: true,
        dom: 'Bfrtip',
        buttons: [ {
            extend: 'excelHtml5',
            autoFilter: true,
            sheetName: 'Exported data'
        } ],
        "order": [[ count, "desc" ]],
        "language": {
            "emptyTable":     "لا توجد بيانات متاحه في الجدول",
            "info":           "عرض _START_ الي _END_  إجمالي _TOTAL_  من المدخلات",
            "infoEmpty":      "عرض _START_ الي _END_  إجمالي _TOTAL_  من المدخلات",
            "infoFiltered":   "(filtered from _MAX_ total entries)",
            "lengthMenu":     "عرض _MENU_ من المدخلات",
            "loadingRecords": "تحميل...",
            "processing":     "Processing...",
            "search":         "البحث:",
            "zeroRecords":    "لم يتم العثور على سجلات مطابقة",
            "paginate": {
                "first":      "الأول",
                "last":       "الأخير",
                "next":       "التالي",
                "previous":   "السابق"
            },
        },

    } );
} );


