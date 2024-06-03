<?php
require_once "../../config/session_config.php";
require_once __DIR__ . "/../../Model/Person.php";

$error = [];

if (isset($_POST["submit"])) {
    $id = $_GET["id"];
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];

    // Validation
    if (empty($username)) {
        $error["Empty_user"] = "Name is required";
    }
    if (empty($email)) {
        $error["Email_empty"] = "Email is required";
    }
    if (empty($role)) {
        $error["role_empty"] = "Role is required";
    }

    // Check for valid email format
    if (!empty($email) && !check_email($email)) {
        $error["Email_invalid"] = "Email is invalid";
    }

    if (empty($error)) {
        try {
            $person = new Person($username, $email, $password, $role);
            
            // Fetch current user's email
            $currentUser = $person->getUserByID($id);
            
            // Check if the email is already taken by another user
            if ($email != $currentUser['email'] && repeate_Email($email)) {
                $error["Email_taken"] = "Email is already taken";
            } else {
                // Update the user
                $person->updateUser($id, $username, $email, $password, $role);
                header("location: ../users/users.php");
                exit();
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    $_SESSION["errors"] = $error;
    header("location: ../users/edit-user.php?id=$id");
    exit();
}

function check_email($email) {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

function repeate_Email($email) {
    $person = new Person("", $email, "", "");
    return $person->getuserByEmail($email) ? true : false;
}
?>
