<?php
    //checking session and cookie that user has been logged or no
    session_start();
    if( isset($_SESSION['id']) and isset($_COOKIE['User']) )
        header("location:dashboard.php");
?>

<!doctype html>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- css -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="assets/css/main.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">

    <!-- javascript -->
    <script src="assets/js/jquery-3.5.1.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/behavior.js"></script>
    <script src="assets/js/jquery.validate.min.js"></script>
    <script src="assets/js/form-validation.js"></script>

    <title>Login Page</title>
</head>

<body style="background-color: #272c34">
    <div class="container">

        <!-- Main Form -->
        <div class="row">
            <div class="col-sm-12 col-lg-6 mx-auto my-4 text-center border border-light p-5">

                <form name="login" class="login" autocomplete="off">

                    <div class="form-group">
                        <i class="fas fa-user fa-5x" style="color: #45808f"></i><br><br>
                        <p class="h4 mb-4" style="color: #45808f">Sign in</p>

                        <!-- Username -->
                        <input type="text" id="username" name="username" class="form-control mb-4" placeholder="Username">

                        <!-- Password -->
                        <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">

                        <div class="d-flex justify-content-around">
                            <div>
                                <!-- Remember me -->
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember">
                                    <label class="custom-control-label" for="remember" style="color: #45808f">Remember me</label>
                                </div>

                            </div>
                            <div>
                                <!-- <span style="color: #45808f">Forgot password</span> -->
                                <a href="#" style="color: #ffffff">Forgot password?</a>
                            </div>
                        </div>
                    </div>

                </form>

                <!-- Sign in button -->
                <button id="signInBtn" name="signInBtn" class="btn btn-info btn-block my-4" autofocus>
                    Sign in <i class="fas fa-sign-in-alt"></i>
                </button>

                <!-- Register -->
                <p style="color: #45808f">Not a member?
                    <a href="register.php" style="color: #ffffff">Register</a>
                </p>

            </div>
        </div>

        <!-- Output Message -->
        <div class="row">
            <!-- .mx-# / mx-*-# 	margin left and right -->
            <div class="col-sm-12 col-lg-10 mx-auto my-5" style="height: 50px">
                <div id="showMessage"></div>
            </div>
        </div>

        <!-- Footer -->
        <div class="row">
            <div class="col-sm-12 col-lg-6 mx-auto my-5">
                <h6 class="text-center" style="color: white">Prepared by nsky1618</h6>
            </div>
        </div>
    </div>
</body>

</html>