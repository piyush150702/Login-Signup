<?php
include "database.php";

if(isset($_POST['username'])){
    $username = mysqli_real_escape_string($con,$_POST['username']);

    $query = "select count(*) as cntUser from information where username='".$username."'";

    $result = mysqli_query($con,$query);
    $response = "<span style='color: black;'>Available.</span>";
    $flag = 1;
    if(mysqli_num_rows($result)){
         $row = mysqli_fetch_array($result);

         $count = $row['cntUser'];
    
         if($count > 0){
              $response = "<span style='color: red;'>Not Available.</span>";
              $flag = 0;
         }
   
    }
}
    echo json_encode(array($response, $flag));
    die;
?>