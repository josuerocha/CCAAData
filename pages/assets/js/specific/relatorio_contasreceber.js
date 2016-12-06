$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var valueMin = $('#min').val();
        var valueMax = $('#max').val();
        var min = new Date($('#min').val());
        var max = new Date($('#max').val());
        var dateExp = new Date(data[2]) || 0; // use data for the dateExp column
        var datePay = new Date(data[3]) || 0;

        if(min.getTime() >= max.getTime()){
            alert('Faixa de dados inválida.');
        }
 
        if ( ( !Date.parse(valueMin) && !Date.parse(valueMax) ) || ( !Date.parse(valueMin) && dateExp.getTime() <= max.getTime() ) || ( min.getTime() <= dateExp.getTime()   &&  !Date.parse(valueMax)) 
        || ( min.getTime() <= dateExp.getTime()   && dateExp.getTime() <= max.getTime() ) || ( !Date.parse(valueMin) && datePay.getTime() <= max.getTime() ) || ( min.getTime() <= datePay.getTime()   &&  !Date.parse(valueMax)) 
        || ( min.getTime() <= dateExp.getTime()   && dateExp.getTime() <= max.getTime() ) )
        {
            return true;
        }
        else{
            return false;
        }
    }
);


$(document).ready(function() {

    $('#tabela tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Search '+title+'" />' );
    } );

    var table = $('#tabela').DataTable( {
        searching : true,
        dom: 'B<"toolbar">frtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );

    $("div.toolbar").html("<b>Data inicial  </b><input type='date' id='min' name='min'>           <b>Data final</b>    <input type='date' id='max' name='max'>");

        // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );