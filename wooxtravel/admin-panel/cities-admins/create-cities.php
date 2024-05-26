<?php
require_once "../layout/header.php";
require_once __DIR__ .("/../../config/session_config.php");

require_once __DIR__ .("/../../Model/country.php");
$countries = new country("","","","","","");
$allcountries = $countries->allcountries();
?>
    <div class="container-fluid">
       <div class="row">
        <div class="col">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title mb-5 d-inline">Create Cities</h5>
              <?php
              if(isset($_SESSION['error_city'])){
                echo "<div class='alert alert-danger' role='alert'>".
                  $_SESSION['error_city'] ."
                </div>";
              }
              
              unset($_SESSION['error_city']);
              ?>
          <form method="POST" action="../crud_admin/create_city.php" enctype="multipart/form-data">
                <!-- Email input -->
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="name" id="form2Example1" class="form-control" placeholder="name" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="file" name="image" id="form2Example1" class="form-control"  />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="trip_days" id="form2Example1" class="form-control" placeholder="trip_days" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">
                  <input type="text" name="price" id="form2Example1" class="form-control" placeholder="price" />
                 
                </div>
                <div class="form-outline mb-4 mt-4">

                  <select name="country_id" class="form-select  form-control" aria-label="Default select example">
                    <option selected>Choose Country</option>
                    <?php foreach($allcountries as $country):?>
                    <option value="<?php echo $country['id'];?>"><?php echo $country['name'];?></option>
                    <?php  endforeach;?>
                  </select>
                </div>

                <div class="form-floating">
                  <textarea name="description" class="form-control" placeholder="description" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
                <br>
              

      
                <!-- Submit button -->
                <button type="submit" name="submit" class="btn btn-primary  mb-4 text-center">create</button>

          
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