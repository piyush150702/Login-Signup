<?php
    include_once 'database.php';

    session_start();
    $username = $_SESSION['username'];

    $fp = fopen("upload/csv/$username.csv", "r");
    if ($fp) {
        $n = 1;
        while ($row = fgetcsv($fp)) {
            if($n==1)
            {
                $n += 1;
            }
            else{
                $sql = "INSERT INTO `csv` (`username`, `password`, `email`, `bithdate`, `profile`) VALUES ('$row[0]', '$row[1]', '$row[2]', '$row[3]', '$row[4]');";
                $result = mysqli_query($con, $sql);
            }
        }
        if ($result) {
            echo "<script type=text/javascript> alert('insert successfull');window.location='home.php';</script>";
        } else {
            echo "<script type = text/javascript> alert('insert failed')
                window.location='home.php';
                </script>";
        }
    }
?>