<?php
    include_once 'database.php';
    $response = "";
    if (isset($_POST['name'])) {
        session_start();
        $name = $_POST['name'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $id = $_POST['id'];

        $sql = "UPDATE `information` SET `name` = '$name',`username` = '$username', `password` = '$password', `email` = '$email',`birthdate` = '$birthdate' WHERE `id` = $id";
        if (mysqli_query($con, $sql)) {
            $response = "data updated successfully";
            $_SESSION['username'] = $username;
        } else {
            $response = "data updating failed";
        }
    }
    else
    {
        $response = "error";
    }
    echo $response;
    die;
?>