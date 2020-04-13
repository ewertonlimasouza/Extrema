<?php
require 'vendor/autoload.php'; // If you're using Composer (recommended)
// Comment out the above line if not using Composer
// require("<PATH TO>/sendgrid-php.php");
// If not using Composer, uncomment the above line and
// download sendgrid-php.zip from the latest release here,
// replacing <PATH TO> with the path to the sendgrid-php.php file,
// which is included in the download:
// https://github.com/sendgrid/sendgrid-php/releases

/*$nome = $_POST['fname'];
$tel = $_POST['lname'];
$email = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];*/

if(isset($_REQUEST['fnome']))
{
// envia email aqui
}else{
  header('Location: index.html');
}

$nome = $_POST['fnome'];
$tel = $_POST['telefone'];
$gemail = $_POST['email'];
$subject = $_POST['subject'];
$message = $_POST['message'];

$email = new \SendGrid\Mail\Mail(); 
$email->setFrom($gemail, $nome);
$email->setSubject($subject);
$email->addTo("sabrinaferreira2025@gmail.com");
$email->addContent("text/html", "<h1>Contato Via site extrema </h1> <br><br> Nome: $nome <br> Telefone: $tel <br> Email: $gemail <br><br> Assunto: $subject <br><br> Mensagem: $message");
$sendgrid = new \SendGrid('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');
try {
    $response = $sendgrid->send($email);
    header('Location: index.html');
} catch (Exception $e) {
    echo 'Caught exception: '. $e->getMessage() ."\n";
}