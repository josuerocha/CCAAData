$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var valueMin = $('#dataMin').val();
        var valueMax = $('#dataMax').val();
        var min = new Date($('#dataMin').val());
        var max = new Date($('#dataMax').val());
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
        $(this).html( '<input type="text" class="inputPesquisa" placeholder="Pesquisar '+title+'" />' );
    } );

    var table = $('#tabela').DataTable( {
        searching : true,
        dom: 'B          <"toolbar">rtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                message: 'Relatório gerado em ' + getDate() + 'às ' + getTime() + ' CCAA\u00A9',
                customize: function ( doc ) {
                    doc.content.splice( 1, 0, {
                        margin: [ 0, 0, 0, 12 ],
                        alignment: 'right',
                        image: 'data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAAEoAAAAxCAMAAABK689BAAAAA3NCSVQICAjb4U/gAAADAFBMVEUAAAAAADMAAGYAAJkAAMwAAP8AMwAAMzMAM2YAM5kAM8wAM/8AZgAAZjMAZmYAZpkAZswAZv8AmQAAmTMAmWYAmZkAmcwAmf8AzAAAzDMAzGYAzJkAzMwAzP8A/wAA/zMA/2YA/5kA/8wA//8zAAAzADMzAGYzAJkzAMwzAP8zMwAzMzMzM2YzM5kzM8wzM/8zZgAzZjMzZmYzZpkzZswzZv8zmQAzmTMzmWYzmZkzmcwzmf8zzAAzzDMzzGYzzJkzzMwzzP8z/wAz/zMz/2Yz/5kz/8wz//9mAABmADNmAGZmAJlmAMxmAP9mMwBmMzNmM2ZmM5lmM8xmM/9mZgBmZjNmZmZmZplmZsxmZv9mmQBmmTNmmWZmmZlmmcxmmf9mzABmzDNmzGZmzJlmzMxmzP9m/wBm/zNm/2Zm/5lm/8xm//+ZAACZADOZAGaZAJmZAMyZAP+ZMwCZMzOZM2aZM5mZM8yZM/+ZZgCZZjOZZmaZZpmZZsyZZv+ZmQCZmTOZmWaZmZmZmcyZmf+ZzACZzDOZzGaZzJmZzMyZzP+Z/wCZ/zOZ/2aZ/5mZ/8yZ///MAADMADPMAGbMAJnMAMzMAP/MMwDMMzPMM2bMM5nMM8zMM//MZgDMZjPMZmbMZpnMZszMZv/MmQDMmTPMmWbMmZnMmczMmf/MzADMzDPMzGbMzJnMzMzMzP/M/wDM/zPM/2bM/5nM/8zM////AAD/ADP/AGb/AJn/AMz/AP//MwD/MzP/M2b/M5n/M8z/M///ZgD/ZjP/Zmb/Zpn/Zsz/Zv//mQD/mTP/mWb/mZn/mcz/mf//zAD/zDP/zGb/zJn/zMz/zP///wD//zP//2b//5n//8z///8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAABlenwdAAABAHRSTlP///////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////8AAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAAG8mZagAAAAlwSFlzAAAOxAAADsQBlSsOGwAAACV0RVh0ZGF0ZTpjcmVhdGUAMjAxNS0wNy0wM1QwNDoyNzo0NyswMjowMMPrp2cAAAAldEVYdGRhdGU6bW9kaWZ5ADIwMTUtMDctMDNUMDQ6Mjc6NDcrMDI6MDCyth/bAAACgUlEQVRIia3XK3qkQBAA4HEzqOYe+6E2KidYF06QE+DGrUtUZKtGJW4cq3YUUcGNawfHCVX9rH7B7Lcl5lFD/1RD0TCH5b/FIfuL8GO0Ie6liNM7aORddxclMhWNYwexnxJ5aVkKVkQVoPF8PBaskCpJ4/FUVae9VFH6wTCeMhah+qI0Vopi7TYlytKJsaJ1yEsB1TMXT2VqQ7LTwyhSW5JfVNo67JRGKrEmS0XSRlGM5SjxMUPI3qe+pi94U2wVUlWa+jWbkEaaggSMxsSjV5bahFDzHFi9l8FEY6T5b5Ga/YA5cpLRRdX6qztaOjE4SiXWC8uUxS9qk/OA75MQrS3Ko4TJBBRfd60szlVR76s56LLWgQ9m4LOh5ojCbxeYBb9AcF2UsDMVvR4o4eWPlvB44ssLobq1FsFxWdNFqb7ADBT1jAV7M2ylyxCKe9HaGQvXCZi73hyF9chrmWIh1eiipit2W40SFvV5lWmqv0E0zB6qoKj1R3h7g0tQnT4ppTtYmrpxc+JuzKNwqNRF2YBGkH5iIM3Qawm2e0XANv2jd971JmdBM4YayA5cx0zSjKRFzayiRTnKv3De8OzUZKCmB5gx7vZBqKJ+Q4ZSi7uadPvVRFLdgcvWh0K9JsaPL97SZ8IuSzXu/xU/4+lVK6CAj6ZzMbi9xYZ353CFW+NnsKDGK+6SpJqYCpfmjBQ/ftxf1JKj2o2islJMdYHUbExvyVOhtVtKUcRqd0upB0hikYFFKU05Kz7zWSlDdbrr2xIUPoGkHrbxUgCp2l9SgeqgWQvHicfDkn8BtFWQUqPSf0y8K38vlP2PA7dDtZ7A/bF4tLcoVZdZijry7V7qH+IbkIloeK13nugAAAAASUVORK5CYII='
                    } );
                    doc.pageMargins = [ 150, 20, 150, 20 ]
                    
                }
            }
        ,'copy', 'csv', 'excel', 'print']
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

function getDate(){
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth()+1; //January is 0!
    var yyyy = today.getFullYear();

    if(dd<10) {
        dd='0'+dd
    } 

    if(mm<10) {
        mm='0'+mm
    } 

    today = mm+'/'+dd+'/'+yyyy;
    return today;
}

function getTime(){

    var time = new Date(); // for now
    var h = time.getHours(); // => 9
    var m = time.getMinutes(); // =>  30
    var sec = time.getSeconds();

    if(h<10) {
        h='0'+h;
    } 

    if(m<10) {
        m='0'+m;
    } 

     if(sec<10) {
        sec='0'+sec;
    }


    time = h + ':' + m + ':' + sec;
    return time;
}