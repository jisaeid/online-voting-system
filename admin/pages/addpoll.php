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

    /*
 * Sidebar
 */

    .sidebar {
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
        z-index: 100;
        padding: 35px 0 0;
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

    /*
 * Content
 */

    [role="main"] {
        padding-top: 40px;
        /* Space for fixed navbar */
    }

    /*
 * Navbar
 */

    .navbar-brand {
        padding-top: .75rem;
        padding-bottom: .75rem;
        font-size: 1rem;
        background-color: rgba(0, 0, 0, .25);
        box-shadow: inset -1px 0 0 rgba(0, 0, 0, .25);
    }

    td {
        padding-left: 0 !important;
        padding-right: 0 !important;
        width: 95%;
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
            <!-- content area start -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-5">
                <div class="container">
                    <?php
                    if (isset($_GET['result'])) {
                        if ($_GET['result'] == 'notaddpoll') {
                            echo '<div class="alert alert-danger text-center"><strong>Something Worng ! </strong> poll not add.</div>';
                        }
                    }
                    if (isset($_GET['result'])) {
                        if ($_GET['result'] == 'addpoll') {
                            echo '<div class="alert alert-success text-center"><strong>Successfully add this poll.</strong></div>';
                        }
                    }

                    ?>
                    <form action="../inc/addpoll.php" method="POST">

                        <input type="text" name="poolname" class="form-control mb-3" placeholder="Enter Pool Name">
                        <input type="text" name="tagline" class="form-control mb-3" placeholder="Enter Tag Line">
                        <input type="date" name="startdate" class="form-control" placeholder="Enter Start Date">
                        <small id="emailHelp" class="form-text text-muted mb-4">Choose start date</small>
                        <input type="date" name="enddate" class="form-control" placeholder="Enter End Date">
                        <small id="emailHelp" class="form-text text-muted mb-4">Choose end date</small>
                        <small id="emailHelp" class="form-text text-muted">Add item :</small>
                        <table class="table table-borderless" id="dynamic_field">
                            <tr>
                                <td><input type="text" name="name[]" placeholder="Enter your choice" class="form-control name_list" /></td>
                                <td><button type="button" name="add" id="add" class="btn btn-success" style="float: right;">+</button>
                                </td>
                            </tr>
                        </table>
                        <button class="btn btn-primary btn-block" type="submit">Submit</button>
                    </form>
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

    <script>
        $(document).ready(function() {
            var i = 1;
            $('#add').click(function() {
                i++;
                $('#dynamic_field').append('<tr id="row' + i +
                    '"><td><input type="text" name="name[]" placeholder="Enter your Name" class="form-control name_list" /></td><td><button style="float: right;" type="button" name="remove" id="' +
                    i + '" class="btn btn-danger btn_remove">X</button></td></tr>');
            });

            $(document).on('click', '.btn_remove', function() {
                var button_id = $(this).attr("id");
                $('#row' + button_id + '').remove();
            });

            $('#submit').click(function() {
                $.ajax({
                    url: "name.php",
                    method: "POST",
                    data: $('#add_name').serialize(),
                    success: function(data) {
                        alert(data);
                        $('#add_name')[0].reset();
                    }
                });
            });

        });
    </script>

</body>

</html>