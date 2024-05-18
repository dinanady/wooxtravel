<?php
require_once __DIR__ .  ("../../config/config.php");

class bookings{
  public $name;
  public $phone_num;
  public $num_of_guests;
  public $checkIn ;
  public $destination;
  public $user_id;
  public $status = "pending";
  public $city_id;
  public $payment ;
  
public function __construct( $name,$phone_num,$num_of_guests,$checkIn,$destination,$user_id, $status, $city_id,$payment) {

 $this->name = $name;
 $this->phone_num = $phone_num;
 $this->num_of_guests = $num_of_guests;
 $this->checkIn = $checkIn;
 $this->destination =$destination;
 $this->user_id =  $user_id;
 $this->status=$status;
 $this->city_id = $city_id;
 $this->payment = $payment;
}

public function createreservation() {
  global $connection;
  $sql = "INSERT INTO booking(username, phone_num, num_of_guests, checkIn, destination, user_id, status, city_id,payment) 
          VALUES (?, ?, ?, ?, ?, ?, ?, ?,?)";
  $stmt = $connection->prepare($sql);
  $stmt->bindParam(1, $this->name);
  $stmt->bindParam(2, $this->phone_num);
  $stmt->bindParam(3, $this->num_of_guests);
  $stmt->bindParam(4, $this->checkIn);
  $stmt->bindParam(5, $this->destination);
  $stmt->bindParam(6, $this->user_id);
  $stmt->bindParam(7, $this->status);
  $stmt->bindParam(8, $this->city_id);
  $stmt->bindParam(9, $this->payment);
  $stmt->execute();
}


}

