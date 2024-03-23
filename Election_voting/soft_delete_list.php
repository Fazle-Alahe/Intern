<?php 
session_start();
include 'db.php';
require 'dashboard_header.php';

$select_users = "SELECT * FROM voter WHERE deleted_at=1";
$select_users_res = mysqli_query($db_connect, $select_users);

$id = $_SESSION['id'];
$user = "SELECT * FROM voter WHERE id='$id'";
$user_res = mysqli_query($db_connect, $user);
$user_assoc = mysqli_fetch_assoc($user_res);

?>
<div class="content-body">
    <?php
    if($user_assoc['role']=='admin'){?> 
    <div class="col-lg-12">
        <div class="card">
            <div class="card-header justify-content-space-between">
                <h3 class="card-title">Soft Delete List</h3>
                <a href="voter_list.php" class="btn btn-success">Voter List</a>
            </div>
                <?php if(isset($_SESSION["restore"])){ ?>
                <div class="alert alert-success mt-3 text-capitalize ">
                    <?= $_SESSION["restore"]?>
                </div>
                <?php }?>

                
                <?php if(isset($_SESSION["delete"])){ ?>
                    <div class="alert alert-danger mt-3 text-capitalize ">
                        <?= $_SESSION["delete"]?>
                    </div>
                <?php }?>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover table-responsive-sm">
                        <tr>
                            <th>SL</th>
                            <th>Name</th>
                            <th>Phone</th>
                            <th>NID no</th>
                            <th>Photo</th>
                            <th>Action</th>
                        </tr>
                        <?php
                        foreach($select_users_res as $sl=> $users){?> 
                            <tr>
                                <th><?= $sl+1?></th>
                                <td><?= $users['name']?></td>
                                <td><?= $users['phone']?></td>
                                <td><?= $users['nid_no']?></td>
                                <td><?= $users['nid_no']?></td>
                                <td>
                                    <div class="d-flex">
                                        <a href="restore.php?id=<?= $users['id']?>" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="icon fa fa-user-plus"></i></a>
                                        <a href="voter_permanent_delete.php?id=<?=$users['id']?>" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></a>
                                    </div>
                                </td>
                            </tr>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
        <!-- /# card -->
    </div>
    <?php }?>
</div>

<?php
include 'dashboard_footer.php';


unset($_SESSION["restore"]);
unset($_SESSION["delete"]);
?>