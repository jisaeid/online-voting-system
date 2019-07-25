<?php
session_start();
if (isset($_SESSION['user_email'])) {
    header('location: ../index.php');
};
?>

<!doctype html>
<html lang="en">

<head>
    <title>Admin Sign in Page</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<style>
    body,
    html {
        height: 100%
    }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom
    }

    body {
        display: -ms-flexbox;
        display: flex;
        -ms-flex-align: center;
        align-items: center;
        padding-top: 40px;
        padding-bottom: 40px;
        background-color: #f5f5f5
    }

    .form-signin {
        width: 100%;
        max-width: 330px;
        padding: 15px;
        margin: auto;
        text-align: center
    }

    .form-signin .checkbox {
        font-weight: 400
    }

    .form-signin .form-control {
        position: relative;
        box-sizing: border-box;
        height: auto;
        padding: 10px;
        font-size: 16px;
        margin-bottom: 10px;
    }

    .form-signin .form-control:focus {
        z-index: 2
    }

    .form-signin input[type=email] {
        /* margin-bottom: 10px; */
        border-bottom-right-radius: 0;
        border-bottom-left-radius: 0
    }

    .form-signin input[type=password] {
        /* margin-bottom: 10px; */
        border-top-left-radius: 0;
        border-top-right-radius: 0
    }
</style>

<body>
    <form class="form-signin" action="../inc/usersignup.php" method="POST">
        <?php
        if (isset($_GET['result'])) {
            if ($_GET['result'] == 'sameemail') {
                echo '<div class="alert alert-danger">
      <strong>Something Worng ! </strong> This email already register.</div>';
            }
        }
        if (isset($_GET['result'])) {
            if ($_GET['result'] == 'successful') {
                echo '<div class="alert alert-success">
      <strong>Successfully register ! </strong> Login and enjoy</div>';
            }
        }
        if (isset($_GET['result'])) {
            if ($_GET['result'] == 'passdontmatch') {
                echo '<div class="alert alert-danger">
      <strong>Something Worng ! </strong> password does nt match</div>';
            }
        }
        if (isset($_GET['result'])) {
            if ($_GET['result'] == 'fieldempty') {
                echo '<div class="alert alert-danger">
      <strong>Something Worng ! </strong> Field are empty</div>';
            }
        }
        ?>

        <img class="mb-4" src="../admin/images/ecom-store-logo.png" alt="">
        <h1 class="h3 mb-3 font-weight-normal"><b>Please sign up</b></h1>
        <input type="text" class="form-control" placeholder="Enter your name" name="name" required autofocus>
        <input type="email" class="form-control" placeholder="Email address" name="email" required autofocus>
        <input type="password" class="form-control" placeholder="Password" name="pass" required autofocus>
        <input type="password" class="form-control" placeholder="Re-Password" name="repass" required>
        <div class="checkbox mb-3">
            <label>
                <input type="checkbox" value="remember-me"> Remember me
            </label>
        </div>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Sign up</button>
        <div class="container">
            <p class="mt-5 mb-3 text-muted">You already have account? <a href="./signin.php"> Signin Here</a></p>
            <p class="mt-5 mb-3 text-muted"><a href="../index.php">Go to home<span data-feather="arrow-right"></span></a></p>
            <p class="mt-5 mb-3 text-muted">&copy; 2019-2020</p>
        </div>
    </form>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>

    <script src="../node_modules/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>

</body>

</html>