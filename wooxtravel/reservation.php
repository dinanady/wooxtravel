<?php
require_once "includes/header.php";
require_once __DIR__ . "/Model/city.php";
if(isset($_SESSION['id'])){

 $cities = new city("","","","","","");
 $allcities  = $cities->getAllCities();
  $id = $_GET['id'];
$onlycity = $cities->getcity($id);
}

else{
  header("Location: http://localhost/wooxtravel/wooxtravel/auth/login.php");
  exit;
}

?>

  <div class="second-page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Book Prefered Deal Here</h4>
          <h2>Make Your Reservation</h2>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt uttersi labore et dolore magna aliqua is ipsum suspendisse ultrices gravida</p>
          <div class="main-button"><a href="index.php">Discover More</a></div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-info reservation-info">
    <div class="container">
      <div class="row">
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-phone"></i>
            <h4>Make a Phone Call</h4>
            <a href="#">+123 456 789 (0)</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-envelope"></i>
            <h4>Contact Us via Email</h4>
            <a href="#">company@email.com</a>
          </div>
        </div>
        <div class="col-lg-4 col-sm-6">
          <div class="info-item">
            <i class="fa fa-map-marker"></i>
            <h4>Visit Our Offices</h4>
            <a href="#">24th Street North Avenue London, UK</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
      
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="POST" role="search" action="Controllers/reservation.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Make Your <em>Reservation</em> Through This <em>Form</em></h4>
              </div>
              <!-- error message from empty -->
              <?php if(isset($_SESSION['empty_reservation'])): ?>
              <div class='alert alert-danger' role='alert' ><?php echo $_SESSION['empty_reservation'];?></div>
              <?php endif; ?>
              <?php   unset($_SESSION["empty_reservation"]);?>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="Name" class="form-label">Your Name</label>
                      <input type="text" name="username" class="Name" placeholder="Ex. John Smithee" autocomplete="on">
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">Your Phone Number</label>
                    <input type="text" name="phone" class="Number" placeholder="Ex. +xxx xxx xxx" autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-6">
                  <fieldset>
                      <label for="chooseGuests" class="form-label">Number Of Guests</label>
                      <select name="Guests" class="form-select" aria-label="Default select example" id="chooseGuests" onChange="this.form.click()">
                          <option selected>ex. 3 or 4 or 5</option>
                          <option type="checkbox" name="option1" value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4+">4+</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-6">
                <fieldset>
                    <label for="Number" class="form-label">Check In Date</label>
                    <input type="date" name="checkdate" class="date" >
                </fieldset>
              </div>
              <div class="col-lg-12">
              <?php if(isset($_GET['id'])) :?>
                <input type="hidden" name="destination" value="<?php echo $_GET['id']?>">
                <?php elseif(empty($_GET['id'])):?>
                  <fieldset>
                      <label for="chooseDestination" class="form-label">Choose Your Destination</label>
                      <select name="destination" class="form-select" aria-label="Default select example" id="chooseCategory" onChange="this.form.click()">
                        
                        
                          <?php foreach($allcities as $city ):?>
        
                            
                          <option value="<?php echo $city['city_id'] ?>"><?php echo $city['nameofcountry'].",".$city['nameofcity'] ?></option>
                          <?php endforeach ;?>
                       
                      </select>
                  </fieldset>
                  <?php endif ;?>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button class="main-button" type="submit">Make Your Reservation Now</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once "includes/footer.php";
  ?>
    <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
