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
$this->image =$image;
$this->price=$price;
$this->trip_days =$trip_days;
$this->country_id=$country_id;
}

public function addcity(){
    global $connection;
    $sql="INSERT INTO cites(name,description,image,price,trip_days,cont_id) VALUES(?,?,?,?,?,?)";
    $stmt =$connection->prepare($sql);
    $stmt->bindParam(1,$this->name);
    $stmt->bindParam(2,$this->description);
    $stmt->bindParam(3,$this->image);
    $stmt->bindParam(4,$this->price);
    $stmt->bindParam(5,$this->trip_days);
    $stmt->bindParam(6,$this->country_id);
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

public function getcity($id){
    global $connection;
    $sql="SELECT * FROM cites WHERE id = :id";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam("id",$id);
    $stmt->execute();
    $result= $stmt->fetch(PDO::FETCH_ASSOC);
    return $result;
}
 
public function getbestprice(){
    global $connection;
    $sql="SELECT * from cites 
    order by price ASC
    LIMIT 4";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result= $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}
public function getcityByName($name){
    global $connection;
    $sql = "SELECT * FROM cites WHERE name =:name";
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(":name",$name);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}

 public function getCities(){

    global $connection;
    $sql="SELECT * from cites ";
    
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result= $stmt->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}

public function deletecity($city_id){
    global $connection;
    $sql = "DELETE FROM cites WHERE id = :id ";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":id",$city_id);
   
    $result = $stmt->execute();
          return $result;
}
public function updateCity($id) {
    global $connection;
    $sql = "UPDATE cites SET name = ?, description = ?, image = ?, price = ?, trip_days = ?, cont_id = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $this->name);
    $stmt->bindParam(2, $this->description);
    $stmt->bindParam(3, $this->image);
    $stmt->bindParam(4, $this->price);
    $stmt->bindParam(5, $this->trip_days);
    $stmt->bindParam(6, $this->country_id);
    $stmt->bindParam(7, $id);
    $stmt->execute();
}

public function numderOfCities(){
    global $connection;
    $sql= "SELECT count(id) as number_Of_cities FROM cites";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result['number_Of_cities'];
    
  }
 }


