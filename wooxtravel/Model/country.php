<?php
require_once __DIR__ .  ("../../config/config.php");
   class country{
    public $name;
    public $description;
    public $image;
    public $population;
    public $territory;
    

public function __construct($name,$description,$image,$population,$territory){
$this->name =$name;
$this->description =$description;
$this->image =$image;
$this->population =$population;
$this->territory =$territory;
}

public function addcountry(){
    global $connection;
    $sql="INSERT INTO counties(name,description,population,territory,image) VALUES(?,?,?,?,?)";
    $stmt =$connection->prepare($sql);
    $stmt->bindParam(1,$this->name);
    $stmt->bindParam(2,$this->description);
    $stmt->bindParam(3,$this->population);
    $stmt->bindParam(4,$this->territory);
    $stmt->bindParam(5,$this->image);
    $stmt->execute();
}
public function getCountries(){
    global $connection;
    $sql= "SELECT cout.id as id ,cout.continent  as continent  ,cout.name as name ,cout.image As image ,cout.population as population ,
    cout.territory As territory, cout.description as description ,
    AVG(city.price) As AVG_Price from countries cout JOIN 
    cites city on cout.id = city.cont_id GROUP BY cout.id;";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return  $result;
}

public function getcountryByID($id){
    global $connection;
    $sql = "SELECT * FROM countries WHERE id =:id";
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(":id",$id);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}




}