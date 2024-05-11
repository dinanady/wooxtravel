<?php
// require_once "../includes/header.php";
require_once "../config/config.php";
require_once "../config/signup.php";

$errorMessageName="";
$errorMessageemail="";
$errorMessagepass="";
if(isset($_POST["submit"])){
  $username= $_POST["username"];
  $email =$_POST['email'];
  $password =$_POST["password"];
  $hahpasswd =sha1($password);
 if(empty($username)||empty($email)||empty($password)){
    
 if(empty($username)){
  $errorMessageName="Please enter Your Name ";
 }
 if(empty($email)){
  $errorMessageemail="Please enter Your Email";
 }

 if(empty($password)){
  $errorMessagepass="Please enter Password";
 }
   }else{
    try{
      $person=new register($username,$email,$hahpasswd);
      $person->createUser();
     echo"<script>alert('succsesful connect  ');</script>";
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
    }
    
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
                    <?php if(!empty($errorMessageName)) echo "<p class='text-danger'>$errorMessageName</p>"; ?>
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
