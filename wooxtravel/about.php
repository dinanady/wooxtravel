<?php
require_once "includes/header.php";
require_once __DIR__ . "/Model/country.php";
if(isset($_GET["id"])){
$id = $_GET["id"];
$country = new country("","","","","");
$Country= $country->getcountryByID($id);

$cities = $country->getCitiesInCountry($id);

$numofcity = $country->getnumofCitiesInCountry($id);
$numOfCheck= $country->getnumofAllcheckin($id);
}
else{
  header('location:index.php');
}
?>
  <!-- ***** Main Banner Area Start ***** -->
  <div class="about-main-content">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="content">
            <div class="blur-bg"></div>
            <h4>EXPLORE OUR COUNTRY</h4>
            <div class="line-dec"></div>
            <h2>Welcome To <?php echo $Country['name']?></h2>
            <p> <?php echo $Country['description']?></p>
            <div class="main-button">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="cities-town">
    <div class="container">
      <div class="row">
        <div class="slider-content">
          <div class="row">
            <div class="col-lg-12">
              <?php if(isset ($_GET["id"])) : ?>
              <h2><?php echo $Country['name']?>’s <em>Cities &amp; Towns</em></h2>
            </div>
            <?php endif ;?>
            <div class="col-lg-12">
              <div class="owl-cites-town owl-carousel">
                
           <?php foreach ($cities as $city) : ?>
            <div class="item">
                <div class="thumb">
                    <img src="assets/images/<?php echo $city['image']; ?>"width="350" height="300" alt="">
                    <h4><?php echo $city['name']; ?></h4>
                </div>
            </div>
            <?php endforeach; ?>
        
                
                
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="weekly-offers">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 offset-lg-3">
          <div class="section-heading text-center">
            <h2>Best Weekly Offers In Each City</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
        </div>
      </div>
    </div>
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12">
          <div class="owl-weekly-offers owl-carousel">
          <?php foreach ($cities as $city) : ?>
            <div class="item">
              <div class="thumb">
                <img src="assets/images/<?php echo $city['image']; ?> " width="300" height="422" alt="">
                <div class="text">
                  <h4><?php echo $city['name']; ?><br><span><i class="fa fa-users"></i> <?php echo $city['num_check']; ?> Check Ins</span></h4>
                  <h6>$<?php echo $city['price']; ?><br><span>/person</span></h6>
                  <div class="line-dec"></div>
                  <ul>
                    <li>Deal Includes:</li>
                    <li><i class="fa fa-taxi"></i> <?php echo $city['trip_days']; ?> Days Trip > Hotel Included</li>
                    <li><i class="fa fa-plane"></i> Airplane Bill Included</li>
                    <li><i class="fa fa-building"></i> Daily Places Visit</li>
                  </ul>
                  <div class="main-button">
                    <a href="reservation.php?id=<?php echo $city['id']; ?>">Make a Reservation</a>
                  </div>
                </div>
              </div>
            </div>
            <?php endforeach; ?>
           
           
           
           
           
          </div>
        </div>
      </div>
    </div>
  </div>

  <div class="more-about">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 align-self-center">
          <div class="left-image">
            <img src="assets/images/about-left-image.jpg" alt="">
          </div>
        </div>
        <div class="col-lg-6">
          <div class="section-heading">
            <h2>Discover More About Our Country</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
          <div class="row">
           
            <div class="col-lg-12">
              <div class="info-item">
                <div class="row">
                  <div class="col-lg-6">
                    <h4><?php echo $numofcity; ?>+</h4>
                    <span>Amazing Places</span>
                  </div>
                  <div class="col-lg-6">
                    <h4><?php echo $numOfCheck; ?>+</h4>
                    <span>Different Check-ins Yearly</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore. Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          
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
