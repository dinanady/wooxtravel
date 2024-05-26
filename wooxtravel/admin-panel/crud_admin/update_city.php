<?php
require_once __DIR__ .("/../../config/session_config.php");
require_once __DIR__ .("/../../Model/country.php");
require_once __DIR__ .("/../../Model/city.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $name = $_POST['name'];
        $trip_days = $_POST['trip_days'];
        $image = $_FILES['image']['name'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $country_id = $_POST['country_id'];
        $error = [];

        // Get existing city data
        $cities = new city("", "", "", "", "", "");
        $existingCity = $cities->getcity($id);

        if (empty($name) || empty($description) || empty($price) || empty($trip_days) || empty($country_id)) {
            $error['create_city_err'] = "One field or more is empty!";
            $_SESSION['error_city'] = $error['create_city_err'];
            header("location:../cities-admins/edit-cities.php?id=$id");
            exit;
        }

        // If image is not provided, keep the old image
        if (empty($image)) {
            $image = $existingCity['image'];
        } else {
            // Validate image extension
            $allowed_extensions = ["jpg", "gif", "png", "jpeg"];
            $end_item = explode(".", $image);
            $lowered_item = strtolower(end($end_item));

            if (!in_array($lowered_item, $allowed_extensions)) {
                $error['image_add'] = "Upload a valid image";
                $_SESSION['error_city'] = $error['image_add'];
                header("location:../cities-admins/edit-cities.php?id=$id");
                exit;
            }

            // Move the uploaded image
            move_uploaded_file($_FILES['image']["tmp_name"], "../../assets/images/" . $image);
        }

        // Check if city name already exists, excluding the current city
        $cityByName = $cities->getcityByName($name);
        if ($cityByName && $cityByName['id'] != $id) {
            $error['city_add'] = "The city already exists";
            $_SESSION['error_city'] = $error['city_add'];
            header("location:../cities-admins/edit-cities.php?id=$id");
            exit;
        }

        // Update the city
        $cities->name = $name;
        $cities->description = $description;
        $cities->image = $image;
        $cities->price = $price;
        $cities->trip_days = $trip_days;
        $cities->country_id = $country_id;

        $cities->updateCity($id);

        header("location:../cities-admins/show-cities.php");
        exit;
    }
}
?>
