<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home Page</title>
    <link rel="stylesheet" href="./css/cover.css">
    <link rel="canonical" href="https://getbootstrap.com/docs/4.3/examples/cover/">
    <link rel="stylesheet" href="./node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        color: #fff;
        background: #333;
        text-align: center;
    }
</style>

<body>

    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand"><a href="">LOGO</a></h3>
                <nav class="nav nav-masthead justify-content-center">
                    <!-- <a class="btn btn-outline-success mx-2" href="./pages/signin.php">Sign in</a> -->
                    <!-- <a class="btn btn-outline-primary mx-2" href="./pages/signup.php">Sign up</a> -->
                    <?php 

if (!isset($_SESSION['uemail'])) {

        echo '<a class="btn btn-outline-success mr-3" href="./pages/signin.php">Sign in</a>
        <a class="btn btn-outline-primary" href="./pages/signup.php">Sign up</a>';
}else{
    echo '<button type="button" class="btn btn-outline-success text-uppercase  mr-3">HI '.$_SESSION["uname"].'</button>';
    echo '<a class="btn btn-outline-primary" href="./inc/logout.php">LOGOUT</a>';
}

?>
    
                    <a class="btn btn-outline-info mx-2" href="./admin/index.php">Admin</a>
                </nav>
            </div>
        </header>

        <main role="main" class="inner cover">
            <h1 class="cover-heading">Online Voting System</h1>
            <p class="lead">In "ONLINE VOTING SYSTEM" a voter can use his/her voting right online without any difficulty. He/She has to be registered first for him/her to vote. Registration is mainly done by the system administrator for security reasons. The system Administrator registers the voters on a special site of the system visited by him only by simply filling a registration form to register voter.</p>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner">
                <p>Create by <a href="#">Iqbal</a></p>
            </div>
        </footer>
    </div>


    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="./node_modules/jquery/dist/jquery.min.js"></script>
    <script src="./node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>