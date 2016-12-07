
$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var valueMin = $('#dataMin').val();
        var valueMax = $('#dataMax').val();
        var min = new Date($('#dataMin').val());
        var max = new Date($('#dataMax').val());
        var dateExp = new Date(data[9]) || 0; // use data for the dateExp column

        if(min.getTime() >= max.getTime()){
            alert('Faixa de dados inválida.');
        }
 
        if ( ( !Date.parse(valueMin) && !Date.parse(valueMax) ) || ( !Date.parse(valueMin) && dateExp.getTime() <= max.getTime() ) || ( min.getTime() <= dateExp.getTime()   &&  !Date.parse(valueMax)) 
        || ( min.getTime() <= dateExp.getTime()   && dateExp.getTime() <= max.getTime()))
        {
            return true;
        }
        else{
            return false;
        }
    }
);


$(document).ready(function() {

    $('#table_pessoas tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" class="inputPesquisa" placeholder="Pesquisar '+title+'" />' );
    } );

    var table = $('#table_pessoas').DataTable( {
        searching : true,
        dom: 'B<"toolbar">rtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );


    // Apply the search
    table.columns().every( function () {
        var that = this;
 
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );


    $("div.toolbar").html("<b>Data inicial  </b><input type='date' id='dataMin' name='dataMin'>           <b>Data final</b>    <input type='date' id='dataMax' name='dataMax'>");
        // Event listener to the two range filtering inputs to redraw on input
    $('#dataMin, #dataMax').keyup( function() {
        table.draw();
    } );
} );