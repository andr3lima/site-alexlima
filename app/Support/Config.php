<?php

namespace App\Support;

class Config{

    public $host;
    public $port;
    public $user;
    public $passwd;
    public $from_name;
    public $from_email;

    public function __construct()
    {
        $this->host = "smtp.gmail.com";
        $this->port = "587";
        $this->user = "servidor.aslap@gmail.com";
        $this->passwd = "85135715";
        $this->from_name = "Alex lima";
        $this->from_email = "andrevflima@gmail.com";
    }
}