<?php

    session_start();

    include 'connection.php';

    $email = $firstname = $lastname = $telefon = $locatie = "";

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $email = test_input($_POST["email"]);
        $firstname = test_input($_POST["firstname"]);
        $lastname = test_input($_POST["lastname"]);
        $telefon = test_input($_POST["telefon"]);
        $locatie = test_input($_POST["locatie"]);
    }

    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $sql = "
            UPDATE users set Email = :email, Fname = :firstname, Lname = :lastname, Phone = :telefon, Adresa= :locatie
            where id = :id_user
        ";

        $statement = $connection->prepare($sql);
        $statement = $statement->execute(array(
            ":email" => $email,
            ":firstname" => $firstname,
            ":lastname" => $lastname,
            ":telefon" => $telefon,
            ":locatie" => $locatie,
            ":id_user" => $_SESSION['userID']

        ));

        echo json_encode(array(
            "msg" => "Profil actualizat"
        ));
?>