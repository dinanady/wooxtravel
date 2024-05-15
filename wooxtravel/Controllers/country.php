<?php
require_once "../Model/country.php";
 function getcountry(){
 $country = new country();
 $countries = $country->getCountries();

 
}