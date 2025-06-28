<?php

    session_start();

    if (isset($_SESSION['userID']) &&
        isset($_SESSION['userEmail'])


    ) {




    } else {
        header('location: index.php');
    }

?>


<!DOCTYPE html>
<html>
<head>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

<!-- Select2 JS -->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

<!-- Popper JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<!-- <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet" type="text/css" /> -->
<!-- <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/css/datepicker.css" rel="stylesheet" type="text/css" /> -->

<script>
  $(document).ready(function() {
    $('#destinatie').select2({
      placeholder: "Selectați destinația",
      allowClear: true
    });

    $('#oras_plecare').select2({
      placeholder: "Selectați orașul de plecare",
      allowClear: true
    });
  });
</script>


<link rel="stylesheet" type="text/css" href="rezerva_bilete.css">

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
<!-- <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.3.0/js/bootstrap-datepicker.js"></script> -->

<script src="https://unpkg.com/gijgo@1.9.13/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://unpkg.com/gijgo@1.9.13/css/gijgo.min.css" rel="stylesheet" type="text/css" />

</head>

<body>
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



    <div class="f0">
    <div class="f1">
        <p class="p1"  style="margin-left:20px;">Zboruri</p>
        <form>
        <!-- <div class="form-check form-check-inline" style="margin-left:20px;">
            <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="dus">
            <label class="form-check-label" for="inlineRadio1" style="color:white; font-size: 17px;">Doar dus</label>
        </div> -->
        <div class="form-check form-check-inline" style="margin-left:20px;">
            <input class="form-check-input" type="checkbox" name="inlineRadioOptions" id="intors" value="intors">
            <label class="form-check-label" for="inlineRadio2"style="color:white; font-size: 17px;">Dus-intors</label>
        </div>

        <div style="margin-left:20px" >
            <br>
            <div class="row">
                <div class="col-3">
                    <select class="input" id="oras_plecare" style="height:35px; width: 200px;">
                    <option value="" disabled selected>Selectați orașul de plecare</option>
                    <option value="Bucuresti">București</option>
                    <option value="Cluj Napoca">Cluj Napoca</option>
                    <option value="Oradea">Oradea</option>
                    <option value="Timisoara">Timișoara</option>
                    <option value="Paris">Paris</option>
                    <option value="Roma">Roma</option>
                    <option value="Budapesta">Budapesta</option>
                    </select>
                </div>
                <div class="col-3">
                    <select class="input" id="destinatie" style="height:35px; width: 200px;">
                    <option value="" disabled selected>Selectați destinația</option>
                    <option value="Bucuresti">București</option>
                    <option value="Cluj Napoca">Cluj Napoca</option>
                    <option value="Oradea">Oradea</option>
                    <option value="Timisoara">Timișoara</option>
                    <option value="Paris">Paris</option>
                    <option value="Roma">Roma</option>
                    <option value="Budapesta">Budapesta</option>
                    </select>
                </div>
                <div class="col-3" id="date1">
                <input id="datepicker" class="input" style="width: 50px;" type="text"  placeholder="Data plecare"  readonly />
                </div>
                <div class="col-3" id="date2" style="display: none;">
                <input id="datepicker2" class="input" style="width: 50px;" type="text" placeholder="Data retur"  readonly />
                </div>
            </div>
            <br>

            <select class="selectpicker" style="width:50px; height:30px" id="locuri" >
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
                <option>5</option>
                <option>6</option>
                <option>7</option>
                <option>8</option>
            </select>

            <button type="button" class="btn" style="width:150px; margin-left:20%; background-color: white; color: black;" id="cauta">Cauta curse</button>






        </div>



        </form>

    </div>
</div>

<div class="f2" style="display:none;">






</div>





    <script src="rezerva_bilete.js"></script>
    <script src="logout.js"></script>
    <script src="home_menu.js"></script>
    <script src="afiseaza_curse.js"></script>

</body>
</html>
