<?php
require_once __DIR__ .  ("/../config/config.php");

class Person {
    public $username;
    public $email;
    public $password;
    public $role = 'user';

    public function __construct($username, $email, $password, $role) {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
        $this->role = $role;
    }

    public function createUser() {
        global $connection;
        $sql = "INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)";
        $stm = $connection->prepare($sql);
        $stm->bindParam(1, $this->username);
        $stm->bindParam(2, $this->email);
        $stm->bindParam(3, $this->password);
        $stm->bindParam(4, $this->role);
        $stm->execute();
    }

    public function getuserByEmail($email) {
        global $connection;
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":email", $email);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function getUserByID($id) {
        global $connection;
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function login($email, $password) {
        global $connection;
        $sql = "SELECT * FROM users WHERE email = ? AND password = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $email);
        $stmt->bindParam(2, $password);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC); 
    }

    public function getAllUsers() {
        global $connection;
        $sql = "SELECT * FROM users";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC); 
    }

    public function deleteUser($user_id) {
        global $connection;
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(":id", $user_id);
        return $stmt->execute();
    }

    public function numberOfUsers() {
        global $connection;
        $sql = "SELECT count(id) as number_Of_users FROM users";
        $stmt = $connection->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['number_Of_users'];
    }

    public function updateUser($id, $username, $email, $password, $role) {
        global $connection;
        $sql = "UPDATE users SET name = ?, email = ?, password = ?, role = ? WHERE id = ?";
        $stmt = $connection->prepare($sql);
        $stmt->bindParam(1, $username);
        $stmt->bindParam(2, $email);
        $stmt->bindParam(3, $password);
        $stmt->bindParam(4, $role);
        $stmt->bindParam(5, $id);
        return $stmt->execute();
    }
}
?>
