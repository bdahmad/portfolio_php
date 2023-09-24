<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Login</title>

    <!-- Fontfaces CSS-->
    <link href="assets/admin/css/font-face.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="assets/admin/vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- assets/admin/Vendor CSS-->
    <link href="assets/admin/vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="assets/admin/css/theme.css" rel="stylesheet" media="all">

</head>

<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="assets/admin/images/icon/logo.png" alt="CoolAdmin">
                            </a>
                        </div>
                        <div class="login-form">
                           <?php
                              require_once('database/config.php');

                              $select = "SELECT  `user_email`, `password`FROM `tbl_user`";
                              $query = mysqli_query($con,$select);
                              $data = mysqli_fetch_assoc($query);

                              $u_email = $data['user_email'];
                              $u_pass = $data['password'];

                              if(!empty($_POST)){
                                 $email = $_POST['email'];
                                 $password = $_POST['password'];

                                    if($email == $u_email){
                                       if($password === $u_pass){
                                          header("Location: admin/index.php");
                                       }
                                       else{
                                          echo "password not matching.";
                                       }
                                    }
                                    else{
                                       echo "email not founded.";
                                    }

                              }
                           ?>
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full" type="email" required name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full" type="password" required name="password" placeholder="Password">
                                </div>
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">sign in</button>
                                
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="assets/admin/vendor/jquery-3.2.1.min.js"></script>
    <!-- Bootstrap JS-->
    <script src="assets/admin/vendor/bootstrap-4.1/popper.min.js"></script>
    <script src="assets/admin/vendor/bootstrap-4.1/bootstrap.min.js"></script>
    <!-- assets/admin/Vendor JS       -->
    <script src="assets/admin/vendor/slick/slick.min.js">
    </script>
    <script src="assets/admin/vendor/wow/wow.min.js"></script>
    <script src="assets/admin/vendor/animsition/animsition.min.js"></script>
    <script src="assets/admin/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
    </script>
    <script src="assets/admin/vendor/counter-up/jquery.waypoints.min.js"></script>
    <script src="assets/admin/vendor/counter-up/jquery.counterup.min.js">
    </script>
    <script src="assets/admin/vendor/circle-progress/circle-progress.min.js"></script>
    <script src="assets/admin/vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="assets/admin/vendor/chartjs/Chart.bundle.min.js"></script>
    <script src="assets/admin/vendor/select2/select2.min.js">
    </script>

    <!-- Main JS-->
    <script src="assets/admin/js/main.js"></script>

</body>

</html>
<!-- end document-->