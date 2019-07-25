<!doctype html>
<html lang="en">

<head>
    <title>This is Ecommerce</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="../../node_modules/bootstrap/dist/css/bootstrap.min.css">
</head>
<style>
    body {
        font-size: .875rem;
    }

    .feather {
        width: 16px;
        height: 16px;
        vertical-align: text-bottom;
    }

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 40px 0 0;
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .1);
    }

    .sidebar-sticky {
        position: relative;
        top: 0;
        height: calc(100vh - 48px);
        padding-top: .5rem;
        overflow-x: hidden;
        overflow-y: auto;

    }

    @supports ((position: -webkit-sticky) or (position: sticky)) {
        .sidebar-sticky {
            position: -webkit-sticky;
            position: sticky;
        }
    }

    .sidebar .nav-link {
        font-weight: 500;
        color: #333;
    }

    .sidebar .nav-link .feather {
        margin-right: 4px;
        color: #999;
    }

    .sidebar .nav-link:hover .feather,
    .sidebar .nav-link.active .feather {
        color: inherit;
    }

    .sidebar-heading {
        font-size: .75rem;
        text-transform: uppercase;
    }

    [role="main"] {
        padding-top: 48px;

    }


    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }
</style>

<body>

    <div class="container-fluid">
        <div class="row">
            <nav class="col-md-2 d-none d-md-block bg-light sidebar text-white">
                <div class="sidebar-sticky">
                    <ul class="nav flex-column">
                        <li class="nav-item">
                            <a class="nav-link" href="./home.php">
                                <span data-feather="home"></span><i class="fe fe-heart"></i>
                                Dashboard <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <!-- <li class="nav-item">
                            <a class="nav-link" href="./order.php">
                                <span data-feather="file"></span>
                                Orders
                            </a>
                        </li> -->

                        <li class="nav-item">
                            <a class="nav-link" href="./allusers.php">
                                <span data-feather="users"></span>
                                Register Users
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="./addpoll.php">
                                <span data-feather="plus-square"></span>
                                Add Poll
                            </a>
                        </li>
                    </ul>

                    <h6 class="sidebar-heading d-flex justify-content-between align-items-center px-3 mt-4 mb-1 text-muted">

                        <!-- <a class="d-flex align-items-center text-muted" href="#">
                            <span data-feather="plus-circle"></span>
                        </a> -->
                    </h6>
                    <ul class="nav flex-column mb-2">
                        <li class="nav-item">
                            <a class="nav-link" href="./editpoll.php">
                                <span data-feather="file-text"></span>
                                Edit Poll
                            </a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="../../inc/logout.php">
                                <span data-feather="file-text"></span>
                                Log Out
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>


            <!-- </div> -->

            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <?php
        if (isset($_GET['result'])) {
            if ($_GET['result'] == 'upsuccess') {
                echo '<div class="alert alert-danger text-center">User are block successfully</div>';
            }
            if ($_GET['result'] == 'notup') {
                echo '<div class="alert alert-warning text-center">User are Active successfully</div>';
            }
        }
        ?>
                <h5>Register Users</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                        <thead>
                            <tr>
                                <th>#ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Status</th>
                                <th>Delete</th>

                            </tr>
                        </thead>
                        <tbody>

                            <?php include('../inc/connection.php');
                            // $id = $_GET['id'];
                            $user_data = mysqli_query($connect, "SELECT * FROM user_info");

                            while ($user_slice = mysqli_fetch_array($user_data)) :

                                ?>

                                <tr>
                                    <th scope="row"><?php echo $user_slice['id']; ?></th>
                                    <td><?php echo $user_slice['user_name']; ?></td>

                                    <td><?php echo $user_slice['user_email']; ?></td>

                                    <td><?php echo $user_slice['pass']; ?></td>
                                    <!--    <td>  <a class="btn btn-danger" href='../inc/deleteuser.php?id=<?php echo $user_slice['id']; ?>'>Delete</a></td> -->
                                    <td><a class="btn btn-primary" href='../inc/userstatus.php?id=<?php echo $user_slice['id']; ?>'>
                                            <?php

                                            $approvestatus = $user_slice['approval'];

                                            if ($approvestatus == 1) {

                                                echo "Active";
                                            }else{
                                                echo "Block";
                                            }
                                            ?>
                                        </a></td>
                                    <td><a class="btn btn-danger" href='../inc/deleteuser.php?id=<?php echo $user_slice['id']; ?>'>Delete</a></td>


                                </tr>

                            <?php endwhile; ?>
                        </tbody>
                    </table>
                </div>

            </main>
        </div>
    </div>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="../../node_modules/jquery/dist/jquery.min.js"></script>
    <script src="../../node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- For icons -->
    <script src="../../node_modules/feather-icons/dist/feather.min.js"></script>
    <script>
        feather.replace()
    </script>
    <!-- / -->

</body>

</html>