<?php
require_once __DIR__ .("/../../Model/bookings.php");
require_once __DIR__ .("/../../config/session_config.php");

if(isset($_GET['id']) && isset($_GET['status']))
{
 $id=$_GET['id'];
 $status=$_GET['status'];
 $booking = new bookings("", "", "", "", "", "", "", "", ""); 
 $booking->updateBookingStatus($id, $status);
 header("location:../bookings-admins/show-bookings.php");
 exit;
}
else {
    echo " error";
}




