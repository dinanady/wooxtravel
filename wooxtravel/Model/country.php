<?php
require_once __DIR__ .  ("../../config/config.php");
   class country{
    public $name;
    public $description;
    public $image;
    public $population;
    public $territory;
    public $continent;
    

public function __construct($name,$description,$image,$population,$territory,$continent){
$this->name =$name;
$this->description =$description;
$this->image =$image;
$this->population =$population;
$this->territory =$territory;
$this->continent =$continent;
}

public function addcountry(){
    global $connection;
    $sql="INSERT INTO countries(name,description,image,population,territory,continent) VALUES(?,?,?,?,?,?)";
    $stmt =$connection->prepare($sql);
    $stmt->bindParam(1,$this->name);
    $stmt->bindParam(2,$this->description);
    $stmt->bindParam(3,$this->image);
    $stmt->bindParam(4,$this->population);
    $stmt->bindParam(5,$this->territory);
    $stmt->bindParam(6,$this->continent);
   
   
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
 public function allcountries(){
    global $connection;
    $sql = "SELECT * FROM countries";
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


public function deleteCountry($country_id){
    global $connection;
    $sql = "DELETE FROM countries WHERE id = :id ";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(":id",$country_id);
   
    $result = $stmt->execute();
          return $result;

}
public function getcountryByName($name){
    global $connection;
    $sql = "SELECT * FROM countries WHERE name =:name";
    $stmt=$connection->prepare($sql);
    $stmt->bindParam(":name",$name);
    $stmt->execute();
    $result =$stmt->fetch(PDO::FETCH_ASSOC);
    return $result; 
}
public function getCitiesInCountry($id)
{
    global $connection;
    $sql = "SELECT city.id AS id, city.image AS image, city.price AS price, city.name AS name, COUNT(book.city_id) AS num_check, city.trip_days AS trip_days
    FROM cites city
    LEFT JOIN booking book ON city.id = book.city_id
    WHERE city.cont_id = :id
    GROUP BY city.id;";
    $stm = $connection->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    $result = $stm->fetchAll(PDO::FETCH_ASSOC);
    return $result;
}
 
public function getnumofCitiesInCountry($id)
{
    global $connection;
    $sql = "SELECT  count(id) as numOfCity from cites Where cont_id =:id";
    $stm = $connection->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['numOfCity'];
}

public function getnumofAllcheckin($id)
{
    global $connection;
    $sql = "SELECT  count(book.city_id) as checkin from cites city join booking book on 
    city.id = book.city_id  Where city.cont_id =:id";
    $stm = $connection->prepare($sql);
    $stm->bindParam(":id", $id);
    $stm->execute();
    $result = $stm->fetch(PDO::FETCH_ASSOC);
    return $result['checkin'];
}


public function search($id, $price){
    global $connection;
    $sql = "SELECT * from cites WHERE cont_id= :id and price <=:price";
    $stm = $connection->prepare($sql);
    $stm->bindParam(":id",$id);
    $stm->bindParam(":price",$price);
    $stm->execute();
    $result = $stm->fetchALL(PDO::FETCH_ASSOC);
    return $result;
}
public function updateCountry($id) {
    global $connection;
    $sql = "UPDATE countries SET name = ?, description = ?, image = ?, population = ?, territory = ?, continent = ? WHERE id = ?";
    $stmt = $connection->prepare($sql);
    $stmt->bindParam(1, $this->name);
    $stmt->bindParam(2, $this->description);
    $stmt->bindParam(3, $this->image);
    $stmt->bindParam(4, $this->population);
    $stmt->bindParam(5, $this->territory);
    $stmt->bindParam(6, $this->continent);
    $stmt->bindParam(7, $id);
    $stmt->execute();
}


public function numderOfCountries(){
    global $connection;
    $sql= "SELECT count(id) as number_Of_Countries FROM countries";
    $stmt = $connection->prepare($sql);
    $stmt->execute();
    $result=$stmt->fetch(PDO::FETCH_ASSOC);
    return $result['number_Of_Countries'];
    
  }

}
