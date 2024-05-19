<?php
require_once "includes/header.php";
require_once __DIR__ . "/Model/city.php";
require_once __DIR__ . "/Model/country.php";
$cities = new city("","","","","","");
$allcities = $cities->getbestprice();


$countries= new country("","","","","");
$allcountries=$countries->getCountries();
function search(){
  if(isset($_POST['search'])){
  $id = $_POST['Location'];
  $price = $_POST['price'];
  $countries= new country("","","","","");
  $allcites=$countries->search($id, $price);
  return $allcites;
  header("location:../deals.php");
  }
  else {
      return false ;
  }
  }

  $searchdate=search();
?>
  <div class="page-heading">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h4>Discover Our Weekly Offers</h4>
          <h2>Amazing Prices &amp; More</h2>
        </div>
      </div>
    </div>
  </div>

  <div class="search-form">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <form id="search-form" name="gs" method="post" role="search" action="deals.php">
            <div class="row">
              <div class="col-lg-2">
                <h4>Sort Deals By:</h4>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="Location" class="form-select" aria-label="Default select example" id="chooseLocation" onChange="this.form.click()">
                          <option selected>Destinations</option>
                          <?php foreach($allcountries as $country) :?>
                          <option value="<?php echo $country['id']?>"><?php echo $country['name']?></option>
                          <?php endforeach ;?>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-4">
                  <fieldset>
                      <select name="price" class="form-select" aria-label="Default select example" id="choosePrice" onChange="this.form.click()">
                          <option selected>Price Range</option>
                          <option value="100">Less Then $100 </option>
                          <option value="250"> Less Then $250 </option>
                          <option value="500"> Less Then $500 </option>
                          <option value="1000"> Less Then $1,000 </option>
                          <option value="2500"> Less Then $2,500</option>
                      </select>
                  </fieldset>
              </div>
              <div class="col-lg-2">                        
                  <fieldset>
                      <button class="border-button" typy="submit" name ="search">Search Results</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
  <?php if($searchdate):?>
   <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
       <?php foreach($sarchdate as $city):?>
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="assets/images/<?php echo $city['image']?>" width="350" height="300" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="text-danger fw-bold">Limited Price <?php echo $city['price']?>$ </span>
                  <h4><?php echo $city['name']?></h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list"><?php echo $city['trip_days']?></span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p >Best Weekly Offers In Each City  </p>
                  <div class="main-button">
                    <a href="reservation.php?id=<?php echo $city['id']?>">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
       
      </div>
    </div>
  </div>
    <?php endif;?>
    <?php?>
  <div class="amazing-deals">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
       <?php foreach($allcities as $city):?>
        <div class="col-lg-6 col-sm-6">
          <div class="item">
            <div class="row">
              <div class="col-lg-6">
                <div class="image">
                  <img src="assets/images/<?php echo $city['image']?>" width="350" height="300" alt="">
                </div>
              </div>
              <div class="col-lg-6 align-self-center">
                <div class="content">
                  <span class="text-danger fw-bold">Limited Price <?php echo $city['price']?>$ </span>
                  <h4><?php echo $city['name']?></h4>
                  <div class="row">
                    <div class="col-6">
                      <i class="fa fa-clock"></i>
                      <span class="list"><?php echo $city['trip_days']?></span>
                    </div>
                    <div class="col-6">
                      <i class="fa fa-map"></i>
                      <span class="list">Daily Places</span>
                    </div>
                  </div>
                  <p >Best Weekly Offers In Each City  </p>
                  <div class="main-button">
                    <a href="reservation.php?id=<?php echo $city['id']?>">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php endforeach;?>
       
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
