<?php 

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mint_restaurent";

    $Connectdb = new mysqli($dbServerName , $dbUserName, $dbPassword, $dbName );

    if (!$Connectdb){
        die(mysqli_error($Connectdb));
    }

?>