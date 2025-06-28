$("#create-account").click(function(){

    var fname=$('input[name="first-name"]').val();
    var lname=$('input[name="last-name"]').val();
    var phone=$('input[name="phone"]').val();
    var email=$('input[name="email2"]').val();
    var password=$('input[name="password2"]').val();
    var ok=1;
    console.log(fname,email,password);
    if(fname == ""){
      $("#first-name").addClass('error');
      ok=0;
    }
    if(lname == ""){
      $("#last-name").addClass('error');
      ok=0;
    }
    if(phone == ""){
      $("#phone").addClass('error');
      ok=0;
    }
    if(email == ""){
      $("#email2").addClass('error');
      ok=0;
    }
    if(password == ""){
      $("#password2").addClass('error');
      ok=0;
    }

    if(email.search("@")==-1){
      $("#email2").addClass('error');
      ok=0;
      $("#email2").val("");

    }
    if(phone.length<10){
      $("#phone").addClass('error');
      ok=0;

    }

    if(ok==1){
    $.ajax({
        url: 'Create_account.php',
        method: 'POST',
        data:{
          sendFname: fname,
          sendLname: lname,
          sendPhone: phone,
          sendEmail: email,
          sendPassword: password


        },
        success:function(response){
          $("#lg-form").fadeIn();
          $("#register-form").fadeOut();
          $("#msg").text(response);
        }




    });
  }






});