<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../config/session_config.php");
require_once __DIR__ .("/../../Model/country.php");
require_once __DIR__ .("/../../Model/city.php");

$countries = new country("", "", "", "", "","");

if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $country = $countries->getcountryByID($id);
    print_r($country);
} else {
    header("location:show-country.php");
}

?>

<div class="container-fluid">
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title mb-5 d-inline">Edit City</h5>
                    <?php
                    if (isset($_SESSION['error_country'])) {
                        echo "<div class='alert alert-danger' role='alert'>" . $_SESSION['error_country'] . "</div>";
                        unset($_SESSION['error_country']);
                    }
                    ?>
                    <form method="POST" action="../crud_admin/update_country.php?id=<?php echo $country['id']?>" enctype="multipart/form-data">
                        <!-- Name input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="name" id="form2Example1" value="<?php echo $country['name']?>" class="form-control" placeholder="name" />
                        </div>
                        
                        <!-- Image input -->
                        <div class="form-outline mb-4 mt-4">
                            <input type="file" name="image" id="form2Example1" class="form-control" />
                            <!-- Display current image -->
                            <?php if ($country['image']): ?>
                                <img src="../../assets/images/<?php echo $country['image']; ?>" alt="City Image" style="width: 100px; height: auto;"/>
                            <?php endif; ?>
                        </div>
                        
                        
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="continent" id="form2Example1" class="form-control" placeholder="continent" value="<?php echo $country['continent']?>" />
                        </div>
                        
                       
                        <div class="form-outline mb-4 mt-4">
                            <input type="text" name="population" id="form2Example1" class="form-control" placeholder="population" value="<?php echo $country['population']?>" />
                        </div>
                        
                    
                        </div>  <div class="form-outline mb-4 mt-4">
                  <input type="text" name="territory" id="form2Example1" class="form-control" placeholder="territory" value="<?php echo $country['territory']?>" />
                 
                </div> 
                        
                        <!-- Description textarea -->
                        <div class="form-floating">
                            <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"><?php echo $country['description']?></textarea>
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
