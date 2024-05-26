<?php
require_once __DIR__ .  ("/../config/config.php");
class Person {

    public $username;
    public $email;
    public $password;
    public $role= 'user';

    public function __construct($username,$email,$password,$role){
        
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
        $this->role=$role;
    }
    public function createUser(){
        global $connection;
        $sql = "INSERT INTO users(name, email, password,role) VALUES (?, ?, ?,'user')";
        $stm = $connection->prepare($sql);
        $stm->bindParam(1, $this->username);
        $stm->bindParam(2, $this->email);
        $stm->bindParam(3, $this->password);
        $stm->execute();
    }

    public function getuserByEmail($email){
        global $connection;
        $sql = "SELECT email FROM users WHERE email = :email";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 
    }

    public function Login($email,$password){
        global $connection;
        $sql = "SELECT * FROM users WHERE email=? and password =? ";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result; 

    }
    public function getAllUsers(){
        global $connection;
        $sql = "SELECT * FROM users ";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchALL(PDO::FETCH_ASSOC);
        return $result; 
    }
  
    public function deleteUser($user_id){
        global $connection;
        $sql = "DELETE FROM users WHERE id = :id ";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":id",$user_id);
       
        $result = $stmt->execute();
              return $result;
    
    }

    public function numderOfUsers(){
        global $connection;
        $sql= "SELECT count(id) as number_Of_users FROM users";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result=$stmt->fetch(PDO::FETCH_ASSOC);
        return $result['number_Of_users'];
        
      }
    
}

?>
