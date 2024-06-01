<?php
require_once "../../config/session_config.php";
require_once __DIR__ . "/../../Model/Person.php";

$error = [];

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $role = $_POST["role"];
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Validation
    if (empty($username)) {
        $error["Empty_user"] = "Name is required";
    }
    if (empty($email)) {
        $error["Email_empty"] = "Email is required";
    }
    if (empty($password)) {
        $error["Password_empty"] = "Password is required";
    }
    if (empty($role)) {
        $error["role_empty"] = "Role is required";
    }

    if (empty($error)) {
        try {
            $person = new Person($username, $email, $hashedPassword, $role);
            if (check_email($email)) {
                if (!repeate_Email($email)) {
                    $person->createUser();
                    header("location: ../users/users.php");
                    exit();
                } else {
                    $error["Email_taken"] = "Email is already taken";
                }
            } else {
                $error["Email_invalid"] = "Email is invalid";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    $_SESSION["errors"] = $error;
    header("location: ../users/create-users.php");
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
