<?php

    session_start();

    if (isset($_SESSION['userID']) &&
        isset($_SESSION['userEmail'])


    ) {


  include_once "connection.php";


        $sql = "
            select * from users where id= :userID
        ";

        $statement = $connection->prepare($sql);
        $statement->execute(array(
            ":userID" => $_SESSION['userID'],
        ));

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);




    } else {
        header('location: index.php');
    }

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
<link rel="stylesheet" type="text/css" href="home.css">
<link rel="stylesheet" type="text/css" href="profil.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>

</head>

<body>
    <nav class="navbar navbar-dark" style="background-color:#87ab98; height:65px;">
        <div class="container-fluid" style="display: flex; justify-content: space-between; align-items: center; width: 100%;">
            
            <div>
                <button type="button" class="btn btn-outline-light home_button" id="acasa">Acasă</button>
            </div>
            
            <div>
                <button type="button" class="btn btn-outline-light rezerve_button" id="rezerva" style="margin-left: 70px;">Rezervă bilete</button>
            </div>
            
            <div style="display: flex; align-items: center;">
                <button type="button" class="btn btn-outline-light rezerve_button" id="contact">Contact</button>

                <div class="nav-link b1" style="display: flex; align-items: center; margin-left: 20px;">
                    <i class='fas fa-user-tie' style='font-size:30px'></i>
                    <span style="margin-left: 5px;"><?php echo $_SESSION['userFname'] . " " . $_SESSION['userLname']; ?></span>
                    <button type="button" class="btn btn-link logout" id="logout" style="margin-left: 10px; color:black; border: none; background: none;">Deconectare</button>
                </div>
            </div>
        </div>
    </nav>
</body>



    <div class="f1">
       <div style="width:100%; display:flex;justify-content: center;padding-top:10px;">
         <img src="http://ssl.gstatic.com/accounts/ui/avatar_2x.png" style="width:100px;height:100px; border-radius:50%;"/>

        </div>
        <div class="form-group" style="display:flex;justify-content: center;">
            <div class="col-xs-6" >
                <label style="display:flex;justify-content: center;padding-top:10px;"><h5>Nume</h5></label>
                <input type="text" class="formprofil"  id="last_name" placeholder="Nume" value="<?php echo $data[0]['Lname'] ?>">
            </div>
        </div>
        <div class="form-group" style="display:flex;justify-content: center;">
            <div class="col-xs-6" >
                <label style="display:flex;justify-content: center;padding-top:10px;"><h5>Prenume</h5></label>
                <input type="text" class="formprofil"  id="first_name" placeholder="Prenume" value="<?php echo $data[0]['Fname'] ?>">
            </div>
        </div>
        <div class="form-group" style="display:flex;justify-content: center;">
            <div class="col-xs-6" >
                <label style="display:flex;justify-content: center;padding-top:10px;"><h5>Email</h5></label>
                <input type="text" class="formprofil"  id="email" placeholder="Email" value="<?php echo $data[0]['Email'] ?>">
            </div>
        </div>
        <div class="form-group" style="display:flex;justify-content: center;">
            <div class="col-xs-6" >
                <label style="display:flex;justify-content: center;padding-top:10px;"><h5>Telefon</h5></label>
                <input type="text" class="formprofil"  id="phone" placeholder="Telefon" value="<?php echo $data[0]['Phone'] ?>">
            </div>
        </div>
        <div class="form-group" style="display:flex;justify-content: center;">
            <div class="col-xs-6" >
                <label style="display:flex;justify-content: center;padding-top:10px;"><h5>Adresa</h5></label>
                <input type="text" class="formprofil"  id="location" placeholder="Adresa" value="<?php echo $data[0]['Adresa'] ?>">
            </div>

        </div>
        <div class="form-group" style="display:flex;justify-content: center;">
            <div class="col-xs-6" >
            <button  class="btn btn-primary  log-in-button" id="savebtn">Salvează</button><br><br>
            <button class="btn log-in-button" id="afiseazabtn" data-type="show" style="background-color:white ; color: black;border: none; outline:none">Afișează rezervări</button><br>
            </div>



        </div>


    </div>

    <div class="f2" style="display:none; height:600px"></div>





    <script src="logout.js"></script>
    <script src="home_menu.js"></script>
    <script src="update_profil copy.js"></script>

</body>
</html>
