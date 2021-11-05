<?php

header( 'Content-Type:application/json;charset=utf-8');
header("Access-Control-Allow-Origin: http://localhost");
require 'vendor/autoload.php';

use App\mail\Email as Email;
use App\Controllers\FileUploadController;
use App\Classes\Response;

$response = new Response();
$success = true;


if($_SERVER['REQUEST_METHOD'] === "POST"){

    if(!$validateFields = validate([
        'name' => "required",
        'email' => "required|email",
        'n_doc' => "required",
        "morada"=> "",
        "tel" => ""
    ])){
        $response->setStatus("error");
        $response->addMessage("Os dados não foram correctamente inseridos");
        $response->send();
    }


    $doc = "";
    $requisition = "";

    if (isset($_FILES['doc']) && isset($_FILES['requisition'])) {
        // echo json_encode($_FILES['doc'],JSON_UNESCAPED_UNICODE);

        $doc = new FileUploadController($_FILES['doc'],"Documento");
        $requisition = new FileUploadController($_FILES['requisition'],utf8_decode("Requisição médica"));

        if(($doc = $doc->uploadFile()) && ($requisition = $requisition->uploadFile())){
            
        }else{
            $res = new Response("error","erro no upload dos ficheiros");
            $res->send();
        }

    }else{
        $response->addMessage("Os ficheiros tem de ser submetidos");
        $response->setStatus("error");
        http_response_code(404);
        $response->send();
    }
    
    $files = [ 
        $doc,
        $requisition
    ];

    $email = new Email($validateFields,$files);


    if( $email->enviarEmail()){
       echo(json_encode(array("status"=> "success", "message" =>"email enviado com sucesso")));
       
    }else{
       echo(json_encode(array("status"=> "error", "message" =>"email não enviado tente mais tarde")));
    }
    foreach ($files as $key => $file) {
        FileUploadController::fileDelete($file['target']);
    }
}else{
    $res = new Response("error","method nao suportado");
    $res->send();
}

