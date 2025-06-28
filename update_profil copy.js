$('#savebtn').click(function() {

    var ok = 1;
    var email = $('input#email').val();
    var prenume = $('input#first_name').val();
    var nume = $('input#last_name').val();
    var telefon = $('input#phone').val();
    var locatie = $('input#location').val();

    if (email == "") {
      ok = 0;
      $('input#email').css('border', '1px solid red');
    }
    if (prenume == "") {
      ok = 0;
      $('input#first_name').css('border', '1px solid red');
    }
    if (nume == "") {
      ok = 0;
      $('input#last_name').css('border', '1px solid red');
    }
    if (telefon == "") {
        ok = 0;
        $('input#phone').css('border', '1px solid red');
    }
    if (locatie == "") {
        ok = 0;
        $('input#location').css('border', '1px solid red');
    }

    $.ajax({
      type: "POST",
      url: "update_profil.php",
      data: {
          email: email,
          firstname: prenume,
          lastname: nume,
          telefon: telefon,
          locatie: locatie
        },

      success: function (response) {
          var data = JSON.parse(response);
          alert(data.msg);
          }
      });

  });

  $('#afiseazabtn').click(function(){
     if($(this).data().type=="show"){
      $(this).data().type="hide";
      $('#afiseazabtn').text("Ascunde rezervari");
      $.ajax({
          url: 'cursele-mele.php',
          method: 'POST',


          success: function(response){
              var data=JSON.parse(response);

             var html = '<table class="table table-striped">';
                  html += '<tr>';
                  var flag = 0;
                  html+=`
                          <th>Oras plecare</th>
                          <th>Oras destinatie</th>
                          <th>Data</th>
                          <th>Numar locuri</th>
                          <th>Durata</th>                          
                          <th>Status</th>
                          <th>Pret</th>
                          <th>Plateste</th>`;
                  html += '</tr>';
                  $.each(data, function(index, value){
                    
                      html += '<tr>';
                      html += `
                        <td>${value.orasP}</td>
                        <td>${value.orasD}</td>
                        <td>${value.dataP}</td>
                        <td>${value.locuri}</td>
                        <td>${value.durata}</td>
                        <td>${value.status}</td>
                        <td>${value.pret}</td>                      
                      `;

                     
                      if (value.status === "Aprobat") {
                        if (value.plata == 1){

                          html += '<td>Platit</td>';  
                        }
                        else{
                        html += `<td><button class="btn btn-primary btn-plateste " data-toggle="modal" data-id="${value.id}" data-price="${value.pret}"
                         data-target="#myModal" style="background-color:#87ab98;border:none;color:black; " >Plateste</button></td>`;
                    } }
                    else {
                        html += '<td><u>Tranzactie indisponibila</u></td>';
                    }
                      html += '</tr>';
                  });
                  html += '</table> <div style="position:absolute;bottom:20px;right:20px; font-size:40px; cursor:pointer;"><i id="go_up" class="far fa-arrow-alt-circle-up"></i></div>';
                  $(document).on('click', '.btn-plateste', function(e) {
                    e.stopPropagation();
                    $('#myModal').modal('show');

                   var modalHTML = `
                    <div id="myModal" class="custom-modal">
                      <div class="modal-content" style="background-color: #b5b35c;">
                        <span class="close" style="color: white;">&times;</span>
                        <div class="card" style="background-color: #b5b35c; border: none;">
                          <h3 style="color:white;">Plătește</h3>
                          <div class="form-group">
                            <input type="text" id="modal-nume" name="nume" placeholder="Nume">
                          </div>
                          <div class="form-group">
                            <input type="text" id="modal-prenume" name="prenume" placeholder="Prenume">
                          </div>
                          <div class="form-group">
                            <input type="email" id="modal-email" name="email" placeholder="Email">
                          </div>
                          <div class="form-group">
                            <input type="text" id="modal-numar_card" name="numar_card" placeholder="Număr card">
                          </div>
                          <div class="form-group form-inline">
                            <input type="text" id="modal-data_expirare" name="data_expirare" placeholder="MM/YY" style="width: 48%;">
                            <input type="text" id="modal-cvv" name="cvv" placeholder="CVV" style="width: 48%; margin-left: 4%;">
                          </div>
                          <button class="btn btn-light modal-plateste" data-id="${$(e.target).data().id}">Plătește ${$(e.target).data().price} lei</button>
                        </div>
                      </div>
                    </div>
                    `;

$('.close').click(function() {
  // Închideți modalul
  $('#myModal').css('display', 'none');
});
$('.modal-plateste').click(function(e) {
    e.stopPropagation();
    $.ajax({
      url: 'plata_cursa.php',
      method: 'POST',
      data:{
        id: $(e.target).data().id,


      },
      success: function(response) {
    alert("Plata s-a făcut cu succes!");
    location.reload();
}





    });
});

$('.f2').append(modalHTML);
                });


                  $('.f2').html(html).show();
                  $([document.documentElement, document.body]).animate({
                      scrollTop: $(".f2").offset().top
                  }, 500);
                  $('#go_up').click(function(){
                      $([document.documentElement, document.body]).animate({
                      scrollTop: $(".f0").offset().top
                  }, 500);
                   });

          }

      });

     }
     else {
      $('#afiseazabtn').text("Afișază rezervari");
      $(this).data().type="show";
      $(".f2").hide();

     }

})


