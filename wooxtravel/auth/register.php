<?php
require_once "../includes/header.php";

require_once "../config/session_config.php";
if(isset( $_SESSION["Email"])){
  header("location: ../index.php ");
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
         
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Username</label>
                    <input type="text" name="username" class="username" placeholder="username" autocomplete="on" >
                    <?php
                    if(isset($_SESSION["errors"]["Empty_user"])){
                     echo "<span class=' text-danger '>".$_SESSION['errors']['Empty_user']."</span>";
                    }
                   ?>
                </fieldset>
              </div>

              <div class="col-md-12">
                  <fieldset>
                      <label for="Name" class="form-label">Your Email</label>
                      <input type="email" name="email" class="email" placeholder="email" autocomplete="on" >
                      <?php
                    if(isset($_SESSION["errors"])){
                      if(isset($_SESSION["errors"]["Email_empty"])){
                     echo "<span class=' text-danger '>".$_SESSION['errors']['Email_empty']."</span>";
                    }
                    if(isset($_SESSION["errors"]["Email_taked"])){
                      echo "<span class=' text-danger '>".$_SESSION['errors']['Email_taked']."</span>";
                     }
                     if(isset($_SESSION["errors"]["Email_invalid"])){
                      echo "<span class=' text-danger '>".$_SESSION['errors']['Email_invalid']."</span>";
                     }
                    }
                   ?>
                      
                  </fieldset>
              </div>
           
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Your Password</label>
                    <input type="password" name="password" class="password" placeholder="password" autocomplete="on" >
                    <?php
                    if(isset($_SESSION["errors"]["Password_empty"])){
                     echo "<span class=' text-danger '>".$_SESSION['errors']['Password_empty']."</span>";
                    }
                   ?>
                </fieldset>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button  type="submit" class="main-button" name="submit">register</button>
                  </fieldset>

                  <?php
                   unset($_SESSION["errors"]);
                  ?>
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
