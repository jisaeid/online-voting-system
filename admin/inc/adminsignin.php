<?php

include ('connection.php');

$adminemail = $_POST['email'];

$adminpass = $_POST['password'];


$admin_select = mysqli_query($connect, "SELECT * FROM admin_info WHERE  admin_email = '$adminemail' AND admin_pass = '$adminpass'");


$admin_data = mysqli_num_rows($admin_select);

// $admin_fatch = mysqli_fatch_array($admin_data)

if($admin_data == 1){
    header('location: ../pages/home.php');
    echo 'OK';
}elseif($admin_data == 0){
    echo "Something Worng";
    header('location: ../index.php?result=somethingwrong');
}
