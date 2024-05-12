<?php
require_once "../config/session_config.php";
require_once "../config/config.php";
require_once "../Model/Person.php";


$error=[];
if(isset($_POST["submit"])){
  $username= $_POST["username"];
  $email =$_POST['email'];
  $password =$_POST["password"];
  $hahpasswd =sha1($password);
 if(empty($username)||empty($email)||empty($password)){
    
 if(empty($username)){
  $error["Empty_user"] = " Name is required";
 }
 if(empty($email)){
    $error["Email_empty"] ="Email is required";

 }

 if(empty($password)){
    $error["Password_empty"] ="Password is required";

 } 
 header("location: ../auth/register.php");
 
   }
   
   else{

    try{
      $person=new Person($username,$email,$hahpasswd);
      if(check_email($email)){
        if(!repeate_Email($email)){
        $person->createUser();
        $_SESSION["user"]=$username;
        $_SESSION["user_email"]=$email;
       header("location: ../auth/login.php");

        }
        else{
            $error["Email_taked"] ="Email is already taken";
            header("location: ../auth/register.php");
        }
    }else{
        $error["Email_invalid"] ="Email is invalid";
        header("location: ../auth/register.php");
    }
    
} 
    
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    
   }

   $_SESSION["errors"] = $error;

}
function check_email($email){
    if(filter_var($email, FILTER_VALIDATE_EMAIL)){
        return true;
    } else {
        return false;
    }
}


 function repeate_Email($email){
 $person =new Person("",$email,"");
 if($person->getuserByEmail($email)){
 return true ;
 }
  else{
    return false;
  }  
 }
 