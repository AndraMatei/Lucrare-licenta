$(document).ready(()=>{
    $('#cauta').click(function(){

        $.ajax({
            url: 'afiseaza_curse.php',
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

               var html = '<table class="table table-striped">';
                    html += '<tr>';
                    var flag = 0;
                    html+=`<th>Id Cursa</th>
                            <th>Oras plecare</th>
                            <th>Oras destinatie</th>
                            <th>Data</th>
                            <th>Numar locuri</th>
                            <th>Durata</th>
                            <th>Rezerva bilet</th>`;
                    html += '</tr>';
                    $.each(data, function(index, value){
                        html += '<tr>';
                        $.each(value, function(index2, value2){
                            html += '<td>'+value2+'</td>';

                        });

                    });
                    html += '</table> ';




            }


        });




    })




})