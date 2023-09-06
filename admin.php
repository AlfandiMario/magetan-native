<?php
session_start();

if (!isset($_SESSION['user'])) {
    header("Location: login.php");
}else{
    include "conn.php";
    $user = $_SESSION['user'];
    $sql_user = "SELECT * FROM user WHERE user='$user' AND level='1'";
    $result_user = $conn->query($sql_user);
    $data_user = mysqli_fetch_assoc($result_user);

    if($data_user['level'] == '1'){

    $sql_all_user = "SELECT * FROM user";
    $result_all_user = $conn->query($sql_all_user);


//==============================================================================================================================================
include "head_html.php";
?>

<!-- PAGE-HEADER -->
<div class="page-header">
    <h1 class="page-title">Menu Admin</h1>
    <a href="index.php"><h5>Home</h5></a>
</div>
<!-- PAGE-HEADER END -->


<div class="row">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Daftar User</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table text-nowrap text-md-nowrap mb-0">
                        <thead>
                            <tr>
                                <th>Nama</th>
                                <th>Username</th>
                                <th>Status</th>
                                <th>Level</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if ($result_all_user->num_rows > 0) { 
                                while($row = $result_all_user->fetch_assoc()) {
                            ?>

                            <tr>
                                <td><?php echo $row['nama'] ?></td>
                                <td><?php echo $row['user'] ?></td>
                                <td>
                                    <?php 
                                        $id = $row['id'];
                                        if($row['status'] == '1'){
                                            echo '<span class="badge bg-success badge-sm  me-1 mb-1 mt-1">Aktif</span>';
                                        }else{
                                            echo '<a onclick="return confirm('."'Anda yakin?'".');" href="set_aktifasi_user.php?id=' .$id. '" class="btn btn-sm btn-danger">Aktifkan</a>';
                                        } 
                                    ?>

                                </td>
                                <td>
                                    <?php 
                                        if($row['level'] == '1'){
                                            echo '<i class="fa fa-user-secret" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-user-secret" aria-label="fa fa-user-secret"></i> Admin';
                                        }else{
                                            echo '<i class="fa fa-user-o" data-bs-toggle="tooltip" title="" data-bs-original-title="fa fa-user-o" aria-label="fa fa-user-o"></i> User';
                                        } 
                                    ?>
                                </td>
                            </tr>
                            <?php }
                        } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>









<?php
include "footer_html.php";
//==============================================================================================================================================
    }else{
    header("Location: index.php");
    }
}
?>