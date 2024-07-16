<?php

require '../../api/vendor/autoload.php';
include_once("../../controllers/UsuarioController.php");

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

header('Content-Type: application/json');

$emailUsuario = $_POST['email'];

$usuarioCont = new UsuarioController();
$codigo = $usuarioCont->gerarSenhaCodigoRecuperacao($emailUsuario);
if(!is_int($codigo)){
    echo json_encode(array('status' => 'form-error', 'message' => $codigo));
    exit;
}

// Configurações do PHPMailer
$mail = new PHPMailer(true);
try {
    // Configurações do servidor
    $mail->isSMTP();
    $mail->Host = 'smtp.greengoifpr.com.br'; // Substitua pelo host SMTP do KingHost
    $mail->SMTPAuth = true;
    $mail->Username = 'no-reply@greengoifpr.com.br'; // Substitua pelo seu e-mail
    $mail->Password = 'GreenGo!BOT'; // Substitua pela sua senha
    $mail->SMTPSecure = false;
    $mail->SMTPAutoTLS = false;
    $mail->Port = 587;

    // Configurações do remetente
    $mail->setFrom('no-reply@greengoifpr.com.br', 'Green Go');

    // Configurações do destinatário
    $mail->addAddress($emailUsuario);

    // Configurações do corpo do email
    $mail->isHTML(true);
    $mail->CharSet = 'utf-8';
    $mail->Subject = 'Código de recuperação de senha';
    $mail->Body = "Recebemos uma solicitação para redefinir sua senha do Green Go.
                   <br>Insira o código de redefinição de senha a seguir:<br>
                   <b>$codigo</b>";

    $mail->send();

    echo json_encode(array('status' => 'success', 'message' => 'E-mail enviado com sucesso! Por favor cheque sua caixa de correio.'));
} catch (Exception $e) {
    echo json_encode(array('status' => 'mail-error', 'message' => "Erro ao enviar e-mail! Entre em contato com um administrador."));
    // echo $mail->ErrorInfo;
}

?>