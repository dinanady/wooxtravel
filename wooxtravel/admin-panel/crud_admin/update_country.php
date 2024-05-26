<?php
require_once __DIR__ .("/../../config/session_config.php");
require_once __DIR__ .("/../../Model/country.php");


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $image= $_FILES['image']['name'] ;
        $description =$_POST['description'];
        $population =$_POST['population'];
        $territory =$_POST['territory'];
        $continent =$_POST['continent'];
        $error = [];

        // Get existing city data
        $country = new country("", "", "", "", "", "");
        $existingCountry =  $country->getcountryByID($id);

        if (empty($name) || empty($description) || empty($continent) || empty($population) || empty($territory)) {
            $error['create_city_err'] = "One field or more is empty!";
            $_SESSION['error_country'] = $error['create_city_err'];
            header("location:../countries-admins/edit-country.php?id=$id");
            exit;
        }

        // If image is not provided, keep the old image
        if (empty($image)) {
            $image = $existingCountry['image'];
        } else {
            // Validate image extension
            $allowed_extensions = ["jpg", "gif", "png", "jpeg"];
            $end_item = explode(".", $image);
            $lowered_item = strtolower(end($end_item));

            if (!in_array($lowered_item, $allowed_extensions)) {
                $error['image_add'] = "Upload a valid image";
                $_SESSION['error_city'] = $error['image_add'];
                header("location:../countries-admins/edit-country.php?id=$id");
                exit;
            }

            // Move the uploaded image
            move_uploaded_file($_FILES['image']["tmp_name"], "../../assets/images/" . $image);
        }

        // Check if city name already exists, excluding the current city
        $countrybyName = $country->getcountryByName($name);
      
        if ( $countrybyName && $countrybyName ['id'] != $id) {
            $error['city_add'] = "The city already exists";
            $_SESSION['error_country'] = $error['city_add'];
            header("location:../countries-admins/edit-country.php?id=$id");
            exit;
        }

        // Update the city
        $country->name = $name;
        $country->description = $description;
        $country->image = $image;
       
        $country->population = $population;
        $country->territory = $territory;
        $country->continent = $continent;
        $country->updateCountry($id) ;

        header("location:../countries-admins/show-country.php");
        exit;
    }
}
?>
