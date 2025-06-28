<?php
include_once "connection.php";

if (isset($_POST['id'])) {
    $cursaId = $_POST['id'];
    
    // Șterge cursa din tabelul "curse" pe baza ID-ului
    $sql = "DELETE FROM curse WHERE id = :cursaId";
    $statement = $connection->prepare($sql);
    $result = $statement->execute([':cursaId' => $cursaId]);

    if ($result) {
        echo "Cursa a fost ștearsă cu succes!";
    } else {
        echo "A apărut o eroare la ștergerea cursei.";
    }
}
?>
