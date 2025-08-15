<?php
$firstName = $_POST['firstName'];
$lastName =  $_POST['lastName'];
$email =     $_POST['email'];

$errors = [
    'firstNameError' => '',
    'lastNameError'  => '',
    'emailError'     => '',     
];

if(isset($_POST["submit"])) {
    // Validate firstName
    if(empty($firstName)) {
        $errors["firstNameError"] = "Please write your first name";
    }
    
    // Validate lastName        
    if(empty($lastName)) {
        $errors["lastNameError"] = "Please write your last name";
    }
    
    // Validate email        
    if(empty($email)) {
        $errors["emailError"] = "Please write your email";
    } elseif(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["emailError"] = "Please enter a valid email address";
    }      
    
    // Check if there are no errors (array_filter returns empty array if no errors)
    if(!array_filter($errors)) {
        $firstName = mysqli_real_escape_string($conn, $_POST['firstName']);
        $lastName =  mysqli_real_escape_string($conn, $_POST['lastName']);
        $email =     mysqli_real_escape_string($conn, $_POST['email']);

        $sql = "INSERT INTO users(firstName, lastName, email) 
                VALUES ('$firstName', '$lastName', '$email')";

        if(mysqli_query($conn, $sql)) {
            header('Location: ' . $_SERVER['PHP_SELF']);
            exit; // Always exit after header redirect
        } else {
            echo 'Error: ' . mysqli_error($conn);
        } 
    }  
}

