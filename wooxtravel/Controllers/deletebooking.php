<?php
require_once "../config/session_config.php";

require_once __DIR__ .("/../Model/bookings.php");

if(isset($_SESSION['id'])){

    $user_id = $_SESSION['id'];

    if(isset($_GET['id'])){
        $booking_id = $_GET['id'];
        $bookings = new bookings("", "", "", "", "", "", "", "", ""); 
        $result=  $bookings->cancleBooking( $booking_id,$user_id);
      if ($result) {
        // If the cancellation was successful, redirect to the mybooking page
         header("Location: ../mybooking.php");
        exit;
    } else {
        echo "Failed to cancel the booking. Please try again.";
    }
} else {
    echo "Invalid booking ID.";
}
} else {
echo "User not logged in.";
}
        
    

