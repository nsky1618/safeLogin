<?php
    require_once "main.php";

    $user = $pass = $message = '';
    $ma = new Main();

    if (isset($_POST['username']))
        $user = $ma->safeString($_POST['username']);
    if (isset($_POST['password']))
        $pass = $ma->safeString($_POST['password']);

    if ($user == '') {
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter User Name...!</div>';
        $status = 0;
    }
    elseif ($pass == '') {
        $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Please Enter Password...!</div>';
        $status = 0;
    }
    else {
        if ($ma->Check_Login($user, $pass) == 1) {
            session_start();

            $_SESSION['id'] = strrev( sha1( md5($user) ) ) ;
            setcookie("User", $user, time() + (3600), null, null, null, true);;  //for no https
//            setcookie("User", $user, time() + (3600), null, null, true, true);

              $message = 'OK';
              $status = '1';

        }
        elseif ($ma->Check_Login($user, $pass) == 0) {
            $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Login Failed<br>
                            Your account is disabled!!! Contact with Administrator.
                            </div>';
            $status = 0;
        }
        else {
            $message = '<div class="alert alert-danger text-center" style="color: #ff002a">Wrong Username Or Password !!!<br>
                            If you are not a member, go to "Register" page or
                            If you have been forgotten your password go to "Forgot password" page.<br>
                         </div>';
            $status = 0;
        }
    }

    //return result
    echo json_encode(
        array(
           "status" => $status,
            "message" => $message,
        )
    );
