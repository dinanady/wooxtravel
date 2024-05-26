<?php
require_once "../../config/session_config.php";
require_once __DIR__ .("../../../Model/city.php");

    if(isset($_GET['id'])){
        $city_id = $_GET['id'];
        $city = new city( "","" , "", "","","");
        $result= $city->deletecity($city_id);
      if ($result) {
        // If the cancellation was successful, redirect to the mybooking page
        
        header("location:../cities-admins/show-cities.php");
        exit;
    } else {
        echo "Failed to delete the city. Please try again.";
    }
} else {
    echo "Invalid city ID.";
}

        
    

