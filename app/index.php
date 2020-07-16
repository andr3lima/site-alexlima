<?php

require_once("../vendor/autoload.php");

use App\Support\Email;

if (sizeof($_POST) > 0) {
    $email = new Email();
    $email2 = new Email();
    

    $tipo = $_POST['type_email'];

    switch($tipo) {
        case "e-book":
            $email->add(
                "RECEBIMENTO DO E-BOOK",
                "<h1>E-book</h1>",
                $_POST['email'],
                $_POST['nome']
            )->attach("../public_html/e-book/e-book.pdf", "E-book")->send();

            $email2->add(
                "RECEBIMENTO DO E-BOOK",
                "<h3>O E-book foi enviado para ".$_POST['nome']."</h3>
                <p>
                    <b>Informações pessoais.</b><br>
                    <b>Nome:</b>".$_POST['nome']."<br>
                    <b>E-mail:</b>".$_POST['email']."
                    <b>Telefone:</b>".$_POST['telefone']."
                </p>",
                "servidor.aslap@gmail.com",
                $_POST['nome']
            )->send();
            break;
        
        case "contato":
            $email->add(
                "Informações de contato.",
                "<p>
                    <b>Nome</b>:".$_POST['nome']."<br>
                    <b>E-mail</b>:".$_POST['email'].
                "<br>
                <p><b>Menssagem:</b>".$_POST['msg']."</p>",
                'servidor.aslap@gmail.com',
                $_POST['nome']
            )->send();
            break;

        case "plano":
            $email->add(
                "Consultoria Online.",
                "<p>
                    <h3>Informações da consultoria</h3>
                    <b>Plano</b>:".$_POST['plano']."<br>
                    <b>Valor</b>:".$_POST['valor']."<br>
                    <b>Desconto</b>:".$_POST['desconto']."<br>
                    <h3>Informações de contato pessoal</h3>
                    <b>Nome</b>:".$_POST['nome']."<br>
                    <b>E-mail</b>:".$_POST['email']."<br>
                    <b>Telefone</b>:".$_POST['telefone']."<br>
                    <h3>Informações de complementares.</h3>
                    <b>Peso</b>:".$_POST['peso']."<br>
                    <b>Altura</b>:".$_POST['altura'].
                "<br><br>
                 <b>Objetivo:</b>".$_POST['msg']."</p>",
                'servidor.aslap@gmail.com',
                $_POST['nome']
            )->send();
            break;
    }
    
    if (!$email->error()) {
        echo 'true';
    } else {
        //$email->error()->getMessage();
        echo 'false';
    }    
}