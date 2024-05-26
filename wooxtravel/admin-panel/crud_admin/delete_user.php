<?php
require_once "../../config/session_config.php";
require_once __DIR__ .("../../../Model/Person.php");

    if(isset($_GET['id'])){
        $user_id = $_GET['id'];
        $user = new Person( "","" , "", "");
        $result= $user->deleteUser($user_id);
      if ($result) {
        // If the cancellation was successful, redirect to the mybooking page
        
        header("location:../users/users.php");
        exit;
    } else {
        echo "Failed to delete user. Please try again.";
    }
} else {
    echo "Invalid user ID.";
}

        