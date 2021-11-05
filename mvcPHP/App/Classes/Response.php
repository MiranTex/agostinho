<?php

namespace App\Classes;


class Response{

    private $message = array();
    private $status;

    public function __construct($status=null, $message=array()) {
        $this->status = $status;
        $this->message = $message;
    }

    public function addMessage($message){
        array_push($this->message,$message);
    }

    public function setStatus($status){
        $this->status = $status;
    }

    public function send(){

        echo json_encode(array(
            "status" => $this->status,
            "message" => $this->message
        ));

        die();
    }

}