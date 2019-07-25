<?php

include ('connection.php');

echo $poolname = $_POST['poolname'];

echo $tagline = $_POST['tagline'];

echo $startdate = $_POST['startdate'];
echo $enddate = $_POST['enddate'];

echo $item = implode(", ", $_POST["name"]);


if ($poolname && $tagline && $startdate && $enddate && $item) {
    $upostinsert =  mysqli_query($connect, "INSERT INTO poll_data(poll_name,poll_tag,start_date,end_date,poll_item) VALUES('$poolname ','$tagline','$startdate','$enddate','$item')");
    header('location: ../pages/addpoll.php?result=addpoll');

}else{
    header('location: ../pages/addpoll.php?result=notaddpoll');
}

