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
          <form id="reservation-form" name="gs" method="Post" role="search" action="../Controllers/login.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Login</h4>
                <?php
                if(isset($_SESSION['error_login'])){
                  echo "<div class='alert alert-danger' role='alert'>".
                  $_SESSION['error_login'] ."
                </div>";
                }
                unset($_SESSION["error_login"]);
                ?>
              </div>
              <div class="col-md-12">
                  <fieldset>
                      <label for="Name" class="form-label">Your Email</label>
                      <input type="text" name="email" class="Name" placeholder="email" autocomplete="on" >
                  </fieldset>
              </div>
           
              <div class="col-md-12">
               
                <fieldset>
                    <label for="Name" class="form-label">Your Password</label>
                    <input type="text" name="password" class="Name" placeholder="password" autocomplete="on" >
                </fieldset>
              </div>
              <div class="col-lg-12">                        
                  <fieldset>
                      <button class="main-button">login</button>
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
