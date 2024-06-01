<?php
require_once "../layout/header.php";
require_once __DIR__ . "/../../config/session_config.php";
require_once __DIR__ . "/../../Model/country.php";
require_once __DIR__ . "/../../Model/city.php";

$countries = new country("", "", "", "", "", "");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $country = $countries->getcountryByID($id);
    if (!$country) {
        // Redirect if the country is not found
        header("location:show-country.php");
        exit();
    }
} else {
    header("location:show-country.php");
    exit();
}
?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit Country</h5>
                    <?php
                    if (isset($_SESSION['error_country'])) {
                        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_country'] . "</div>";
                        unset($_SESSION['error_country']);
                    }
                    ?>
                    <form method="POST" action="../crud_admin/update_country.php?id=<?php echo $country['id']; ?>" enctype="multipart/form-data">
                        <!-- Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" value="<?php echo htmlspecialchars($country['name']); ?>" class="form-control" placeholder="Name" required />
                        </div>
                        
                        <!-- Image input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            <!-- Display current image -->
                            <?php if ($country['image']): ?>
                                <img src="../../assets/images/<?php echo htmlspecialchars($country['image']); ?>" alt="Country Image" style="width: 100px; height: auto;"/>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Continent input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="Continent" value="<?php echo htmlspecialchars($country['continent']); ?>" required />
                        </div>
                        
                        <!-- Population input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="population" id="form2Example1" class="form-control" placeholder="Population" value="<?php echo htmlspecialchars($country['population']); ?>" required />
                        </div>

                        <!-- Territory input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="Territory" value="<?php echo htmlspecialchars($country['territory']); ?>" required />
                        </div>
                        
                        <!-- Description textarea -->
                        <div class="form-floating mb-4 mt-4">
                            <textarea name="description" class="form-control" placeholder="Description" id="floatingTextarea2" style="height: 100px" required><?php echo htmlspecialchars($country['description']); ?></textarea>
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
// Add any required JavaScript here
</script>
</body>
</html>
