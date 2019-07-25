
<?php

include './connection.php';

$id = $_GET['id'];

$result = mysqli_query($connect, "DELETE FROM user_info WHERE id=$id");

header('location: ../pages/allusers.php');
