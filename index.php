<?php


?>

<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<link rel="stylesheet" type="text/css" href="style.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

</head>
<body>
<div class="lg" id="lg-form">
    <div class="lg-form">
        <p id="msg" class="msg"></p>
        <p class="sign" align="center">Conectare</p>
        <form class="form1" action="login.php" method="POST">
            <input type="text" class="input" id="email" name="sendEmail" placeholder="Email"><br>
            <input type="password" class="input" id="password" name="sendPassword" placeholder="Parolă">
            <button type="submit" class="btn log-in-button" id="submit" style="background-color: white; color: black; border: none; outline: none; box-shadow: none;">Conectează-te</button><br>
            <button type="button" class="btn btn-secondary register-button" id="register" style="background-color:white; color: black" >Înregistrează-te</button><br>
           
            <h1 style="text-align: center; margin-top: 10px;">
  <img src="logo2.jpg" height="120" class="logo logo2" style="display: inline-block; margin-left: 10px; border-radius: 12px;">
</h1>




        </form>
    </div>
</div>
<div class="cc" id="register-form" style="display:none">
    <div class="create-account-form">
        <p class="sign" >Cont nou</p>
        <form class="form1">
            <input type="text" class="input2" id="first-name" name="first-name" placeholder="Prenume"><br>
            <input type="text" class="input2" id="last-name" name="last-name" placeholder="Nume"><br>
            <input type="text" class="input2" id="phone" name="phone" placeholder="Număr de telefon"><br>
            <input type="text" class="input2" id="email2" name="email2" placeholder="Email">
            <input type="password" class="input2" id="password2" name="password2" placeholder="Parolă">
            <button type="button" class="btn btn-outline-secondary create-account-button" id="create-account" style="background-color:white; color: black" >Creează cont</button>
            <button type="button" class="btn linkbtn" id="linkbtn" style="background-color: white; color: black; border: none; padding: 8px 16px; margin: 10px auto; display: block;">Înapoi la pagina de conectare</button>




        </form>
    </div>
</div>
<script src="register.js"></script>
<script src="Create_account.js"></script>
<script src="linkbtn.js"></script>
</body>
</html>
