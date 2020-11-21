<?php
    session_start();
    require_once "main.php";

    $ma = new Main();

    if( isset($_POST['searchVal'])) {
        $searchValue = $_POST['searchVal'];
        $res = $ma->searchUsersState($searchValue);
    }

    $result = "<table class='table table-responsive table-hover text-center'>";
        $result .= "<tr>";
            $result .= "<th>User ID</th>";
            $result .= "<th>Token</th>";
            $result .= "<th>Confirmation</th>";
            $result .= "<th>First Name</th>";
            $result .= "<th>Last Name</th>";
            $result .= "<th>Email</th>";
            $result .= "<th>Username</th>";
            $result .= "<th>Password</th>";
            $result .= "<th>Register Date</th>";
        $result .= "</tr>";

    while ($row = $res->fetch_assoc() )
    {
        $userId = $row['userId'];
        $token = $row['token'];
        $confirm = $row['confirmation'];
        $firstname = $row['fname'];
        $lastname = $row['lname'];
        $email = $row['email'];
        $username = $row['username'];
        $password = $row['password'];
        $date = $row['registerDate'];

        $result .= "<tr>";
            $result .= "<td>$userId</td>";
            $result .= "<td>$token</td>";
            $result .= "<td>$confirm</td>";
            $result .= "<td>$firstname</td>";
            $result .= "<td>$lastname</td>";
            $result .= "<td>$email</td>";
            $result .= "<td>$username</td>";
            $result .= "<td>$password</td>";
            $result .= "<td>$date</td>";
        $result .= "</tr>";

    }

    echo $result;