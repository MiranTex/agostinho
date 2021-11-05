<?php

namespace App\Controllers;


class FileUploadController{

    public $file;
    public $name;
    private $target_dir = "uploads/";
    private $target_file;


    public function __construct($file,$name) {
        $this->file = $file;
        $this->name = $name;
    }

    public function uploadFile(){

       
        $this->target_file = $target_file = $this->target_dir . rand(1,99999) .basename($this->file["name"]);

        $uploadOk = 1;

        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        
        // Check if image file is a actual image or fake image
        if(isset($_POST["submit"])) {
            $check = getimagesize($this->file["tmp_name"]);
            if($check !== false) {
                echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                echo "File is not an image.";
                $uploadOk = 0;
            }
        }


        // Check if file already exists
        if (file_exists($target_file)) {
            echo "Sorry, file already exists.";
            $uploadOk = 0;
        }

        // Check file size
        if ($this->file["size"] > 5000000) {
            echo "Sorry, your file is too large.";
            $uploadOk = 0;
        }

        // Allow certain file formats
        if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "pdf" ) {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            $uploadOk = 0;
        }

        $success = true;

        // Check if $uploadOk is set to 0 by an error
        if ($uploadOk == 0) {
            $success = false;
        // if everything is ok, try to upload file
        } else {
            if (move_uploaded_file($this->file["tmp_name"], $target_file)) {
            } else {
                $success = false;
                http_response_code(404);
            }
        }

       return $success ?  array("target" => $target_file, "name" => $this->name) : false;

    }


    public static function fileDelete($target_file){
        unlink($target_file);
    }
}
