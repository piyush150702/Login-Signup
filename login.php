<?php
    include_once 'database.php';

    $uname = $_POST['lusername'];
    $pass = $_POST['lpassword'];
    $sql = "select *from information where username = '$uname' and password = '$pass'";  
        $result = mysqli_query($con, $sql);  
        $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
        $count = mysqli_num_rows($result);  
          
        if($count == 1){
            session_start();
            $_SESSION["username"] = $uname;
            header("location: ./home.php");
            // echo "<script type='text/javascript'>alert('login successful');
            //         window.location='/new/home.php';
            //         </script>";
        }
        else
        {
            echo "<script type='text/javascript'>alert('invalid username or password');
                    window.location='/new/';
                    </script>";
        }

?>
