<?php 
include "conn.php";
include "func.php";

error_reporting(0);
 
session_start();

//jika user sudah pernah login
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}

//jika belum login mengisi form login
if (isset($_POST['submit']) && isset($_POST['user']) && isset($_POST['pass'])){
    $user = $_POST['user'];
    $pass = md5($_POST['pass']); 
 
    $sql = "SELECT * FROM user WHERE user='$user' AND pass='$pass' AND status='1'";
    $result = mysqli_query($conn, $sql);
    if ($result->num_rows > 0) { //jika ada data user di database
        $row = mysqli_fetch_assoc($result);
        $_SESSION['user'] = $row['user'];
        header("Location: index.php");
    } else {
        echo "<script>alert('Username atau password Anda salah atau akun belum dikonfirmasi. Silahkan coba lagi!')</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <!-- META DATA -->
    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Sash – Bootstrap 5  Admin & Dashboard Template">
    <meta name="author" content="Spruko Technologies Private Limited">
    <meta name="keywords"
        content="admin,admin dashboard,admin panel,admin template,bootstrap,clean,dashboard,flat,jquery,modern,responsive,premium admin templates,responsive admin,ui,ui kit.">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="assets/images/brand/favicon.ico" />

    <!-- TITLE -->
    <title>Smart Hidroponik Login</title>

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="assets/css/style.css" rel="stylesheet" />
    <link href="assets/css/dark-style.css" rel="stylesheet" />
    <link href="assets/css/transparent-style.css" rel="stylesheet">
    <link href="assets/css/skin-modes.css" rel="stylesheet" />

    <!--- FONT-ICONS CSS -->
    <link href="assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all" href="assets/colors/color1.css" />

</head>

<body>


    <div class="login-img">

        <!-- GLOABAL LOADER -->
        <div id="global-loader">
            <img src="assets/images/loader.svg" class="loader-img" alt="Loader">
        </div>
        <!-- /GLOABAL LOADER -->

        <!-- PAGE -->
        <div class="page">
            <div class="">

                <!-- CONTAINER OPEN -->

                <div class="container-login100">
                    <div class="wrap-login100 p-6">
                        <form class="login100-form validate-form" action=login.php method="POST">
                            <span class="login100-form-title">
                                Login
                            </span>
                            <div class="wrap-input100 validate-input input-group"
                                data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text"
                                    placeholder="Username" name=user required>
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="password"
                                    placeholder="Password" name=pass required>
                            </div>

                            <div class="container-login100-form-btn">
                                <button name="submit" class="login100-form-btn btn-primary">
                                    Login
                                    </buttonn>
                            </div>
                            
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Belum punya akun?<a href="register.php"
                                        class="text-primary ms-1">Register</a></p>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

        <!-- JQUERY JS -->
        <script src="assets/js/jquery.min.js"></script>

        <!-- BOOTSTRAP JS -->
        <script src="assets/plugins/bootstrap/js/popper.min.js"></script>
        <script src="assets/plugins/bootstrap/js/bootstrap.min.js"></script>

        <!-- SHOW PASSWORD JS -->
        <script src="assets/js/show-password.min.js"></script>

        <!-- Perfect SCROLLBAR JS-->
        <script src="assets/plugins/p-scroll/perfect-scrollbar.js"></script>

        <!-- Color Theme js -->
        <script src="assets/js/themeColors.js"></script>

        <!-- CUSTOM JS -->
        <script src="assets/js/custom.js"></script>
</body>

</html>