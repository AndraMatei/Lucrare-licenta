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

  