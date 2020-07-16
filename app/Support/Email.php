<?php

namespace App\Support;

use Exception;
use stdClass;
use PHPMailer\PHPMailer\PHPMailer;
use App\Support\Config;

class Email 
{
    /** @var PHPMailer */
    private $mail;

    /** @var stdClass */
    private $data;

    /** @var Exception */
    private $error;

    /** @var Config */
    private $config;

    public function __construct()
    {

        $this->mail = new PHPMailer(true);
        $this->data = new stdClass();
        $this->config = new Config();

        $this->mail->isSMTP();
        $this->mail->isHTML();
        $this->mail->setLanguage("br");

        $this->mail->SMTPAuth = true;
        $this->mail->SMTPSecure = "tls";
        $this->mail->CharSet = "utf-8";

        $this->mail->Host = $this->config->host;
        $this->mail->Port = $this->config->port;
        $this->mail->Username = $this->config->user;
        $this->mail->Password = $this->config->passwd; 
    }

    public function add(string $subject, string $body, string $recipient_name, string $recipient_email) : Email
    {
        $this->data->subject = $subject;
        $this->data->body = $body;
        $this->data->recipient_name = $recipient_name;
        $this->data->recipient_email = $recipient_email;
        
        return $this;
    }

    public function attach(string $filePath, string $fileName): Email
    {
        $this->data->attach[$filePath] = $fileName;

        return $this;
    }

    public function send(string $from_name = "", string $from_email = ""): bool
    {
        try{
            
            if ($from_name == "" && $from_email == "") {
                $from_name = $this->config->from_email;
                $from_email = $this->config->from_name;
            }

            $this->mail->Subject = $this->data->subject;
            $this->mail->msgHTML($this->data->body); 
            $this->mail->addAddress($this->data->recipient_name, $this->data->recipient_email);
            $this->mail->setFrom($this->config->from_email, $this->config->from_name);

            if (!empty($this->data->attach)) {
                foreach($this->data->attach as $path => $name) {
                    $this->mail->addAttachment($path, $name);
                }
            }

            $this->mail->send();
            return true;

        } catch(Exception $exception) {
            $this->error = $exception;
            return false;
        }
    }
    
    public function error(): ? Exception 
    {
        return $this->error;
    }
}

















