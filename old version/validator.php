<?php
    //Array ( [email_address] => hafijul233@gmail.com [password] => 123456 [rememberMe] => remember-me ) 
    
    $email = $_POST['email_address'];
    $password = $_POST['password'];
    $response = array();
    $errors = array();
    
    if(empty($email) || empty($password)) {
        $response['errors'] = "One or More Fields are Empty";
    }
    else {
        if($email == "hafijul233@gmail.com" && $password == "123456") {
            $response['errors'] = NULL;
            $response['msg'] = "Match Found";
        }
        else {
            $response['errors'] = NULL;
            $response['msg'] = "Match Not Found";
        }
    }
        
    echo json_encode($response);