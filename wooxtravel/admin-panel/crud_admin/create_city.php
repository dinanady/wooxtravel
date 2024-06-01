<?php
require_once __DIR__ .("/../../Model/city.php");
require_once __DIR__ .("/../../config/session_config.php");

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $name = $_POST['name'];
    $trip_days = $_POST['trip_days'];
    $image = $_FILES['image']['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $country_id = $_POST['country_id'];
    $error = [];

    // Check if any field is empty
    if (empty($name) || empty($description) || empty($price) || empty($trip_days) || empty($image) || empty($country_id)) {
        $error['create_city_err'] = "One or more fields are empty!";
        $_SESSION['error_city'] = $error['create_city_err'];
        header("Location: ../cities-admins/create-cities.php");
        exit;
    }

    // Create city instance
    $cities = new city($name, $description, $image, $price, $trip_days, $country_id);

    // Validate image file type
    $allowed_extensions = ["jpg", "gif", "png", "jpeg"];
    $image_extension = strtolower(pathinfo($image, PATHINFO_EXTENSION));

    // Check if city already exists
    $existing_city = $cities->getcityByName($name);
    if ($existing_city['name']===$name) {
        $error['city_add'] = "The city already exists!";
        $_SESSION['error_city'] = $error['city_add'];
        header("Location: ../cities-admins/create-cities.php");
        exit;
    }

    // Validate and move uploaded file
    if (in_array($image_extension, $allowed_extensions)) {
        $upload_path = "../../assets/images/" . basename($image);
        if (move_uploaded_file($_FILES['image']['tmp_name'], $upload_path)) {
            // Add city to database
            $createdCity = $cities->addcity();
            header("Location: ../cities-admins/show-cities.php");
            exit;
        } else {
            $error['image_add'] = "Failed to upload image!";
            $_SESSION['error_city'] = $error['image_add'];
            header("Location: ../cities-admins/create-cities.php");
            exit;
        }
    } else {
        $error['image_add'] = "Upload a valid image!";
        $_SESSION['error_city'] = $error['image_add'];
        header("Location: ../cities-admins/create-cities.php");
        exit;
    }
}
?>
