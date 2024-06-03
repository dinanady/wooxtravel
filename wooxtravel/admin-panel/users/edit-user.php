<?php
require_once "../layout/header.php";
require_once __DIR__ . "/../../config/session_config.php";
require_once __DIR__ . "/../../Model/Person.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $person = new Person("", "", "", "");
    $user = $person->getUserByID($id);
} else {
    header("location: users.php");
    exit();
}

$error = isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
unset($_SESSION["errors"]);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit User</h5>
                    <form method="POST" action="../crud_admin/update_user.php?id=<?php echo $user['id']; ?>">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" value="<?php echo $user['email']; ?>" />
                            <?php if (!empty($error["Email_empty"])) : ?>
                                <span class="text-danger"><?php echo $error["Email_empty"]; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($error["Email_invalid"])) : ?>
                                <span class="text-danger"><?php echo $error["Email_invalid"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" value="<?php echo $user['name']; ?>" />
                            <?php if (!empty($error["Empty_user"])) : ?>
                                <span class="text-danger"><?php echo $error["Empty_user"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" value="" />
                            <?php if (!empty($error["Password_empty"])) : ?>
                                <span class="text-danger"><?php echo $error["Password_empty"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Role select input -->
                        <div class="form-outline mb-4">
                            <select name="role" id="roleSelect" class="form-control">
                                <option value="user" <?php if ($user['role'] == 'user') echo 'selected'; ?>>User</option>
                                <option value="admin" <?php if ($user['role'] == 'admin') echo 'selected'; ?>>Admin</option>
                            </select>
                            <?php if (!empty($error["role_empty"])) : ?>
                                <span class="text-danger"><?php echo $error["role_empty"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    // You can add any JavaScript or jQuery here if needed
</script>
</body>
</html>
