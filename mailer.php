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
$mail->addAddress('novadigital.contact@gmail.com'); // à changer
$mail->Subject = "Devis de ". $_POST['nom'];
$mail->isHTML(true); // Set email format to HTML
$Besoin="";
$check = $_POST['check'];
  if(empty($check))
  {
    echo("erreur");
  }
  else
  {
    $N = count($check);
    for($i=0; $i < $N; $i++)
    {
      $Besoin.=$check[$i] . " , ";
    }
  }
 $entreprise= isset($_POST['entreprise']) ?$_POST['entreprise'] :"Pas d'entreprise";
 $message= isset($_POST['message']) ?$_POST['message'] :"Pas de message";
$mail->Body = '<ul>
<li>Entreprise : '. $entreprise .'</li>
<li>Nom: '. $_POST['nom'] .'</li>
<li>Numéro de téléphone : '. $_POST['tel'] .'</li>
<li>E-mail : '. $_POST['email'] .'</li>
<li>Besoins : '. $Besoin .'</li>
<li>Message : '. $message .'</li>;
</ul>';
$msg = "";
 if (isset($_FILES["fichier"]) && $_FILES['fichier']['name'] != "") {

        $nom_fichier = $_FILES['fichier']['name'];
        $source = $_FILES['fichier']['tmp_name'];
        $type_fichier = $_FILES['fichier']['type'];
        $taille_fichier = $_FILES['fichier']['size'];
        if ($nom_fichier != ".htaccess") {
            if ( $type_fichier == "application/pdf") {
                if (array_key_exists('fichier', $_FILES)) {
                    $uploadfile = tempnam(sys_get_temp_dir(), hash('sha256', $_FILES['fichier']['name']));
                    if (move_uploaded_file($_FILES['fichier']['tmp_name'], $uploadfile)) {
                         $mail->addAttachment($uploadfile,$nom_fichier);
                    }
                }
            }
        }
                }if (!$mail->send()) {
                            $msg .= "Mailer Error: " . $mail->ErrorInfo;
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
