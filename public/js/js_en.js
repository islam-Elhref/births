var count = 0 ;
if($('th').attr('aria-controls' , 'mytable').length > 3  ){
    count = 2
}

$('#mytable').dataTable({
    "autoWidth": false,
    responsive: true,
    "order": [[ count, "desc" ]],
})