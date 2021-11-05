<?php

function validate(array $validation){
    $result = [];
    
    foreach ($validation as $field => $validate) {
        if(!strpos($validate,'|')){
            
            $result[$field] = $validate ==! "" ? $validate($field) : filter_input(INPUT_POST,$field,FILTER_SANITIZE_STRIPPED);
        }else{
            $explodePipeValidadte = explode("|",$validate);

            foreach ($explodePipeValidadte as $validate) {
               $result[$field] = $validate($field);
            }
        }
    }

    if(in_array(false, $result)){
        return false;
    }

    return $result;
}


function required($field){
    if(isset($_POST[$field]) && $_POST[$field] === ''){
        return false;
    }

    return filter_input(INPUT_POST, $field, FILTER_SANITIZE_STRING);
}




function email($field){
    $emailIsValid = filter_input(INPUT_POST,$field,FILTER_VALIDATE_EMAIL);

    if(!$emailIsValid){
        return false;
    }

    return filter_input(INPUT_POST,$field,FILTER_VALIDATE_EMAIL);
}


function filter(){
    $filter = [
        "name" => FILTER_SANITIZE_STRIPPED,
        "email" => FILTER_VALIDATE_EMAIL,
        "endereco" => FILTER_SANITIZE_STRIPPED,
        "tel" => FILTER_SANITIZE_STRIPPED
    ];

    $data = filter_input_array(INPUT_POST,$filter);

    return in_array(false,$data) ? false : $data;
}