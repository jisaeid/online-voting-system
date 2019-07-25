<?php

include ('connection.php');

$name = $_POST['name'];
$pass = $_POST['pass'];
    $repass = $_POST['repass'];
$email = $_POST['email'];



$email_select = mysqli_query($connect, "SELECT * FROM user_info WHERE user_email='$email'");
$how_many_user = mysqli_num_rows($email_select);

if ($name && $pass && $email) {
    if ($pass == $repass) {  
            if ($how_many_user  >= 1) {
                header('location: ../pages/signup.php?result=sameemail');
                echo "Vai ai email diye registation kora ase onno email diye try koren";
            } else {
                mysqli_query($connect, "INSERT INTO user_info(user_name,user_email,pass,approval)VALUES('$name','$email','$pass',0)");
                header('location: ../pages/signup.php?result=successful');
                // echo "insert OK";
            }
      
    } else {
        echo "Pass duita mile nai";
        header('location: ../pages/signup.php?result=passdontmatch');
    }
} else {
    header('location: ../index.php?result=fieldempty');
}