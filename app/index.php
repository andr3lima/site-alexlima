<?php

require_once("../vendor/autoload.php");

use App\Support\Email;

if (sizeof($_POST) > 0) {
    $email = new Email();
    
    $email->add(
        "E-book",
        "<h1>E-book</h1>",
        $_POST['email'],
        $_POST['nome']
    )->attach("../public_html/e-book/e-book.pdf", "E-book")->send();
    
    if (!$email->error()) {
        echo 'true';
    } else {
        //$email->error()->getMessage();
        echo 'false';
    }    
}