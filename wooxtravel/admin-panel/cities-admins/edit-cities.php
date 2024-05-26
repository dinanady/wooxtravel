<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../config/session_config.php");
require_once __DIR__ .("/../../Model/country.php");
require_once __DIR__ .("/../../Model/city.php");

$cities = new city("", "", "", "", "", "");
$countries = new country("", "", "", "", "","");
$allcountries = $countries->allcountries();

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $city = $cities->getcity($id);
} else {
    header("location:show-cities.php");
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit City</h5>
                    <?php
                    if (isset($_SESSION['error_city'])) {
                        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_city'] . "</div>";
                        unset($_SESSION['error_city']);
                    }
                    ?>
                    <form method="POST" action="../crud_admin/update_city.php?id=<?php echo $city['id']?>" enctype="multipart/form-data">
                        <!-- Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" value="<?php echo $city['name']?>" class="form-control" placeholder="name" />
                        </div>
                        
                        <!-- Image input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            <!-- Display current image -->
                            <?php if ($city['image']): ?>
                                <img src="../../assets/images/<?php echo $city['image']; ?>" alt="City Image" style="width: 100px; height: auto;"/>
                            <?php endif; ?>
                        </div>
                        
                        <!-- Trip Days input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="trip_days" id="form2Example1" class="form-control" placeholder="trip_days" value="<?php echo $city['trip_days']?>" />
                        </div>
                        
                        <!-- Price input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" value="<?php echo $city['price']?>" />
                        </div>
                        
                        <!-- Country select -->
                        <div class="form-outline mb-4 mt-4">
                            <select name="country_id" class="form-select form-control" aria-label="Default select example">
                                <option selected>Choose Country</option>
                                <?php foreach($allcountries as $country): ?>
                                    <option value="<?php echo $country['id']; ?>" <?php echo ($country['id'] == $city['cont_id']) ? 'selected' : ''; ?>>
                                        <?php echo $country['name']; ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        
                        <!-- Description textarea -->
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"><?php echo $city['description']?></textarea>
                        </div>
                        <br>
                        
                        <!-- Submit button -->
                        <button type="submit" name="submit" class="btn btn-primary mb-4 text-center">Update</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>
</body>
</html>
