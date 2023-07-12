<?php
require __DIR__.'/vendor/autoload.php';
use Dompdf\Dompdf;

include_once '../database.php';

    session_start();
    $uname = $_SESSION['username'];
    $sql = "select *from information where username = '$uname'";
    if(mysqli_query($con,$sql))
    {
        $result = mysqli_query($con, $sql);
        $row = mysqli_fetch_assoc($result);
        $name = $row['name'];
        $username = $row['username'];
        $password = $row['password'];
        $email = $row['email'];
        $birthdate = $row['birthdate'];
        $profile = $row['profile'];

        $infor ='';
        $infor .='<h2>Details</h2>';

        $infor .='<strong>Name: </strong>' . $name . '<br/>';
        $infor .='<strong>Username: </strong>' . $username . '<br/>';
        $infor .='<strong>Email: </strong>' . $email .'<br/>';
        $infor .='<strong>Password: </strong>' . $password .'<br/>';
        $infor .='<strong>birthdate: </strong>' . $birthdate .'<br/>';
        $infor .='<strong>profile pic: </strong>' . $profile .'<br/>';
        $Dompdf = new Dompdf();
        $Dompdf->loadHtml("$infor");
        $fname = time().".pdf";
        $Dompdf->render();
        $Dompdf->stream($fname,["Attachment" => 0]);
        $output = $Dompdf->output();
        file_put_contents("$username.pdf", $output);
    }
?>
