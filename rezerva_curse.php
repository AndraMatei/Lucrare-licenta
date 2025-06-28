<?php
include_once "connection.php";
session_start();

$locuri=$_POST['locuri'];
$id_curse=$_POST['id_cursa'];
$status="In asteptare";
$total=$_POST['total'];
$pret=$_POST['pret'];

 $sql=" insert into  rezervari (id_user, id_curse, locuri,status,pret) values (:id_user,:id_curse,:locuri,:status,:pret)";

try{
$statement = $connection->prepare($sql);
$statement->execute(array(
 	":id_user" => $_SESSION["userID"],
 	":id_curse" => $id_curse,
    ":locuri" => $locuri,
 	":status" => $status,
	":pret" =>$pret

));
$sql=" update  curse set locuri= :locuri where id= :id";

try{
$statement = $connection->prepare($sql);
$statement->execute(array(
 	":id" => $id_curse,
    ":locuri" => $total - $locuri,
));
echo "Rezervarea a fost efectuata cu succes";
}catch (Exception $e){

	echo "Captured exception:" . $e->getMessage() . PHP_EOL;
}
}catch (Exception $e){

	echo "Captured exception:" . $e->getMessage() . PHP_EOL;
}

?>