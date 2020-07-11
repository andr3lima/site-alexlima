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

        $this->boundary = "XYZ-".md5(date("dmYis"))."-ZYX";

        // Ou arquivo local
        $path = '/caminho/para/o/arquivo';
        $fileType = mime_content_type( $path );
        $fileName = basename( $path );

        // Pegando o conteúdo do arquivo
        $fp = fopen( $path, "rb" ); // abre o arquivo enviado
        $anexo = fread( $fp, filesize( $path ) ); // calcula o tamanho
        $anexo = chunk_split(base64_encode( $anexo )); // codifica o anexo em base 64
        fclose( $fp ); // fecha o arquivo

        /*
        $this->message = '
                    <html>
                        <head>
                            <title>E-BOOK</title>
                        </head>
        
                        <body>
                            <p>Parabéns pela escolha de ter uma vida saudável, segue em anexo o nosso e-book</p>
                            <p>Aslap: '.$this->getAnexo().'</p>
                        </body>
                    </html>
        ';*/

        $mensagem  = "--$this->boundary" . PHP_EOL;
        $mensagem .= "Content-Type: text/html; charset='utf-8'" . PHP_EOL;
        $mensagem .= "Mensagem: o e-book"; // Adicione aqui sua mensagem
        $mensagem .= "--$this->boundary" . PHP_EOL;

        $mensagem .= "Content-Type: ". $fileType ."; name=\"". $fileName . "\"" . PHP_EOL;
        $mensagem .= "Content-Transfer-Encoding: base64" . PHP_EOL;
        $mensagem .= "Content-Disposition: attachment; filename=\"". $fileName . "\"" . PHP_EOL;
        $mensagem .= "$anexo" . PHP_EOL;
        $mensagem .= "--$boundary" . PHP_EOL;
        
        $this->message = $mensagem;
        
        return $this->message;
    }

    public function getHeaders()
    {
        $this->headers  = 'MIME-Version: 1.0' . "\r\n";
        $this->headers .= 'Content-type: text/html; charset=utf-8' . "\r\n";
        $this->headers .= "Content-Type: multipart/mixed; ";
        $this->headers .= "boundary=" . $this->boundary . PHP_EOL;
        $this->headers .= "$this->boundary" . PHP_EOL;

        // Additional headers
        $this->headers .= 'To: Mary <mary@example.com>, Kelly <kelly@example.com>' . "\r\n";
        $this->headers .= 'From: Birthday Reminder <birthday@example.com>' . "\r\n";
        $this->headers .= 'Cc: birthdayarchive@example.com' . "\r\n";
        $this->headers .= 'Bcc: birthdaycheck@example.com' . "\r\n";

        return $this->headers;
    }

    public function getSubject()
    {
        $this->subject = "E-BOOK";

        return $this->subject;
    }

    public function getAnexo()
    {
        // Ou arquivo local
        $path = 'e-book.pdf';
        $fileType = mime_content_type( $path );
        $fileName = basename( $path );

        // Pegando o conteúdo do arquivo
        $fp = fopen( $path, "rb" ); // abre o arquivo enviado
        $anexo = fread( $fp, filesize( $path ) ); // calcula o tamanho
        $anexo = chunk_split(base64_encode( $anexo )); // codifica o anexo em base 64
        fclose( $fp ); // fecha o arquivo

        /*
        $mensagem .= "Content-Type: ". $fileType ."; name=\"". $fileName . "\"" . PHP_EOL;
        $mensagem .= "Content-Transfer-Encoding: base64" . PHP_EOL;
        $mensagem .= "Content-Disposition: attachment; filename=\"". $fileName . "\"" . PHP_EOL;
        $mensagem .= "$anexo" . PHP_EOL;
        $mensagem .= "--$boundary" . PHP_EOL;
        */

        $this->anexo = $anexo;
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