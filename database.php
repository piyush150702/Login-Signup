<?php
    $servername = "localhost";
    $username = "root" ;
    $password = "";
    $dbname = "info";

    $con = mysqli_connect($servername, $username, $password, $dbname); 

    if(!$con)
    {
        die("error".mysqli_error());
    }
?>