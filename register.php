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

    <title>Register Page</title>
</head>

<body style="background-color: #272c34">
    <div class="container">

        <div class="row">
            <div class="col-sm-12 col-lg-6 mx-auto my-3 text-center border border-light pl-5 pr-5 pt-3">

                <form name="register" class="register">
                    <i class="fas fa-user-plus fa-3x" style="color: #45808f"></i><br><br>
                    <p class="h4 mb-4" style="color: #45808f">Register</p>

                    <!-- First Name -->
                    <input type="text" id="fname" name="fname" class="form-control mb-4" placeholder="First Name">

                    <!-- Last Name -->
                    <input type="text" id="lname" name="lname" class="form-control mb-4" placeholder="Last Name">

                    <!-- Email -->
                    <input type="email" id="mail" name="mail" class="form-control mb-4" placeholder="Email Address">

                    <!-- Username -->
                    <input type="text" id="username" name="username" class="form-control mb-4" placeholder="username">

                    <!-- Password -->
                    <input type="password" id="password" name="password" class="form-control mb-4" placeholder="Password">

                    <!-- Repeated Password -->
                    <input type="password" id="repeatPassword" name="repeatPassword" class="form-control mb-4" placeholder="Confirmation Password">

                </form>

                <!-- register button -->
                <button id="registerBtn" name="registerBtn" class="btn btn-info btn-block align-self-center mx-auto" style="width:50%" autofocus>
                    Register <i class="fas fa-user-plus"></i>
                </button>

                <!-- Back to Login -->
                <button name="back" class="btn btn-info btn-block my-4" style="width:50%; margin:0px auto" type="button">
                    <a href="index.php" style="color: white; text-decoration: none">Back to Login</a> <i class="fas fa-sign-in-alt"></i>
                </button>

            </div>
        </div>

        <!-- Output Message -->
        <div class="row">
            <div class="col-sm-12 col-lg-10 mx-auto my-5" style="height: 20px">
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