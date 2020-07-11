<?php

class Email
{
    private $to;
    private $subject;
    private $message;
    private $headers;
    private $anexo;
    private $boundary;

    public function getMessage()
    {
        $this->message = '
                    <html>
                        <head>
                            <title>E-BOOK</title>
                        </head>
        
                        <body>
                            <p>Parabéns pela escolha de ter uma vida saudável, segue em anexo o nosso e-book</p>
                            <p>Aslap: <a href="https://site-alexlima.000webhostapp.com/">e-book</a></p>
                        </body>
                    </html>
        ';
        
        return $this->message;
    }

    public function getHeaders()
    {
        // To send HTML mail, the Content-type header must be set
        $this->headers  = 'MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";

        // Additional headers
        $this->headers .= 'To: Mary <mary@example.com>' . "\r\n";
        $this->headers .= 'From: Alex Lima <birthday@example.com>' . "\r\n";

        return $this->headers;
    }

    public function getSubject()
    {
        $this->subject = "E-BOOK";

        return $this->subject;
    }

    public function setTo($email)
    {
        $this->to = $email;
    }

    public function getTo()
    {
        return $this->to;
    }

    public function enviarEmail()
    {
        mail(
            $this->getTo(),
            $this->getSubject(),
            $this->getMessage(),
            $this->getHeaders()
        );
    }
}