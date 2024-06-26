<?php
 require_once __DIR__ .  "/includes/header.php";
 require_once __DIR__ . "/Model/country.php";
 
 $country = new country("","","","","","");
 $countries = $country->getCountries();
 $count=1;
?>
  <!-- ***** Main Banner Area Start ***** -->
  <section id="section-1">
    <div class="content-slider">
      <input type="radio" id="banner1" class="sec-1-input" name="banner" checked>
      <input type="radio" id="banner2" class="sec-1-input" name="banner">
      <input type="radio" id="banner3" class="sec-1-input" name="banner">
      <input type="radio" id="banner4" class="sec-1-input" name="banner">
      <div class="slider">
        
      <?php foreach($countries as $country):?>
        <div id="top-banner-<?php echo $count ;?>" class="banner">
          <div class="banner-inner-wrapper header-text">
            <div class="main-caption">

            <h2>Take a Glimpse Into The Beautiful Country Of:</h2>
             <h1><?php echo $country['name'] ;?></h1>
             <div class="border-button"><a href="about.php?id=<?php echo $country['id'] ;?>">Go There</a></div>
              </div>
              <div class="container">
              <div class="row">
              <div class="col-lg-12">
              <div class="more-info">
              <div class="row">
             <div class="col-lg-3 col-sm-6 col-6">
              <i class="fa fa-user"></i>
              <h4><span>Population:</span><br> <?php echo $country['population'] ;?> M</h4>';
              </div>
              <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-globe"></i>
                        <h4><span>Territory:</span><br><?php echo $country['territory'] ;?>KM<em>2</em></h4>
                      </div>
                      <div class="col-lg-3 col-sm-6 col-6">
                        <i class="fa fa-home"></i>
                        <h4><span>AVG Price:</span><br> <?php echo $country['AVG_Price'] ;?></h4>
                      </div>
                        <div class="col-lg-3 col-sm-6 col-6">
                        <div class="main-button">
                          <a href="about.php?id=<?php echo $country['id'] ;?>">Explore More</a>
                          <?php $count ++?>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
       
        <?php  endforeach;?>
      </div>
      <nav>
        <div class="controls">
          <label for="banner1"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">1</span></label>
          <label for="banner2"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">2</span></label>
          <label for="banner3"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">3</span></label>
          <label for="banner4"><span class="progressbar"><span class="progressbar-fill"></span></span><span class="text">4</span></label>
        </div>
      </nav>
    </div>
  </section>
  <!-- ***** Main Banner Area End ***** -->
  
  <div class="visit-country">
    <div class="container">
      <div class="row  justify-content-around">
        <div class="col-lg-5">
          <div class="section-heading">
            <h2>Visit One Of Our Countries Now</h2>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.</p>
          </div>
          
        </div>
        <div class="main-button  col ">
            <a href="reservation.php">Reservation Now </a>
             </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="items">
            <div class="row">
             
              <?php
              foreach($countries as $country){
              echo '<div class="col-lg-12">
                <div class="item last-item">
                  <div class="row">
                    <div class="col-lg-4 col-sm-5">
                      <div class="image">
                      <img src="assets/images/'.$country["image"].'" alt="">
                      </div>
                    </div>
                    <div class="col-lg-8 col-sm-7">
                      <div class="right-content">
                      <h4>'.$country["name"].'</h4>
                        <span>'.$country['continent'].'</span>
                        <div class="main-button">
                          <a href="about.php?id='.$country['id'].'">Explore More</a>
                        </div>
                        <p>'.$country["description"].'</p>
                        <ul class="info">
                        <li><i class="fa fa-user"></i>'.$country["population"].' Mil People</li>
                        <li><i class="fa fa-globe"></i>'.$country["territory"] .'km2</li>
                        <li><i class="fa fa-home"></i> $'.$country["AVG_Price"].'</li>
                        </ul>
                        <div class="text-button">
                          <a href="about.php?id='.$country['id'].'">Need Directions ? <i class="fa fa-arrow-right"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>';}
              ?>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="side-bar-map">
            <div class="row">
              <div class="col-lg-12">
                <div id="map">
                  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d12469.776493332698!2d-80.14036379941481!3d25.907788681148624!2m3!1f357.26927939317244!2f20.870722720054623!3f0!3m2!1i1024!2i768!4f35!3m3!1m2!1s0x88d9add4b4ac788f%3A0xe77469d09480fcdb!2sSunny%20Isles%20Beach!5e1!3m2!1sen!2sth!4v1642869952544!5m2!1sen!2sth" width="100%" height="550px" frameborder="0" style="border:0; border-radius: 23px; " allowfullscreen=""></iframe>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php
  require_once "includes/footer.php";
  ?>
  <script>
    function bannerSwitcher() {
      next = $('.sec-1-input').filter(':checked').next('.sec-1-input');
      if (next.length) next.prop('checked', true);
      else $('.sec-1-input').first().prop('checked', true);
    }

    var bannerTimer = setInterval(bannerSwitcher, 5000);

    $('nav .controls label').click(function() {
      clearInterval(bannerTimer);
      bannerTimer = setInterval(bannerSwitcher, 5000)
    });
  </script>