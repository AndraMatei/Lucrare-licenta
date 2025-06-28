<?php
  session_start();
  include_once "connection.php";
        $sql = "
        SELECT a.orasP,a.orasD,a.dataP,b.locuri,a.durata,a.ora,b.status,b.pret,b.plata,b.id FROM `curse` as a
        join `rezervari` as b
        on a.id=b.id_curse where b.id_user =:user_id
        ";

        $statement = $connection->prepare($sql);
        $statement->execute(array(
            ":user_id" => $_SESSION['userID'],

        ));
        $data = $statement->fetchAll(PDO::FETCH_ASSOC);
        echo json_encode($data);

?>