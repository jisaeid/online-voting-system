<?php
session_start();
include ('connection.php');

echo $email = $_POST['email'];

echo $pass = $_POST['pass'];



// $user_select = mysqli_query($connect, "SELECT * FROM user_info WHERE user_email = '$email' AND pass = '$pass'");

// $user_data = mysqli_num_rows($user_select);

// $user_fatch = mysqli_fetch_array($user_data);

$user_select = mysqli_query($connect, "SELECT * FROM user_info WHERE user_email='$email' AND pass='$pass'");
$koytauser = mysqli_num_rows($user_select);
$user_data = mysqli_fetch_array($user_select);


echo $_SESSION['uname'] = $user_data['user_name'];
echo $_SESSION['uemail'] = $user_data['user_email'];

echo $approvestatus = $user_data['approval'];

if($koytauser == 1 && $approvestatus==1){
    header('location: ../index.php');
    echo 'OK';
}elseif($koytauser == 1 && $approvestatus!=1){
    echo "Your account is not approved by admin yet";
    header('location: ../pages/signin.php?result=approvestatus');
}
elseif($koytauser == 0){
    echo "Something Worng";
    header('location: ../pages/signin.php?result=somethingwrong');
}