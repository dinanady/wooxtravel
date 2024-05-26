<?php
require_once __DIR__ . "/../Model/bookings.php";
require_once __DIR__ . "/../Model/payment.php";

$bookings = new bookings("", "", "", "", "", "", "", "", ""); 
$payments = new payments(); 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);

    $booking_id = $data['booking_id'];
    $order_id = $data['order_id'];
    $payer_id = $data['payer_id'];
    $payment_amount = $data['payment_amount'];
    $currency = $data['currency'];
    $payment_time = $data['payment_time'];

    // Update the booking status to 'paid'
    $result = $bookings->updateBookingStatus($booking_id, 'paid');

    // Create a new payment record
    $payment_result = $payments->createPayment($booking_id, $order_id, $payer_id, $payment_amount, $currency, $payment_time);

    if ($result && $payment_result) {
        echo json_encode(['status' => 'success']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed']);
    }
    }
    