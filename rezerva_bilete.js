$(function () {
    $("#datepicker").datepicker({
          autoclose: true,
          todayHighlight: true
    }).datepicker('update', new Date());
  });


  $('#datepicker').datepicker({
    dateFormat: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    width:"200px"
});
$('#datepicker2').datepicker({
    dateFormat: 'yyyy-mm-dd',
    uiLibrary: 'bootstrap4',
    width:"200px"
});

function formatDate(date) {
    var d = new Date(date),
        month = '' + (d.getMonth() + 1),
        day = '' + d.getDate(),
        year = d.getFullYear();

    if (month.length < 2)
        month = '0' + month;
    if (day.length < 2)
        day = '0' + day;

    return [year, month, day].join('-');
}


$('#intors').click(function(){
    if($('input#intors').prop("checked")){

    $("#date2").fadeIn();}
    else
    $("#date2").fadeOut();

});



$(document).ready(()=>{
    $('#cauta').click(function(){

        $.ajax({
            url: 'curse.php',
            method: 'POST',
            data:{
               intors: $('input#intors').prop("checked"),
               orasP: $('#oras_plecare').val(),
               orasD: $('#destinatie').val(),
               dataP: formatDate($('#datepicker').val()),
               dataR: formatDate($('#datepicker2').val()),
               locuri: $('#locuri').val(),


            },

            success: function(response){
                var data=JSON.parse(response);

              var html = '<table class="table table-striped" style="border: 2px solid #87ab98 ; border-collapse: collapse;">';
                html += '<thead>';
                html += '<tr style="background-color:#87ab98 ; color:black;">';
                html += `<th style= "padding: 10px;">Id Cursa</th>
                        <th style=" padding: 10px;">Oras plecare</th>
                        <th style=" padding: 10px;">Oras destinatie</th>
                        <th style=" padding: 10px;">Data</th>
                        <th style=" padding: 10px;">Numar locuri</th>
                        <th style=" padding: 10px;"></th>
                        <th style=" padding: 10px;"></th>
                        <th style=" padding: 10px;"></th>
                        <th style="padding: 10px;"></th>
                        <th style=" padding: 10px;">Durata</th>
                        <th style=" padding: 10px;">Pret</th>
                        <th style=" padding: 10px;">Ora</th>
                        <th style="padding: 10px;">Companie</th>
                        <th style=" padding: 10px;">Rezerva bilet</th>`;
                html += '</tr>';
                html += '</thead>';
                html += '<tbody>';


                    $.each(data, function(index, value){
                        html += '<tr>';
                        $.each(value, function(index2, value2){
                           if (index2=="durata")
                           {
                                html += '<td>' +  '</td>';
                                html += '<td>' +  '</td>';
                                html += '<td>' +  '</td>';
                                html += '<td>' +  '</td>';}
                           if (index2 === 'ora') {
                                   
                                    // 'ora' este într-un format complet  HH:mm
                                var oraScurta = value2.substring(0, 5);
                                html += '<td>' + oraScurta + '</td>';
                            }


                           else {
                                if(index2=="pret")
                                    html += '<td id="pret' + value.id + '">' + value2 + '</td>';
                                    
                                else
                                    html += '<td>' + value2 + '</td>';
                            }

                        });
                        html += '<td> <button style="background-color:#87ab98  ;" class="rezerva" data-id="'+value["id"]+'"  data-total="'+value["locuri"]+'">Rezerva bilete</button></td></tr>';
                    });
                    html += '</table> <div style="position:absolute;bottom:20px;right:20px; font-size:40px; cursor:pointer;"><i id="go_up" class="far fa-arrow-alt-circle-up"></i></div>';

                    $('.f2').html(html).show();
                    $([document.documentElement, document.body]).animate({
                        scrollTop: $(".f2").offset().top
                    }, 500);
                    $('#go_up').click(function(){
                        $([document.documentElement, document.body]).animate({
                        scrollTop: $(".f0").offset().top
                    }, 500);
                     });

                    $(".rezerva").click(function(e){
                        e.stopPropagation();
                        var id=$(this).data().id;
                        var total=$(this).data().total;
                        var pretId = "pret" + id;

                        // Cauți în același rând (tr) celula cu id-ul "pret42"
                        var pret = $(this).closest("tr").find("#" + pretId).text();
                        
                        $.ajax({
                            url: 'rezerva_curse.php',
                            method: 'POST',
                            data:{
                               id_cursa: id,
                               locuri: $('#locuri').val(),
                               total: total,
                               pret: pret,


                            },

                            success: function(response){
                               alert(response);
                               window.location.reload(false);

                            }

                        });





                    })


            }


        });




    })




})
