<?php
    session_start();

    include_once "./connection.php";

    $sql = "
        update rezervari set plata = 1 where id = :id
        
    ";

    $statement = $connection->prepare($sql);
    $statement->execute(array(
        ':id' => $_POST['id'],
  
    ));

    echo json_encode('Success');
?>