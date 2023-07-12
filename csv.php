<?php
    include_once 'database.php';

    session_start();
    $uname = $_SESSION['username'];
    $sql = "select *from information where username = '$uname'";
    $filedir = "upload/csv/";
    $fname = "$uname.csv";
    $filename = $filedir . $fname;
    if (mysqli_query($con, $sql)) {
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $username = $row['username'];
        $pass = $row['password'];
        $email = $row['email'];
        $birthdate = $row['birthdate'];
        $profile = $row['profile'];
        $data = [
            ["username" , "password", "email", "birthdate", "profile pic name"],
            ["$username" , "$pass", "$email", "$birthdate", "$profile"]
        ];

        $fp = fopen("$filename", "wb");
        foreach ($data as $line) {
            fputcsv($fp, $line);
        }
        fclose($fp);
        header('Content-Type: text/csv');
        header('Content-Disposition: attachment; filename="' . $fname . '"');
        readfile($filename);
    }
?>