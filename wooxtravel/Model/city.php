<?php
require_once __DIR__ .  ("/../config/config.php");
   class city{
    public $name;
    public $description;
    public $image;
    public $price;
    public $trip_days;
    public $country_id;

public function __construct($name,$description,$image,$price,$trip_days,$country_id){
$this->name =$name;
$this->description =$description;
$this->price=$price;
$this->trip_days =$trip_days;
$this->country_id=$country_id;
}

public function addcountry(){
    global $connection;
    $sql="INSERT INTO counties(name,description,image,price,trip_days,cont_id) VALUES(?,?,?,?,?,?)";
    $stmt =$connection->prepare($sql);
    $stmt->bindParam(1,$this->name);
    $stmt->bindParam(2,$this->description);
    $stmt->bindParam(3,$this->image);
    $stmt->bindParam(4,$this->price);
    $stmt->bindParam(5,$this->trip_days);
    $stmt->bindParam(6,$this->cont_id);
    $stmt->execute();
}
public function getAllCities(){
    global $connection;
    $sql= "SELECT country.name as nameofcountry, city.name as nameofcity , country.id as Count_id ,city.id as city_id  
    FROM countries country JOIN cites city
    on country.id=city.cont_id";
    $stmt=$connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
    return  $result;

}



}