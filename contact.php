<?php
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;
   

    session_start();

    if (isset($_SESSION['userID']) && isset($_SESSION['userEmail'])) {
        // utilizator logat
    } else {
        header('location: index.php');
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact</title>

    <!-- Bootstrap & jQuery -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="home.css">

    <!-- Stiluri -->
    <style>
        body {
            background-color: #b5b35c;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        #form-main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #form-div {
            background-color:#87ab98;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0px 0px 15px rgba(0,0,0,0.2);
            width: 100%;
            max-width: 600px;
        }

        .contact-form input,
        .contact-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border-radius: 5px;
            border: 1px solid #ccc;
            

        }

        .submit {
            text-align: center;
            margin-top: 10px;
        }

        .button-blue {
            background-color:#d6de96;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            
        }

        #success_message, #error_message {
            margin-top: 15px;
        }
    </style>
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

<div id="form-main">
    <div id="form-div" class="contact-form">
        <div class="montform" id="reused_form">
           <form action="send_email.php" method="POST">
                <p class="name">
                    <input name="name" type="text" class="feedback-input" required placeholder="Nume" id="name" />
                </p>
                <p class="email">
                    <input name="email" type="email" required class="feedback-input" id="email" placeholder="Email" />
                </p>
                <p class="text">
                    <textarea name="message" class="feedback-input" id="comment" placeholder="Mesaj"></textarea>
                </p>
                <div class="submit">
                    <button class="button-blue" id="trimite">
                        TRIMITE
                        <div class="spinner-border spinner-border-sm" id="loadingMail" role="status" style="display: none;">
                            <span class="sr-only">Loading...</span>
                        </div>
                    </button>
                </div>
            </form>
        </div>
        <div id="error_message" style="display:none; color: red;">
            <h4>Eroare</h4>
            Mesajul nu a fost trimis.
        </div>
        <div id="success_message" style="display:none; color: green;">
            <h4>Succes</h4>
            Mesajul tău a fost trimis cu succes.
        </div>
    </div>
</div>

<!-- Scripturi -->
<script src="logout.js"></script>
<script src="home_menu.js"></script>

<script>
    // Verifică dacă există un parametru `status` în URL
    window.onload = function() {
        var urlParams = new URLSearchParams(window.location.search);
        var status = urlParams.get('status');
        
        if (status === 'success') {
            alert('Mesajul tău a fost trimis cu succes!');
        } else if (status === 'error') {
            alert('Mesajul nu a fost trimis. Încearcă din nou!');
        }
    };
</script>
</body>
</html>
