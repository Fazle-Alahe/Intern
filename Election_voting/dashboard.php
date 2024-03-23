<?php
session_start();
include 'dashboard_header.php';

$id = $_SESSION['id'];
$user = "SELECT * FROM voter WHERE id='$id'";
$user_res = mysqli_query($db_connect, $user);
$user_assoc = mysqli_fetch_assoc($user_res);


$voter_candidate_select = "SELECT * FROM candidates";
$candidate_details = mysqli_query($db_connect, $voter_candidate_select);

$candidate_select = "SELECT * FROM candidates WHERE status = 0";
$candidates_list =mysqli_query($db_connect, $candidate_select);


$voter_select = "SELECT * FROM votes WHERE voter_id = $id";
$voter_select_res = mysqli_query($db_connect, $voter_select);
$voter_select_assoc = mysqli_fetch_assoc($voter_select_res);

?>
    <!--**********************************
        Content body start
    ***********************************-->
    
    <div class="content-body">
        <!-- row -->
    <?php 
        if(!$user_assoc['role'] == 'admin'){?>
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header text-center">
                            <h3 class="text-center">ID Card</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <img src="uploads/voter/<?= $user_assoc['photo'] ?>" width="200" alt=""/>
                                </div>
                                <div class="col-lg-8">
                                    <div class="basic-form">
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text labelSz">Name</span>
                                            </div>
                                            <input disabled type="text" class="form-control inputSz" value="<?= $user_assoc['name'] ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text labelSz">Father</span>
                                            </div>
                                            <input disabled type="text" class="form-control inputSz" value="<?= $user_assoc['father_name'] ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text labelSz">Phone</span>
                                            </div>
                                            <input disabled type="text" class="form-control inputSz" value="<?= $user_assoc['phone'] ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text labelSz">Birth-date</span>
                                            </div>
                                            <input disabled type="text" class="form-control inputSz" value="<?= $user_assoc['birth_date'] ?>">
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text labelSz">NID no</span>
                                            </div>
                                            <input disabled type="text" class="form-control inputSz" value="<?= $user_assoc['nid_no'] ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <?php if($user_assoc['status'] == 0) { ?>
                                <h3>Vote For Your Favourite Candidate</h3>
                            <?php } ?>
                            <?php if($user_assoc['status'] == 1) { ?>
                                <h3>You Voted To</h3>
                            <?php } ?>
                        </div>
                        <div class="card-body">
                        
                        <?php if($user_assoc['status'] == 0) { ?>
                            <form action="vote_post.php" method="POST">
                        
                                    <table class="table table-bordered">
                                    <tr>
                                        <th>SL</th>
                                        <th>Name</th>
                                        <th>District</th>
                                        <th>Marka Name</th>
                                        <th>Marka</th>
                                        <th>Action</th>
                                    </tr>
            
                                    <?php foreach($candidates_list as $sl=>$candidate_list) { ?>
                                    <tr>
                                        <td><?=$sl+1?></td>
                                        <td class="text-capitalize"><?=$candidate_list['name']?></td>
                                        <td class="text-capitalize"><?=$candidate_list['district']?></td>
                                        <td class="text-capitalize"><?=$candidate_list['marka_name']?></td>
                                        <td>
                                            <img src="uploads/marka/<?=$candidate_list['marka']?>" width="50" alt="">
                                        </td>
                                        <td>
                                            <a href="vote_post.php?id=<?=$id?>&candidate_id=<?=$candidate_list['id']?>&name=<?=$candidate_list['name']?>
                                            &marka_name=<?=$candidate_list['marka_name']?>&marka=<?=$candidate_list['marka']?>&district=<?=$candidate_list['district']?>" class="btn btn-info">Vote Now</a>
                                        </td>
                                    </tr>
                                    <?php }?>
                                </table>
                            </form>
                            <?php } ?>	
                                            
                            <?php if($user_assoc['status'] == 1) { ?>
                                <div class="row">
                                    <div class="col-lg-12 text-center">
                                        <img src="uploads/marka/<?=$voter_select_assoc['marka']?>" width="200" alt="">
                                        <div class="voting_details mt-3 text-capitalize">
                                            <h3>Name:- <?=$voter_select_assoc['name']?></h3>
                                            <p>Symbol Name:- <?=$voter_select_assoc['marka_name']?></p>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
			    </div>
		    </div>
        </div>
	<?php } ?>
	<?php if($user_assoc['role'] == 'admin') { ?>
		<div class="row">
			<div class="col-lg-12">
				<div class="card-header">
					<h3>Voter Candidate's info</h3>
				</div>
				<div class="card-body">
					<div class="row">
					<?php foreach($candidate_details as $candidates) {?>
							<div class="col-lg-4">
								<div class="card">
									<div class="card-header d-flex justify-content-center">
										<img src="uploads/marka/<?=$candidates['marka']?>" width="150" alt="">
									</div>
									<div class="card-body">
										<h4 class="text-capitalize">Name:- <?=$candidates['name']?></h4>
										<span class="text-capitalize">Marka Name:- <?=$candidates['marka_name']?></span>
										<strong class="d-block">Votes:- <?=$candidates['marka']?></strong>
										<a>
											Status:- <span class="text-<?=$candidates['status'] == 0 ?'success' : 'danger'?>"><?=$candidates['status'] == 0 ?'Active' : 'Deactivate'?></span>
                  	                    </a>
                                        <h4>Total votes: <?=$candidates['vote']?></h4>
									</div>
								</div>
							</div>
							<?php  } ?>
						</div>
				</div>
			</div>
		</div>
	<?php } ?>
    </div>
    
<?php
include 'dashboard_footer.php';
?>