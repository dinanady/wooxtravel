<?php
require_once "../includes/header.php";

require_once "../config/session_config.php";
if($_SESSION["user"]){
  header("location:../index.php");
}

?>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="post" role="search" action="../Controllers/registration.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Register</h4>
              </div>
              <?php
              if (isset($_SESSION["errors"])) {
                echo "<ul>";
                foreach ($_SESSION["errors"] as $errorMessage) {
                    echo "<li>$errorMessage</li>";
                }
               
                echo "</ul>";
                // Clear the errors from session after displaying them
                unset($_SESSION["errors"]);
            }
           
            ?>
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Username</label>
                    <input type="text" name="username" class="username" placeholder="username" autocomplete="on" >
                   
                </fieldset>
              </div>

              <div class="col-md-12">
                  <fieldset>
                      <label for="Name" class="form-label">Your Email</label>
                      <input type="email" name="email" class="email" placeholder="email" autocomplete="on" >
                      <?php if(!empty($errorMessageemail)) echo "<p class='text-danger'>$errorMessageemail</p>"; ?>
                  </fieldset>
              </div>
           
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Your Password</label>
                    <input type="password" name="password" class="password" placeholder="password" autocomplete="on" >
                    <?php if(!empty($errorMessagepass)) echo "<p class='text-danger'>$errorMessagepass</p>"; ?>
                </fieldset>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button  type="submit" class="main-button" name="submit">register</button>
                  </fieldset>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

  <?php
  require_once "../includes/footer.php";
  ?>
  <script>
    $(".option").click(function(){
      $(".option").removeClass("active");
      $(this).addClass("active"); 
    });
  </script>

  </body>

</html>
