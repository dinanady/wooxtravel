<?php
require_once "../config/session_config.php";

require_once __DIR__ .("/../Model/bookings.php");

require_once __DIR__ .("/../Model/city.php");


if($_SERVER['REQUEST_METHOD']==="POST"){
    $username = $_POST['username'];
    $phone = $_POST['phone'];
    $Guests = $_POST['Guests'];
    $date   = $_POST['checkdate'];
    $city_id =$_POST["destination"];
    if(isset( $_SESSION["id"])){
    if(empty($username)||empty( $phone)||empty($Guests)||empty($date)||empty( $city_id)){

        $_SESSION['empty_reservation']= "one or more fields are empty";
        header("location: ../reservation.php");
        exit;
    }

    else{
        if(date("Y-m-d") < $date  ){
    $city = new city("","","","","","");
    $destination = $city->getcity($city_id);
    $payment =  $Guests *  $destination['price'];
    $_SESSION['payment'] =$payment;
    $user_id = $_SESSION["id"];
    $reservation = new bookings($username, $phone,$Guests,$date ,$destination['name'],$user_id,"pending",$city_id,$payment);
    $reservation->createreservation();

    
    header("location: ../mybooking.php");
    exit;
        }
        else {
           echo "<script>alert('the date must be income ') </script>";  
           header("location: ../reservation.php");
           exit;
        }

    }
    }
    else{
 
        header("location: ../auth/login.php");
        exit;

    }
}
