<?php
require_once "../config/session_config.php";

require_once __DIR__ .("/../Model/Person.php");


$error=[];
if(isset($_POST["submit"])){
  $username= $_POST["username"];
  $email =$_POST['email'];
  $password =$_POST["password"];
  $hahpasswd =sha1($password);
  $role = $_POST["role"];
 if(empty($username)||empty($email)||empty($password)||empty($role)){
  
 if(empty($username)){
  $error["Empty_user"] = " Name is required";
 }
 if(empty($email)){
    $error["Email_empty"] ="Email is required";

 }

 if(empty($password)){
    $error["Password_empty"] ="Password is required";

 } 

 if(empty($role)){
    $error["role_empty"] ="Role is required";

 }
 if($_SESSION['role']!="admin") {
 header("location: ../auth/register.php");}
 else {
    header("location: ../admin-panel/users/create-user.php");

 }
   }
   
   else{

    try{
      $person=new Person($username,$email,$hahpasswd,"");
      if(check_email($email)){
        if(!repeate_Email($email)){
        $person->createUser();
       
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
 $person =new Person("",$email,"","");
 if($person->getuserByEmail($email)){
 return true ;
 }
  else{
    return false;
  }  
 }
 