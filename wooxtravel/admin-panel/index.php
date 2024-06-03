<?php
require_once __DIR__ .("../layout/header.php");
require_once __DIR__ .("/../Model/country.php");
require_once __DIR__ .("/../Model/city.php");
require_once __DIR__ .("/../Model/bookings.php");
require_once __DIR__ .("/../Model/Person.php");

$users = new Person("","","","");
$allusers = $users->numberOfUsers();
$bookings = new bookings("", "", "", "", "", "", "", "", ""); 
$ALLbookings = $bookings->numderOfbooking();
$cities = new city("", "", "", "", "", "");
$allcities = $cities->numderOfCities();
$countries = new country("", "", "", "", "","");
$allcountries = $countries->numderOfCountries();


?>
  
    <div class="container-fluid mt-5">
            
      <div class="row">
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Countries</h5>
             
              <p class="card-text">number of countries: <?php echo $allcountries;?></p>
             
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Cities</h5>
              
              <p class="card-text">number of cities: <?php echo $allcities?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Users</h5>
              <p class="card-text">number of users: <?php echo $allusers;?></p>
              
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title">Bookings</h5>
              <p class="card-text">number of Bookings: <?php echo $ALLbookings;?></p>
              
            </div>
          </div>
        </div>
      </div>
 
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
<script type="text/javascript">

</script>
</body>
</html>
