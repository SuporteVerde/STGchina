<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'vendor/autoload.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contato = $_POST['contato'];
    $service = $_POST['service'];

    $body = "<h2>Mensagem recebida</h2>
             <p><b>Nome:</b> {$name}</p>
             <p><b>Email:</b> {$email}</p>
             <p><b>Contato:</b> {$contato}</p>
             <p><b>Serviço:</b><br>{$service}</p>";

    $mail = new PHPMailer(true);

    try {
        $mail->isSMTP();
        $mail->CharSet = 'UTF-8';
        $mail->Host = 'smtp.hostinger.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'comercial@stgbr.com.br';
        $mail->Password = 'Com22234!';
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        $mail->setFrom('comercial@stgbr.com.br', $name);
        $mail->addAddress('comercial@stgbr.com.br', 'Especialistas em Importação e Logística da China');

        $mail->isHTML(true);
        $mail->Subject = "Mensagem recebida do site: {$assunto}";
        $mail->Body    = $body;
        $mail->AltBody = strip_tags($body);

        $mail->send();
        echo "success";
    } catch (Exception $e) {
        echo "error";
    }
    exit;
}
?>
