<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../Model/payment.php");
if(isset($_GET['id'])){
$booking_id = $_GET['id'];
$payments =new  Payments();
$payment = $payments->getPaymentDetailsByBookingId($booking_id);
}
?>