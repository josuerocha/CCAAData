$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var valueMin = $('#min').val();
        var valueMax = $('#max').val();
        var min = new Date($('#min').val());
        var max = new Date($('#max').val());
        var dateExp = new Date(data[0]) || 0; // use data for the dateExp column

        if(min.getTime() >= max.getTime()){
            alert('Faixa de dados inválida.');
        }
 
        if ( ( !Date.parse(valueMin) && !Date.parse(valueMax) ) || ( !Date.parse(valueMin) && dateExp.getTime() <= max.getTime() ) || ( min.getTime() <= dateExp.getTime()   &&  !Date.parse(valueMax)) 
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

    $('#tabela_frequencia tfoot th').each( function () {
        var title = $(this).text();
        $(this).html( '<input type="text" placeholder="Pesquisar '+title+'" />' );
    } );

    var table = $('#tabela_frequencia').DataTable( {
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


    $("div.toolbar").html("<b>Data inicial  </b><input type='date' id='min' name='min'>           <b>Data final</b>    <input type='date' id='max' name='max'>");
        // Event listener to the two range filtering inputs to redraw on input
    $('#min, #max').keyup( function() {
        table.draw();
    } );
} );