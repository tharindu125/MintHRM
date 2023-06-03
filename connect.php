<?php 

    $dbServerName = "localhost";
    $dbUserName = "root";
    $dbPassword = "";
    $dbName = "mint_restaurent";

    //connect to database server
    $Connectdb = new mysqli($dbServerName , $dbUserName, $dbPassword, $dbName );

    if (!$Connectdb){
        die(mysqli_error($Connectdb));
    }

?>