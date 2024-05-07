<?php
require_once "../includes/header.php";
require_once "../config/config.php";



if(isset($_POST["submit"])){
  $username= $_POST["username"];
  $email =$_POST['email'];
  $password =$_POST["password"];
 if(empty($username)||empty($email)||empty($password)){
    
  echo"<p class='text-danger'>Please enter all data </p> ";


   }else{
    echo"<script>alert('please enter data $username ,$email,$password');</script>";
    echo"<p class='text-danger'>Please enter all data </p> ";
   }
}

?>

  <div class="reservation-form">
    <div class="container">
      <div class="row">
        
        <div class="col-lg-12">
          <form id="reservation-form" name="gs" method="post" role="search" action="register.php">
            <div class="row">
              <div class="col-lg-12">
                <h4>Register</h4>
              </div>
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Username</label>
                    <input type="text" name="username" class="username" placeholder="username" autocomplete="on" >
                </fieldset>
              </div>

              <div class="col-md-12">
                  <fieldset>
                      <label for="Name" class="form-label">Your Email</label>
                      <input type="text" name="email" class="email" placeholder="email" autocomplete="on" >
                  </fieldset>
              </div>
           
              <div class="col-md-12">
                <fieldset>
                    <label for="Name" class="form-label">Your Password</label>
                    <input type="text" name="password" class="password" placeholder="password" autocomplete="on" >
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
