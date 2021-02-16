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
        "order": [[ count, "desc" ]],
    } );
} );
