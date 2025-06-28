<?php
include_once "connection.php";


$lname=$_POST['sendLname'];
$fname=$_POST['sendFname'];
$phone=$_POST['sendPhone'];
$email=$_POST['sendEmail'];
$password=md5($_POST['sendPassword']);

 $sql=" insert into  users (Fname, Lname, Phone, Email,Password) values (:fname,:lname,:phone,:email,:password)";

try{
$statement = $connection->prepare($sql);
$statement->execute(array(
 	":fname" => $fname,
 	":lname" => $lname,
    ":phone" => $phone,
 	":email" => $email,
 	":password" => $password

));
echo "Inregistrarea a fost efectuata cu succes!";
}catch (Exception $e){

	echo "Captured exception:" . $e->getMessage() . PHP_EOL;
}

?>