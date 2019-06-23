<?php

$errors = []; //hold all system errors from validation process
$response = []; // hold all the system response from different validation


//special validation function
function test_input($data) {
  $data = trim($data);
  $data = stripslashes($data);
  $data = htmlspecialchars($data);
  return $data;
}

$email_address = test_input($_POST['email_address']); // remove all scripintg risk in the system
$password = test_input($_POST['password']); // remove all scripintg risk in the system

$email_address = filter_var($email_address, FILTER_SANITIZE_EMAIL); // Remove all illegal characters from email


if (empty($email_address)) {
    $errors['email_error'] = "Email Address Field is Missing";
} 

else if (filter_var($email_address, FILTER_VALIDATE_EMAIL) == FALSE) {
    $errors['email_error'] = "Email address is not valid";
} 

if (empty($password) == TRUE) {
    $errors['password_error'] = "Password Field is Missing";
}

//Final Response Process
$response['errors'] = $errors;
    
if(!empty($errors)) {
    $response['success'] = false;
    $response['message'] = "Validation Failed";
    
}
else {
    $response['success'] = true;
    $response['message'] = 'Validation Successful';
}

echo json_encode($response);