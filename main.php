<?php
require_once 'config.php';

class Main
{

    private $connection = null;

    public function __construct(){
        ini_set("display_errors", "ON");
        $this->connection = mysqli_connect(DB_HOST, DB_USERNAME, DB_PASSWORD) or die("Error MySql Connection");
        mysqli_select_db($this->connection, DB_NAME) or die("Error Selectiong DB");
        mysqli_query($this->connection, "SET NAMES 'UTF8'");
    }
    public function __destruct(){
        // TODO: Implement __destruct() method.
        mysqli_close($this->connection);
    }

    public function Check_Login($user, $pass){

//        enable or disable user
        $confirm = '';

//        storing pass hash from DB
        $pass_verify = '';

//        $query = "SELECT * FROM users WHERE username='$user' AND password='$pass' ";
        $query = "SELECT * FROM users WHERE username='$user'";
        $res = mysqli_query($this->connection, $query);
        while( $row = $res->fetch_assoc() ) {
            $confirm = $row['confirmation'];
            $pass_verify = $row['password'];
        }
//        return $res->num_rows;
        if( $res>'0' and password_verify($pass, $pass_verify) )     //user and pass founded
            if( $confirm=='1' )                                     //user and pass founded and user has been enabled
                return 1;
            else
                return 0;                                           //user and pass founded and user has been disabled
        else
            return -1;                                              //user or pass not founded

//        if( $res>'0' and $confirm=='1')
//            return 1;
//        else if( $res>'0' and $confirm=='0')
//            return 0;
//        else
//            return -1;

//        OR
//        $get = this->$this->connection->query($query);
//        if( $row=$get->fetch_assoc()>1){
//            $_SESSION['email'] = $email;
//            header('location:dashboard.php');
//        }
//        else
//            echo "login failed";
    }

    public function Check_User_Repeat($user){
        $query = "SELECT * FROM users WHERE username='$user'";
        $res = mysqli_query($this->connection, $query);
        return $res->num_rows;
    }

    public function Register($firstName, $lastName, $username, $password, $email){
        $confirmation = '0';
        $date = date('Y-m-d');
        $token = $this->tokenGenerator($username);
        $id = $this->idGenerator();

        // Set the "cost" parameter to 12
        $options = ['cost' => 12];
        $password = password_hash($password, PASSWORD_BCRYPT, $options);

        if($this->Check_User_Repeat($username) == 0) {
            $query = "INSERT INTO users (userId, token, confirmation, fname, lname, email, username, password, registerDate) 
                      VALUES('$id', '$token', '$confirmation', '$firstName', '$lastName', '$email', '$username', '$password', '$date') ";

            mysqli_query($this->connection, $query) or die("error in insert");
            return 1;               //Register Successfully...
        }
        else {
            return 0;               //Repeated Username!
        }
    }

    public function showRows(){
        $query = "SELECT * FROM users";
        $result = mysqli_query($this->connection, $query);
        return $result;
    }

    public function safeString($str){
//        The htmlentities() function converts characters to HTML entities.
        $str = htmlentities($str, ENT_QUOTES,'UTF-8');

//        The addslashes() function returns a string with backslashes in front of predefined characters.
    //    single quote (')
    //    double quote (")
    //    backslash (\)
    //    NULL
        $str = addslashes($str);

//        The htmlspecialchars() function converts some predefined characters to HTML entities.
    //    & (ampersand) becomes &amp;
    //    " (double quote) becomes &quot;
    //    ' (single quote) becomes &#039;
    //    < (less than) becomes &lt;
    //    > (greater than) becomes &gt;

        $str = htmlspecialchars($str);

//        The trim() function removes whitespace and other predefined characters from both sides of a string.
        $str = trim($str);

//        this function escapes special characters in a string for use in an SQL query, taking into account the
//        current character set of the connection. Characters encoded are NUL (ASCII 0), \n, \r, \, ', ", and Control-Z.
        $str = mysqli_real_escape_string($this->connection, $str);
        return $str;
    }

    public function idGenerator()
    {
        while (1) {         //for generating unique id
            $randomId = 'user' . rand(10000, 99999);
            $query = "SELECT * FROM users WHERE userId='$randomId'";
            $res = mysqli_query($this->connection, $query);
            if ($res->num_rows == 0) {
                return $randomId;
            }
        }
    }

    public function tokenGenerator($str){
        return strrev( md5( uniqid(true).$str.uniqid(true) ) );
    }

    public function search($value){
        $value = strtolower($value);
        $query = "SELECT * FROM users WHERE userId LIKE '%$value%' OR fname LIKE '%$value%' OR lname LIKE '%$value%' OR
                  email LIKE '%$value%' OR username LIKE '%$value%' OR registerDate LIKE '%$value%'";
        $res = mysqli_query($this->connection, $query);

        return $res;
    }

    public function searchUsersState($value){
        if( $value == 'all')
            $query = "SELECT * FROM users";
        else if( $value == 'active')
            $query = "SELECT * FROM users WHERE confirmation='1'";

        $res = mysqli_query($this->connection, $query);
        return $res;
    }

    public function sendVerificationMail($mail, $username, $password){
        $to = $mail;
        $hash = '';
        $subject = 'Register | Verification';
        $message = '
                Thanks for Registering!
                Your account has been created, you can login with the following credentials after you have activated 
                your account by pressing the url below.
                  
                ------------------------
                Username: '.$username.'
                Password: '.$password.'
                ------------------------
                  
                Please click this link to activate your account:
                http://www.yourwebsite.com/verify.php?email='.$mail.'&hash='.$hash.'
      
        ';
    }
}