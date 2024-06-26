<?php
require_once "../layout/header.php";
require_once __DIR__ . "/../../config/session_config.php";

$error = isset($_SESSION["errors"]) ? $_SESSION["errors"] : [];
unset($_SESSION["errors"]);
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Create User</h5>
                    <form method="POST" action="../crud_admin/create-user.php">
                        <!-- Email input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="email" name="email" id="form2Example1" class="form-control" placeholder="Email" />
                            <?php if (!empty($error["Email_empty"])) : ?>
                                <span class="text-danger"><?php echo $error["Email_empty"]; ?></span>
                            <?php endif; ?>
                            <?php if (!empty($error["Email_invalid"])) : ?>
                                <span class="text-danger"><?php echo $error["Email_invalid"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Username input -->
                        <div class="form-outline mb-4">
                            <input type="text" name="username" id="form2Example1" class="form-control" placeholder="Username" />
                            <?php if (!empty($error["Empty_user"])) : ?>
                                <span class="text-danger"><?php echo $error["Empty_user"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Password input -->
                        <div class="form-outline mb-4">
                            <input type="password" name="password" id="form2Example1" class="form-control" placeholder="Password" />
                            <?php if (!empty($error["Password_empty"])) : ?>
                                <span class="text-danger"><?php echo $error["Password_empty"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Role select input -->
                        <div class="form-outline mb-4">
                            <select name="role" id="roleSelect" class="form-control">
                                <option value="user">User</option>
                                <option value="admin">Admin</option>
                            </select>
                            <?php if (!empty($error["role_empty"])) : ?>
                                <span class="text-danger"><?php echo $error["role_empty"]; ?></span>
                            <?php endif; ?>
                        </div>

                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Create</button>
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
