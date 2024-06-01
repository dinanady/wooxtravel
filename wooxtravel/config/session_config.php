<?php

ini_set("session.use_only_cookies",1);
ini_set("session.use_strict_mode",1);

session_set_cookie_params([
    "lifetime" => 18000,
    "domain"   => "localhost",
    "path"  => "/",
    "secure" => true,
    "httponly" =>  true
]);

session_start();

if( !isset($_SESSION["last_regeneration"])){
    
    generationId();
}
else{
    $treval= 60*30;
    if(time()- $_SESSION["last_regeneration"]>=$treval){
        generationId();
       
    }
}
 function generationId(){
    session_regenerate_id(true);
    $_SESSION["last_regeneration"]=time();
 }
 
    
 