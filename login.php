<?php


  session_start();

  include_once "connection.php";

   if (isset($_POST['sendEmail']) &&
        !empty($_POST['sendEmail']) &&
        isset($_POST['sendPassword']) &&
        !empty($_POST['sendPassword'])
    ) {
        $sql = "
            select ID,Fname,Lname from users where Email = :email and Password = :password
        ";

        $statement = $connection->prepare($sql);
        $statement->execute(array(
            ":email" => $_POST['sendEmail'],
            ":password" => md5($_POST['sendPassword'])
        ));

        $data = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (count($data) == 1) {
            $_SESSION['userID'] = $data[0]['ID'];
            $_SESSION['userFname'] = $data[0]['Fname'];
            $_SESSION['userLname'] = $data[0]['Lname'];
            $_SESSION['userEmail'] = $_POST['sendEmail'];

            // echo json_encode(array(
            //     "success" => 1,
            //     "msg" => "Ati fost autentificat cu succes!"
            // ));
            header('location: home.php');
        } else {
            // echo json_encode(array(
            //     "success" => 0,
            //     "msg" => "Date incorecte!"
            // ));
            header('location: index.php');

        }
    }





?>