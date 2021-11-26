<?php

session_start();

require 'config.php';
require_once 'emailController.php';

$errors = array();
$user_email = '';
$user_password = '';
$user_conf_password = '';

// if user click register button
if(isset($_POST['reg_btn'])){
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];
    $user_conf_password = $_POST["user_conf_password"];

    if(empty($_POST["user_email"])){
    $errors['user_email'] = '<label class="text-danger">Enter Email Address</label>';
    }
    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
    $errors['user_email'] = '<label class="text-danger">Enter Valid Email Address</label>';
    }
    if(empty($_POST["user_password"])){
    $errors['user_password'] = '<label class="text-danger">Enter Password</label>';
    }
    if(empty($_POST["user_conf_password"])){
    $errors['user__conf_password'] = '<label class="text-danger">Enter Confirm Password</label>';
    }
    if($user_password !== $user_conf_password){
    $errors['user_password'] = '<label class="text-danger">Pass word do not match.</label>';
    }

    // check if email already exist
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1" ;
    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $user_email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['user_email'] = '<label class="text-danger">Email already exist</label>';
    }

    // if no error -> save registration info to db
    if (count($errors) === 0){
        echo "no error";
        $user_password = password_hash($user_password, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO users (email, verified, token, password) VALUES (?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('sbss', $user_email, $verified, $token, $user_password);

        if ($stmt->execute()){
            echo "New record created successfully";
            //login user
            $user_id = $conn->insert_id;
            $_SESSION['id'] = $user_id;
            $_SESSION['email'] = $user_email;
            $_SESSION['verified'] = $verified;

            sendVerificationEmail($user_email,$token,$mail);
            // set flash message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";
            //header('location: index.php');
            //exit();
        }else{
            $errors['db_error'] = "Database error: failed to register";
            echo "error";
        }
    } 
}

// if user click log in button
if(isset($_POST['login_btn'])) {
    echo "posted";
    $user_email = $_POST["user_email"];
    $user_password = $_POST["user_password"];

    //validation
    if (empty($_POST["user_email"])) {
    $errors['user_email'] = '<label class="text-danger">Email required Address</label>';
    }
    if (!filter_var($user_email, FILTER_VALIDATE_EMAIL)) {
    $errors['user_email'] = '<label class="text-danger">Enter Valid Email Address</label>';
    }
    if (empty($_POST["user_password"])) {
    $errors['user_password'] = '<label class="text-danger">Password required</label>';
    }

    if (count($errors) === 0) {
        $sql = "SELECT * FROM users WHERE email=? LIMIT 1";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $user_email);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($user_password, $user['password'])) {
            //login success
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = $user['verified'];
            // set flash message
            $_SESSION['message'] = "You are now logged in!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index.php');
            exit();
        }
        else {
            $errors['login_failed'] = "incorrect password";
        }
    }
}

// verify user by token
function verifyUser($token){
    global $conn;
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn,$sql);

    if(mysqli_num_rows($result) > 0){
        $user = mysqli_fetch_assoc($result);
        $update_query = "UPDATE users SET verified=1 WHERE token='$token'";

        if(mysqli_query($conn,$update_query)){
            // log user in
            $_SESSION['id'] = $user['id'];
            $_SESSION['email'] = $user['email'];
            $_SESSION['verified'] = 1;
            // set flash message
            $_SESSION['message'] = "Your email address was successfully verified!";
            $_SESSION['alert-class'] = "alert-success";
            header('location: index.php');
            exit();
        }   
    }else{
        echo 'User not found';
    }
}