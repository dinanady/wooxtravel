<?php
require_once ("config.php");
class register {

    public $username;
    public $email;
    public $password;

    public function __construct($username,$email,$password){
        
        $this->username=$username;
        $this->email=$email;
        $this->password=$password;
       
    }
    public function createUser(){
        global $connection;
        $sql = "INSERT INTO users(name, email, password) VALUES (?, ?, ?)";
        $stm = $connection->prepare($sql);
        $stm->bindParam(1, $this->username);
        $stm->bindParam(2, $this->email);
        $stm->bindParam(3, $this->password);
        $stm->execute();
    }
    
}

?>
