<?php
try{
//HOST
define("HOST","localhost");

//dbName

define("DBNAME","wooxtravel");

// User 
 
define("USER","root");

// password
define("password","");

// connection by using pdo
 
$connection = new PDO("mysql:host=".HOST.";dbname=".DBNAME, USER, password);



// if($connection){
//     echo "connected ";
// }
// else{
//     echo "error ";
// }
}
catch(Exception $e)
{
    echo $e->getMessage();
}