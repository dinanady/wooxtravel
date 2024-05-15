<?php
require_once "../config/session_config.php";
require_once "../config/config.php";
require_once "../Model/Person.php";

if($_SERVER['REQUEST_METHOD']=='POST'){
$email = $_POST['email'];
$password =$_POST['password'];
$person = new person("",$email,$password);
 
try{
    $hashpassword =sha1($password);
    $data = $person->login($email, $hashpassword);
    
    if($data){
        $_SESSION["error_login"]="";
        $_SESSION["Email"]=$email;
        header("location: ../index.php ");
        exit;

    }
    else{
        $_SESSION["error_login"]="Invailed password or Email ";
        header("location: ../auth/login.php");
        exit;
    }
}
catch(Exception $e)
    {
        echo $e->getMessage();
    }

}






?>