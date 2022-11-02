<?php
include_once ('database.php');
session_start();

if(isset($_POST['signup-btn'])) processSignUp();
if(isset($_POST['signin-btn'])) processLogin();

function checkValidity($fname ,$sname, $_email,$_pwd){
    if(empty($fname) || empty($sname) || empty($_email) || empty($_pwd)){
        return false;
    }else if(!filter_var( $_email,FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z ]*$/",$fname) ||
        !preg_match("/^[a-zA-Z ]*$/",$sname) || !preg_match("/^[a-z0-9 .\-]+$/i",$_pwd)){
        return false;
    }else{
        return true;
    }
}
function checkRecords($email , $pwd){
    global $connection;
    $query = "SELECT * FROM users WHERE Emails ='$email' AND Passwords='$pwd';";
    $rstOfExecution = mysqli_query($connection,$query);
    return $rstOfExecution;
}
function saveRecords($f ,$s ,$em,$pwd){
    global $connection;
    $query = "INSERT INTO `users` (`FirstNames`, `SecondNames`, `Emails`, `Passwords`) VALUES ('$f','$s','$em','$pwd');";
    $restOfExec = mysqli_query($connection,$query);
    return $restOfExec;
}
function alredyExist($email){
    global $connection;
    $q = "SELECT * FROM users WHERE Emails ='$email'";
    $rstEx = mysqli_query($connection,$q);
    return $rstEx;
}

function processSignUp(){
    $f_name =$_POST['f_name']; //Strip tags and HTML-encode double and single quotes, optionally strip or encode special characters.
    $s_name =$_POST['s_name'];
    $email =$_POST['email'];//Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].
    $pwd = $_POST['pwd'];

    if(checkValidity($f_name,$s_name,$email,$pwd)){
        //header("location :index.php");

        if(!saveRecords($f_name,$s_name,$email,$pwd)){
            $_SESSION['err-form']="An errr accurated try later !";
            echo '<script>window.location.replace("signup.php")</script>';
        }else{
            unset($_SESSION['register-info']);
            echo '<script>window.location.replace("login.php")</script>';
        }

    }elseif (alredyExist($email)){
        $_SESSION['err-form']="It seems you have already registered , try to login instead !";
        $_SESSION['register-info'] = array($f_name,$s_name,$email,$pwd);
        echo '<script>window.location.replace("signup.php")</script>';
    }
    else{
        $_SESSION['err-form']="Please fill fields with valid data";
        $_SESSION['register-info'] = array($f_name,$s_name,$email,$pwd);
        //header('location :signup.php');
        echo '<script>window.location.replace("signup.php")</script>';
    }
}
function processLogin(){
    $email =$_POST['email'];//Remove all characters except letters, digits and !#$%&'*+-=?^_`{|}~@.[].
    $pwd = $_POST['pwd'];
    if(checkRecords($email,$pwd)){
        $row =mysqli_fetch_row(checkRecords($email,$pwd));
        $username =  $row[2]." ".$row[1] ;
        $_SESSION['username'] = $username ;
            echo '<script>window.location.replace("index.php")</script>';

    }else{
        $_SESSION['register-info'] = array($email,$pwd);
        $_SESSION["no-such-record"]="email or password does not match with our record !";
        echo '<script>window.location.replace("login.php")</script>';

    }

}