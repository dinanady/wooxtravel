<?php
require_once __DIR__ .  ("../../config/config.php");
class Payments {

   

    public function createPayment($booking_id, $order_id, $payer_id, $payment_amount, $currency, $payment_time) {
        global $connection;
        $sql = "INSERT INTO payments (booking_id, order_id, payer_id, payment_amount, currency, payment_time, status) VALUES (?, ?, ?, ?, ?, ?, 'completed')";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $booking_id);
        $stmt->bindParam(2, $order_id);
        $stmt->bindParam(3, $payer_id);
        $stmt->bindParam(4, $payment_amount);
        $stmt->bindParam(5, $currency);
        $stmt->bindParam(6, $payment_time);
       
        return $stmt->execute();
    }
    
    public function getPaymentDetailsByBookingId($booking_id) {
        global $connection;
        $sql = "SELECT * FROM payments WHERE booking_id = :booking_id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":booking_id", $booking_id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}