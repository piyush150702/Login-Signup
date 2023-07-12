<?php
    include_once 'database.php';
    if(isset($_POST['username']))
    {
        $name = $_POST['name']; 
        $username = $_POST['username']; 
        $email = $_POST['email']; 
        $password = $_POST['password']; 
        $birthdate = $_POST['birthdate']; 
        $image = "image/" . $_FILES["profile"]["name"]; 

        $allowed_image_extension = array(
            "png",
            "jpg",
            "jpeg",
            "jfif",
            "tiff",
        );
        
        $file_extension = pathinfo($_FILES["profile"]["name"], PATHINFO_EXTENSION);

        $sql = "INSERT INTO `information` (`name`, `username`, `password`, `email`, `birthdate`, `profile`) VALUES ( '$name', '$username', '$password', '$email', '$birthdate', '$image');";


        $username = mysqli_real_escape_string($con,$_POST['username']);
        $query = "select count(*) as cntUser from information where username='".$username."'";
        $result = mysqli_query($con,$query);
        $flag = 1;
        if(mysqli_num_rows($result)){
            $row = mysqli_fetch_array($result);

            $count = $row['cntUser'];
        
            if($count > 0){
                $flag = 0;
            }
    
        }
        if($flag == 0)
        {   
            // echo "<script type='text/javascript'>alert('Username not available');
            //     window.location='/new/';
            //     </script>";
            $response = "Username not available";
        }
        else if (!in_array($file_extension, $allowed_image_extension)) {
                // echo "<script type='text/javascript'>alert('Upload valid images. Only PNG and JPEG are allowed');
                // window.location='/new/';
                // </script>";
                $response = "Upload valid images. Only PNG and JPEG are allowed";
            }    
            else if (($_FILES["profile"]["size"] > 2000000)) {
                // echo "<script type='text/javascript'>alert('Image size exceeds 2MB');
                // window.location='/new/';
                // </script>";
                $response = "Image size exceeds 2MB";   
            }
            else {
                if (move_uploaded_file($_FILES["profile"]["tmp_name"], $image)) {
                    mysqli_query($con,$sql);
                        // echo "<script type='text/javascript'>alert('sign-up successfull, please login');
                        //     window.location='/new/';
                        //     </script>";
                        $response = "sign-up successfull, please login";
                } else {
                    echo "<script type='text/javascript'>alert('data is not inserted, try again');window.location='/new/';</script>";
                    $response ="data is not inserted, try again";
                }
            }

            }
        else{
            // echo "<script type='text/javascript'>alert('please fill all input');
            //     window.location='/new/index.php?val=0';
            //     </script>";
            $response = "plaese fill all input";
        }
        echo $response;
    die
?>