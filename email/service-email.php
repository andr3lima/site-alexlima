<?php

require_once('Email.php');

$type_email = $_POST['type_email'];

$email = $_POST['email'];
$nome = $_POST['name'];
$telefone = $_POST['mobile'];

switch ($type_email){
    case "e-book":
        $mail = new Email();
        $mail->setTo($email);
        $mail->enviarEmail();
        echo "Verifique seu email";
        break;
    default:
        echo "Opção de email inválida";
        break;
}