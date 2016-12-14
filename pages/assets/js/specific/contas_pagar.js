$.fn.dataTable.ext.search.push(
    function( settings, data, dataIndex ) {
        var valueMin = $('#dataMin').val();
        var valueMax = $('#dataMax').val();
        var min = new Date($('#dataMin').val());
        var max = new Date($('#dataMax').val());


        var expDateArray = data[2].split('-');
        var payDateArray = data[3].split('-');

        if(expDateArray[0] > 12){
            var expDateConverted = expDateArray[1] + '-' + expDateArray[0] + '-' + expDateArray[2];
            var payDateConverted = payDateArray[1] + '-' + payDateArray[0] + '-' + payDateArray[2];
        }
        else{
            var expDateConverted = data[2];
            var payDateConverted = data[3];
        }

        var dateExp = new Date(expDateConverted) || 0; // use data for the dateExp column
        var datePay = new Date(payDateConverted) || 0;

        if(min.getTime() >= max.getTime()){
            alert('Faixa de dados inválida.');
        }

        if ( ( !Date.parse(valueMin) && !Date.parse(valueMax) ) || ( !Date.parse(valueMin) && dateExp.getTime() <= max.getTime() ) || ( min.getTime() <= dateExp.getTime()   &&  !Date.parse(valueMax)) 
        || ( min.getTime() <= dateExp.getTime()   && dateExp.getTime() <= max.getTime() ) || ( !Date.parse(valueMin) && datePay.getTime() <= max.getTime() ) || ( min.getTime() <= datePay.getTime()   &&  !Date.parse(valueMax)) 
        || ( min.getTime() <= datePay.getTime()   && datePay.getTime() <= max.getTime() ) )
        {
            return true;
        }
        else{
            return false;
        }
    }
);


