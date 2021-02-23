<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require '/home/u471826822/domains/novadigital.fr/public_html/PHPMailer/src/Exception.php';
require '/home/u471826822/domains/novadigital.fr/public_html/PHPMailer/src/PHPMailer.php';
require '/home/u471826822/domains/novadigital.fr/public_html/PHPMailer/src/SMTP.php';
$mail = new PHPMailer;
$mail->isSMTP();
$mail->SMTPDebug = 0;
$mail->Host = 'smtp.hostinger.fr';
$mail->Port = 587;
$mail->SMTPAuth = true;
$mail->Username = 'devis@novadigital.fr';
$mail->Password = 'Cooky.2021';
$mail->setFrom('devis@novadigital.fr');
$mail->addAddress('amaukill@gmail.com');
$mail->Subject = "Message". $_POST['name'];
$mail->isHTML(true); // Set email format to HTML
$mail->Body = '<ul>
<li>Nom: '. $_POST['nom'] .'</li>
<li>E-mail : '. $_POST['mail'] .'</li>
<li>Message : '. $_POST['msg'] .'</li>';
$msg="";
if (!$mail->send()) {
                            $msg .= "Message Erreurr: " . $mail->ErrorInfo;
                        } else {
                            $msg .= "Message envoyé!";
                        }

    if (isset($msg)){
echo $msg;
}
    else{
echo "Votre mail n'a pas été envoyé. Vérifiez que votre pièce jointe est bien un pdf ";
}
header('Location : index.html');
