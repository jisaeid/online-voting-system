
<?php

include './connection.php';

$id = $_GET['id'];

$user_select = mysqli_query($connect, "SELECT * FROM user_info WHERE id=$id");
$user_data = mysqli_fetch_array($user_select);
echo $approvestatus = $user_data['approval'];

if($approvestatus==1){
    mysqli_query($connect, "UPDATE user_info SET approval=0 WHERE id='$id'");
    // echo "update 1-0";
    header('location: ../pages/allusers.php?result=upsuccess');
}
if($approvestatus!=1){
    mysqli_query($connect, "UPDATE user_info SET approval=1 WHERE id='$id'");
    echo "update 0-1";
    header('location: ../pages/allusers.php?result=notup');
}

// header('location: ../pages/allusers.php');
