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
    <title>Smart Hidroponik Register</title>

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

<?php
include('conn.php');

error_reporting(0);
 
session_start();

//jika user sudah pernah login
if (isset($_SESSION['user'])) {
    header("Location: index.php");
}

//mengecek jika data input sudah diisi semua dan tombol register sudah ditekan maka perintah if dilaksanakan
if( isset($_POST['submit']) && isset($_POST['user']) && isset($_POST['pass']) && isset($_POST['cpass']) ){
    $nama = $_POST['nama'];
    $user = $_POST['user']; 
    $pass = md5($_POST['pass']);
    $cpass = md5($_POST['cpass']);
    
    //Cek jika password sama dengan confirm password
    if($pass == $cpass){ //jika pass sama

        //mengecek apakah value user sudah ada di database
        $sql = "SELECT * FROM user WHERE user='$user'";
        $result = mysqli_query($conn, $sql);

        if($result->num_rows > 0){ //jika username sudah ada di database
            echo "<script>alert('Username sudah digunakan')</script>";
        }else{ //jika belum terdaftar
            
            //Memasukkan data input ke database
            $sql = "INSERT INTO user (nama, user, pass)
                    VALUES ('$nama', '$user', '$pass')";
            $result = mysqli_query($conn, $sql);
            if($result){ //jika berhasil dimasukkan ke database
                ?>

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
                        <form class="login100-form validate-form" action=register.php method="POST">
                            <span class="login100-form-title">
                                Registration Success
                            </span>

                            <span class="login100-form-title">
                                Anda berhasil didaftarkan. Silahkan hubungi admin untuk konfirmasi.
                            </span>
                            
                            <div class="container-login100-form-btn">
                                <a href="login.php" class="login100-form-btn btn-primary">
                                    Login
                                </a>
                            </div>

                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Pendaftaran<a href="register.php"
                                        class="text-primary ms-1">Register</a></p>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>

    <?php
            }else{ //jika gagal dimasukkan ke database
                echo "<script>alert('Maaf, terjadi kesalahan penyimpanan data')</script>";
            }        
        }
    }else{ //jika pass beda
        echo "<script>alert('Password Tidak Sesuai')</script>";
    }
}else{
    ?>



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
                        <form class="login100-form validate-form" action=register.php method="POST">
                            <span class="login100-form-title">
                                Registration
                            </span>
                            <div class="wrap-input100 validate-input input-group"
                                data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="mdi mdi-account" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text"
                                    placeholder="Nama lengkap" name="nama" required
                                    value="<?php echo $_POST['nama'];?>">
                            </div>
                            <div class="wrap-input100 validate-input input-group"
                                data-bs-validate="Valid email is required: ex@abc.xyz">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-email" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="text"
                                    placeholder="Username" name=user required value="<?php echo $_POST['user'];?>">
                            </div>
                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="password"
                                    placeholder="Password" name=pass required value="<?php echo $_POST['pass'];?>">
                            </div>

                            <div class="wrap-input100 validate-input input-group" id="Password-toggle">
                                <a href="javascript:void(0)" class="input-group-text bg-white text-muted">
                                    <i class="zmdi zmdi-eye" aria-hidden="true"></i>
                                </a>
                                <input class="input100 border-start-0 ms-0 form-control" type="password"
                                    placeholder="Confirm Password" name=cpass required
                                    value="<?php echo $_POST['cpass'];?>">
                            </div>

                            <div class="container-login100-form-btn">
                                <button name="submit" class="login100-form-btn btn-primary">
                                    Register
                                    </buttonn>
                            </div>
                            <div class="text-center pt-3">
                                <p class="text-dark mb-0">Already have account?<a href="login.php"
                                        class="text-primary ms-1">Sign In</a></p>
                            </div>

                        </form>
                    </div>
                </div>
                <!-- CONTAINER CLOSED -->
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <?php } ?>

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