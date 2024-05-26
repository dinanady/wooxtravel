<?php
require_once __DIR__ .("/../Model/country.php");

function search(){
if(isset($_POST['search'])){
$id = $_POST['Location'];
$price = $_POST['price'];
$countries= new country("","","","","","");
$allcites=$countries->search($id, $price);
return $allcites;
header("location:../deals.php");
}
else {
    return false ;
}
}