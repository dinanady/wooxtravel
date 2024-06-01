<?php
require_once __DIR__ .("/../../Model/country.php");
require_once __DIR__ .("/../../config/session_config.php");
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name = $_POST['name'];
    $continent =$_POST['continent'];
   $image= $_FILES['image']['name'] ;
    $description =$_POST['description'];
    
    $population =$_POST['population'];
    $territory =$_POST['territory'];
    $error = [];
    if(empty($name)||empty($description)||empty( $population)||empty($territory)||empty( $continent)||empty($image)){
        $error['create_coun_err'] = "one field or more empty!";
       
        $_SESSION['error_country']= $error['create_coun_err'];
         header("location:../countries-admins/create-country.php");
         exit;
    }

    else{
        $countries = new country( $name,$description , $image,  $population, $territory,$continent);
      
        $extention =["jpg","gif","png","jpeg"];
        $end_item = end(explode(".",$image));
        $lowwnd_item = strtolower($end_item);
        $country  = $countries-> getcountryByName($name);{
            if($country){
                $error['country_add'] = "The Country already exists";
                $_SESSION['error_country']=  $error['country_add'];
                header("location:../countries-admins/create-country.php");
                exit;
            }
            else{
                if(in_array( $lowwnd_item,$extention)){
                    move_uploaded_file($_FILES['image']["tmp_name"],"../../assets/images/".$image);
                $createdCountry = $countries->addcountry();
                header("location:../countries-admins/show-country.php");
                exit;
                }
               
             else {
                $error['image_add'] = "Uploud Valid Image";
                $_SESSION['error_country']=  $error['image_add'];
                header("location:../countries-admins/create-country.php");
                exit;
             }
                
            }

        }
        

    }
    

}