
<?php
session_start();
include 'dashboard_header.php';

$select = "SELECT * FROM candidates WHERE deleted_at = 1";
$candidates_list =mysqli_query($db_connect, $select);
$voter_assoc =mysqli_fetch_assoc($candidates_list);

$user_role = "SELECT * FROM voter WHERE id = $id";
$user_role_result = mysqli_query($db_connect,$user_role);
$user_role_assoc =mysqli_fetch_assoc($user_role_result);

?>
<div class="content-body">
	<?php if($user_assoc['role'] == 'admin') { ?>
    <div class="row">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h2>Soft Deleted Candidates List</h2>
                <a href="candidate_application.php" class="btn btn-success">Candidate List</a>
                </div>
                <div class="card-body">
                <?php if(isset($_SESSION["restore"])){ ?>
                    <div class="alert alert-success mt-3 text-capitalize"><?=$_SESSION["restore"]?></div>
                <?php } ?>

                <div class="card-body">
                <?php if(isset($_SESSION["delete"])){ ?>
                    <div class="alert alert-danger mt-3 text-capitalize"><?=$_SESSION["delete"]?></div>
                <?php } ?>
                <table class="table table-bordered">
                    <tr>
                    <th>SL</th>
                    <th>Name</th>
                    <th>District</th>
                    <th>Marka Name</th>
                    <th>Marka</th>
                    <th>Status</th>
                    <th>Action</th>
                    <th>Votes</th>
                    </tr>

                    <?php foreach($candidates_list as $sl=>$candidate_list) {?>
                    <tr>
                        <td><?=$sl+1?></td>
                        <td class="text-capitalize"><?=$candidate_list['name']?></td>
                        <td class="text-capitalize"><?=$candidate_list['district']?></td>
                        <td class="text-capitalize"><?=$candidate_list['marka_name']?></td>
                        <td>
                            <img src="uploads/marka/<?= $candidate_list['marka'] ?>" width="100" alt=""/>
                        </td>
                        <td>
                            <a class="btn btn-<?=$candidate_list['status'] == 0 ?'success' : 'light'?>" href="./candidate_status.php?candidate_id=<?=$candidate_list['id']?>">
                            <?=$candidate_list['status'] == 0 ?'Active' : 'Unactive'?>
                        </a>
                        </td>
                        <td>
                            <a href="candidate_restore.php?candidate_id=<?=$candidate_list['id']?>" class="btn btn-info shadow btn-xs sharp">
                            <i class="fa fa-pencil"></i>
                            <a href="candidate_delete.php?candidate_id=<?=$candidate_list['id']?>" class="btn btn-danger shadow btn-xs sharp">
                            <i class="fa fa-trash"></i>
                        </a>
                        </td>
                        <td class="text-capitalize"><?=$candidate_list['vote']?></td>
                    </tr>
                    <?php } ?>
                </table>
                </div>
            </div>
        </div>
    </div>
		<?php  } ?>
</div>
<?php
include 'dashboard_footer.php';


unset($_SESSION["name_err"]);
unset($_SESSION["district_err"]);
unset($_SESSION["marka_err"]);
unset($_SESSION["photo_err"]);
unset($_SESSION["success"]);
unset($_SESSION["delete"]);
unset($_SESSION["restore"]);
?>