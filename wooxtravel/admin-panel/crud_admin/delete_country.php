<?php
require_once "../../config/session_config.php";
require_once __DIR__ .("../../../Model/country.php");

    if(isset($_GET['id'])){
        $country_id = $_GET['id'];
        $country = new country( "","" , "", "","","");
        $result= $country->deleteCountry($country_id);
      if ($result) {
        // If the cancellation was successful, redirect to the mybooking page
        
        header("location:../countries-admins/show-country.php");
        exit;
    } else {
        echo "Failed to cancel the booking. Please try again.";
    }
} else {
    echo "Invalid booking ID.";
}

        
    

