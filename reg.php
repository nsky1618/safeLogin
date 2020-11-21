<?php
    require_once "main.php";

    $ma = new Main();

    $fn = $ln = $user = $pass = $repeatPass = $mail = $message = "";

    if(isset($_POST['fname']))
        $fn = $ma->safeString($_POST['fname']);
    if(isset($_POST['lname']))
        $ln = $ma->safeString($_POST['lname']);
    if(isset($_POST['mail']))
        $mail = $ma->safeString($_POST['mail']);
    if(isset($_POST['username']))
        $user = $ma->safeString($_POST['username']);
    if(isset($_POST['password']))
        $pass = $ma->safeString($_POST['password']);
    if(isset($_POST['repeatPassword']))
        $repeatPass = $ma->safeString($_POST['repeatPassword']);

    if($fn == ''){
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter First Name...!</div>';
        $status = 0;
    }
    elseif ($ln == ''){
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter Last Name...!</div>';
        $status = 0;
    }
    elseif ($mail == ''){
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter Email Address...!</div>';
        $status = 0;
    }
    elseif ($user == ''){
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter User Name...!</div>';
        $status = 0;
    }
    elseif ($pass == '') {
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter Password...!</div>';
        $status = 0;
    }
    elseif ($repeatPass == ''){
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter Confirmation Password...!</div>';
        $status = 0;
    }
    elseif ($repeatPass != $pass){
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Password and Confirmation Password are not match...!</div>';
        $status = 0;
    }
    else {
        if ($ma->Register($fn, $ln, $user, $pass, $mail)) {
            $message = '<div class="alert alert-success text-center">Registration Successfull<br>Go to Login Page</div>';
            $status = '1';
        } else {
            $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Registration Failed.<br>Repeated Username...!</div>';
            $status = 0;
        }
    }

    echo json_encode(
            array(
                "status" => $status,
                "message" => $message,
            )
    );