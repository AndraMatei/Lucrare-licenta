<?php
include_once "connection.php";

$intors=$_POST['intors'];
$orasP=$_POST['orasP'];
$orasD=$_POST['orasD'];
$dataP=$_POST['dataP'];
$locuri=$_POST['locuri'];
$cond="";
if($intors === 'true')
{
    $dataR=$_POST['dataR'];
    $cond=" union select * from curse where orasP = :orasD1 and orasD = :orasP1 and DATE(dataP) = :dataR  and locuri > :locuri1";


}


   $sql = "
    select * from curse where orasP = :orasP and orasD = :orasD and  DATE(dataP) = :dataP  and locuri > :locuri
    " .$cond  ;

$statement = $connection->prepare($sql);
if($intors === 'true'){
$statement->execute(array(
":orasP" => $orasP,
":orasD" => $orasD,
":dataP" => $dataP,
":locuri" => $locuri,
":orasD1" => $orasD,
":orasP1" => $orasP,
":dataR" => $dataR,
":locuri1" => $locuri,


));
}
else
{
    $statement->execute(array(
        ":orasP" => $orasP,
        ":orasD" => $orasD,
        ":dataP" => $dataP,
        ":locuri" => $locuri,

        ));


}

$data = $statement->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($data);










?>