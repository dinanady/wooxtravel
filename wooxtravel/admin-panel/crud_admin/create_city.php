<?php
require_once __DIR__ .("/../../Model/city.php");
require_once __DIR__ .("/../../config/session_config.php");
if($_SERVER['REQUEST_METHOD']==='POST'){
    $name = $_POST['name'];
    $trip_days =$_POST['trip_days'];
    $image= $_FILES['image']['name'] ;
    $description =$_POST['description'];
    $price =$_POST['price'];
    $country_id =$_POST['country_id'];
    $error = [];
    
   
    if(empty($name)||empty($description)||empty( $price)||empty($trip_days)||empty($image)||empty($country_id)){
        $error['create_city_err'] = "one field or more empty!";
       
        $_SESSION['error_city']=  $error['create_city_err'];
         header("location:../cities-admins/create-cities.php");
         exit;
    }

    else{
        $cities = new city( $name,$description,$image,$price ,$trip_days, $country_id);
      
        $extention =["jpg","gif","png","jpeg"];
        $end_item = explode(".",$image);
        
       
        $lowwnd_item = strtolower(end($end_item));
    
        $city  = $cities->getcityByName($name);

            if($city){
                $error['city_add'] = "the City is already excsiste";
                $_SESSION['error_city']=  $error['city_add'] ;
                header("location:../cities-admins/create-cities.php");
                exit;
            }
            else{
                if(in_array( $lowwnd_item,$extention)){
                move_uploaded_file($_FILES['image']["tmp_name"],"../../assets/images/".$image);
               
                $createdCity =$cities->addcity();
                
                header("location:../cities-admins/show-cities.php");
                exit;
                }
               
             else {
                $error['image_add'] = "Uploud Valid Image";
                $_SESSION['error_city']=  $error['image_add'];
                header("location:../cities-admins/create-cities.php");
                exit;
             }
                
            

        }
        

    }
    

}