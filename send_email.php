<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php'; // Include PHPMailer autoloader

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Preia datele din formular
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Crează un obiect PHPMailer
    $mail = new PHPMailer(true);

    try {
        // Setează serverul SMTP
        $mail->isSMTP();
        $mail->Host = 'sandbox.smtp.mailtrap.io'; // Poți schimba acest lucru cu serverul tău SMTP
        $mail->SMTPAuth = true;
        $mail->Username = '8258ffe03224d0'; // Introduce username-ul tău SMTP
        $mail->Password = '143bc0fcf48b7f'; // Introduce parola ta SMTP
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Setează expeditorul și destinatarul
        $mail->setFrom('noreply@example.com', 'Website Contact');
        $mail->addAddress('recipient@example.com'); // Adresa de email către care se trimite mesajul

        // Setează subiectul și corpul email-ului
        $mail->isHTML(true);
        $mail->Subject = 'Mesaj de la ' . $name;
        $mail->Body    = "<strong>Nume:</strong> $name <br><strong>Email:</strong> $email <br><strong>Mesaj:</strong> $message";

        // Trimite email-ul
      if ($mail->send()) {
            // După trimiterea cu succes, redirecționează înapoi la formular cu un parametru pentru succes
            header('Location: contact.php?status=success');
            exit;
        } else {
            // Dacă nu a fost trimis, redirecționează cu un mesaj de eroare
            header('Location: contact.php?status=error');
            exit;
        }
    } catch (Exception $e) {
        // Dacă apare o eroare, redirecționează cu un mesaj de eroare
        header('Location: contact.php?status=error');
        exit;
    }
}
?>
