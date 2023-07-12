<?php
  include_once 'database.php';
  $response = "";
  if(isset($_POST["id"]))
  {
    $id = $_POST["id"];
    $sql = "DELETE FROM `information` WHERE `id` = $id";
    if(mysqli_query($con, $sql))
    {
        $response = "Account deleted";
    }
    else
    {
        $response = "Account not deleted";
    }
  }
  echo $response;
  die;
?>