$(document).ready(function() {

    $('#table_contas tfoot th').each( function () {
        var title = $(this).text().toLowerCase();
        $(this).html( '<input type="text" style = "width:100px;" placeholder="Pesquisar '+ title +'" />');
    } );

    var table = $('#table_contas').DataTable( {
        searching : true,
        "autoWidth": true,
        dom: 'B          <"toolbar">rtip',
        buttons: [
            {
                extend: 'pdfHtml5',
                message: 'Relatório gerado em ' + getDate() + ' às ' + getTime() + ' CCAA\u00A9',
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


$('.form_edit').submit(function(event){
    
	event.preventDefault(); // if you want to disable the action
	var $form = $(this),
	codigoValue = $form.find('input[name="codeEdit"]').val(),
	type = $form.attr('method'),
	url = $form.attr('action');

	var posting = $.post(url,{codeEdit: codigoValue},function(data,status){
			if(status == 'success'){
				var contaEditar = JSON.parse(escapeSpecialChars(data));
				document.getElementById("codeHidden").value = contaEditar.code;
				document.getElementById("tipo_conta").value = contaEditar.tipo;
				document.getElementById("valor").value = contaEditar.valor;
				document.getElementById("Dt_venc").value = contaEditar.dtVencimento;
				document.getElementById("Dt_pag").value = contaEditar.dtPagamento;
				if(contaEditar.situacao == "quitado"){
					document.getElementById("Situacao1").checked = true;
				}
				else{
					document.getElementById("Situacao2").checked = true;
				}
            }
        }
		);
});

function escapeSpecialChars(jsonString) {
			var re = /[\0-\x1F\x7F-\x9F\xAD\u0378\u0379\u037F-\u0383\u038B\u038D\u03A2\u0528-\u0530\u0557\u0558\u0560\u0588\u058B-\u058E\u0590\u05C8-\u05CF\u05EB-\u05EF\u05F5-\u0605\u061C\u061D\u06DD\u070E\u070F\u074B\u074C\u07B2-\u07BF\u07FB-\u07FF\u082E\u082F\u083F\u085C\u085D\u085F-\u089F\u08A1\u08AD-\u08E3\u08FF\u0978\u0980\u0984\u098D\u098E\u0991\u0992\u09A9\u09B1\u09B3-\u09B5\u09BA\u09BB\u09C5\u09C6\u09C9\u09CA\u09CF-\u09D6\u09D8-\u09DB\u09DE\u09E4\u09E5\u09FC-\u0A00\u0A04\u0A0B-\u0A0E\u0A11\u0A12\u0A29\u0A31\u0A34\u0A37\u0A3A\u0A3B\u0A3D\u0A43-\u0A46\u0A49\u0A4A\u0A4E-\u0A50\u0A52-\u0A58\u0A5D\u0A5F-\u0A65\u0A76-\u0A80\u0A84\u0A8E\u0A92\u0AA9\u0AB1\u0AB4\u0ABA\u0ABB\u0AC6\u0ACA\u0ACE\u0ACF\u0AD1-\u0ADF\u0AE4\u0AE5\u0AF2-\u0B00\u0B04\u0B0D\u0B0E\u0B11\u0B12\u0B29\u0B31\u0B34\u0B3A\u0B3B\u0B45\u0B46\u0B49\u0B4A\u0B4E-\u0B55\u0B58-\u0B5B\u0B5E\u0B64\u0B65\u0B78-\u0B81\u0B84\u0B8B-\u0B8D\u0B91\u0B96-\u0B98\u0B9B\u0B9D\u0BA0-\u0BA2\u0BA5-\u0BA7\u0BAB-\u0BAD\u0BBA-\u0BBD\u0BC3-\u0BC5\u0BC9\u0BCE\u0BCF\u0BD1-\u0BD6\u0BD8-\u0BE5\u0BFB-\u0C00\u0C04\u0C0D\u0C11\u0C29\u0C34\u0C3A-\u0C3C\u0C45\u0C49\u0C4E-\u0C54\u0C57\u0C5A-\u0C5F\u0C64\u0C65\u0C70-\u0C77\u0C80\u0C81\u0C84\u0C8D\u0C91\u0CA9\u0CB4\u0CBA\u0CBB\u0CC5\u0CC9\u0CCE-\u0CD4\u0CD7-\u0CDD\u0CDF\u0CE4\u0CE5\u0CF0\u0CF3-\u0D01\u0D04\u0D0D\u0D11\u0D3B\u0D3C\u0D45\u0D49\u0D4F-\u0D56\u0D58-\u0D5F\u0D64\u0D65\u0D76-\u0D78\u0D80\u0D81\u0D84\u0D97-\u0D99\u0DB2\u0DBC\u0DBE\u0DBF\u0DC7-\u0DC9\u0DCB-\u0DCE\u0DD5\u0DD7\u0DE0-\u0DF1\u0DF5-\u0E00\u0E3B-\u0E3E\u0E5C-\u0E80\u0E83\u0E85\u0E86\u0E89\u0E8B\u0E8C\u0E8E-\u0E93\u0E98\u0EA0\u0EA4\u0EA6\u0EA8\u0EA9\u0EAC\u0EBA\u0EBE\u0EBF\u0EC5\u0EC7\u0ECE\u0ECF\u0EDA\u0EDB\u0EE0-\u0EFF\u0F48\u0F6D-\u0F70\u0F98\u0FBD\u0FCD\u0FDB-\u0FFF\u10C6\u10C8-\u10CC\u10CE\u10CF\u1249\u124E\u124F\u1257\u1259\u125E\u125F\u1289\u128E\u128F\u12B1\u12B6\u12B7\u12BF\u12C1\u12C6\u12C7\u12D7\u1311\u1316\u1317\u135B\u135C\u137D-\u137F\u139A-\u139F\u13F5-\u13FF\u169D-\u169F\u16F1-\u16FF\u170D\u1715-\u171F\u1737-\u173F\u1754-\u175F\u176D\u1771\u1774-\u177F\u17DE\u17DF\u17EA-\u17EF\u17FA-\u17FF\u180F\u181A-\u181F\u1878-\u187F\u18AB-\u18AF\u18F6-\u18FF\u191D-\u191F\u192C-\u192F\u193C-\u193F\u1941-\u1943\u196E\u196F\u1975-\u197F\u19AC-\u19AF\u19CA-\u19CF\u19DB-\u19DD\u1A1C\u1A1D\u1A5F\u1A7D\u1A7E\u1A8A-\u1A8F\u1A9A-\u1A9F\u1AAE-\u1AFF\u1B4C-\u1B4F\u1B7D-\u1B7F\u1BF4-\u1BFB\u1C38-\u1C3A\u1C4A-\u1C4C\u1C80-\u1CBF\u1CC8-\u1CCF\u1CF7-\u1CFF\u1DE7-\u1DFB\u1F16\u1F17\u1F1E\u1F1F\u1F46\u1F47\u1F4E\u1F4F\u1F58\u1F5A\u1F5C\u1F5E\u1F7E\u1F7F\u1FB5\u1FC5\u1FD4\u1FD5\u1FDC\u1FF0\u1FF1\u1FF5\u1FFF\u200B-\u200F\u202A-\u202E\u2060-\u206F\u2072\u2073\u208F\u209D-\u209F\u20BB-\u20CF\u20F1-\u20FF\u218A-\u218F\u23F4-\u23FF\u2427-\u243F\u244B-\u245F\u2700\u2B4D-\u2B4F\u2B5A-\u2BFF\u2C2F\u2C5F\u2CF4-\u2CF8\u2D26\u2D28-\u2D2C\u2D2E\u2D2F\u2D68-\u2D6E\u2D71-\u2D7E\u2D97-\u2D9F\u2DA7\u2DAF\u2DB7\u2DBF\u2DC7\u2DCF\u2DD7\u2DDF\u2E3C-\u2E7F\u2E9A\u2EF4-\u2EFF\u2FD6-\u2FEF\u2FFC-\u2FFF\u3040\u3097\u3098\u3100-\u3104\u312E-\u3130\u318F\u31BB-\u31BF\u31E4-\u31EF\u321F\u32FF\u4DB6-\u4DBF\u9FCD-\u9FFF\uA48D-\uA48F\uA4C7-\uA4CF\uA62C-\uA63F\uA698-\uA69E\uA6F8-\uA6FF\uA78F\uA794-\uA79F\uA7AB-\uA7F7\uA82C-\uA82F\uA83A-\uA83F\uA878-\uA87F\uA8C5-\uA8CD\uA8DA-\uA8DF\uA8FC-\uA8FF\uA954-\uA95E\uA97D-\uA97F\uA9CE\uA9DA-\uA9DD\uA9E0-\uA9FF\uAA37-\uAA3F\uAA4E\uAA4F\uAA5A\uAA5B\uAA7C-\uAA7F\uAAC3-\uAADA\uAAF7-\uAB00\uAB07\uAB08\uAB0F\uAB10\uAB17-\uAB1F\uAB27\uAB2F-\uABBF\uABEE\uABEF\uABFA-\uABFF\uD7A4-\uD7AF\uD7C7-\uD7CA\uD7FC-\uF8FF\uFA6E\uFA6F\uFADA-\uFAFF\uFB07-\uFB12\uFB18-\uFB1C\uFB37\uFB3D\uFB3F\uFB42\uFB45\uFBC2-\uFBD2\uFD40-\uFD4F\uFD90\uFD91\uFDC8-\uFDEF\uFDFE\uFDFF\uFE1A-\uFE1F\uFE27-\uFE2F\uFE53\uFE67\uFE6C-\uFE6F\uFE75\uFEFD-\uFF00\uFFBF-\uFFC1\uFFC8\uFFC9\uFFD0\uFFD1\uFFD8\uFFD9\uFFDD-\uFFDF\uFFE7\uFFEF-\uFFFB\uFFFE\uFFFF]/g;


            return jsonString.replace(re, "");

        }

function Novo(){
	document.getElementById("codeHidden").value = "";
	document.getElementById("tipo_conta").value = "";
	document.getElementById("valor").value = "";
	document.getElementById("Dt_venc").value = "";
	document.getElementById("Dt_pag").value = "";
	document.getElementById("Situacao1").checked = false;
	document.getElementById("Situacao2").checked = false;
}