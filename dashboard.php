<?php
    require_once "main.php";

    //checking session and cookie that user has been logged or no
    session_start();
    if( !isset($_SESSION['id']) or !isset($_COOKIE['User']) )
        header('location:index.php');

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

    <title>Dashboard</title>
</head>

<body style="background-color: #272c34">
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12 mx-auto p-5">
            <div class="card alert-success">
                <div class="card-header text-center">
                    <h2><i class="fas fa-home"></i> Dashboard</h2>
                </div>
                <div class="card-body">
                    <div>
                        <h3 style="display: inline">Hi </h3>
                        <button class="btn btn-danger" style="float: right">
                            <a href="logout.php" style="color: #ffffff; text-decoration: none">Logout</a>
                            <i class="fas fa-sign-out-alt"></i>
                        </button>
                        <br>
                        <br>
                    </div>
                    <div>
                        All <input type="radio" id="allUsersRadio" name="filter" value="all" class="custom-radio" checked>
                        Active Users <input type="radio" id="activeUsersRadio" name="filter" value="active" class="custom-radio">
                        <br>
                        <br>
                        <input id="textSearch" class="form-control" placeholder="Search...">
                    </div>
                    <div>
                        <!-- show data -->
                        <div id="showMessage"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-lg-10 mx-auto my-5" style="height: 80px">
            <!-- pert_space -->
        </div>
    </div>

    <div class="row">
        <div class="col-sm-12 col-lg-6 mx-auto my-5">
            <h6 class="text-center" style="color: white">Prepared by Arash Mohammadi</h6>
        </div>
    </div>
</div>

</body>

</html>

<!-- for loading All rows in start-->
<script>
    $(document).ready(function (){
        searching('all');
    })
</script>