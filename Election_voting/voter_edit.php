<?php
session_start();
include 'db.php';
include 'dashboard_header.php';


$id = $_GET['id'];
$user = "SELECT * FROM voter WHERE id='$id'";
$user_res = mysqli_query($db_connect, $user);
$user_assoc = mysqli_fetch_assoc($user_res);
?>
<div class="content-body">
<form action="voter_edit_post.php?id=<?= $user_assoc['id']?>" method="POST">
        <div class="col-xl-8 m-auto">
                    <?php if(isset($_SESSION["update"])){ ?>
                    <div class="alert alert-success mt-3 text-capitalize ">
                        <?= $_SESSION["update"]?>
                    </div>
                    <?php }?>
            <div class="auth-form">
                <div class="form-group">
                    <label class="mb-1  "><strong>Name*</strong></label>
                    <input type="text" class="form-control" name="name" value="<?=$user_assoc['name']?>">
                    
                    <?php if(isset($_SESSION["name_err"])){ ?>
                    <div class="alert alert-warning mt-3 text-capitalize ">
                        <?= $_SESSION["name_err"]?>
                    </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Father's Name*</strong></label>
                    <input type="text" class="form-control" name="fathers_name" value="<?=$user_assoc['father_name']?>">
                    
                    <?php if(isset($_SESSION["fname_err"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["fname_err"]?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Mother's Name*</strong></label>
                    <input type="text" class="form-control" name="mothers_name" value="<?=$user_assoc['mother_name']?>">

                    <?php if(isset($_SESSION["mname_err"])){ ?>
                    <div class="alert alert-warning mt-3 text-capitalize ">
                        <?= $_SESSION["mname_err"]?>
                    </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Email*</strong></label>
                    <input type="email" class="form-control" name="email" placeholder="hello@example.com" value="<?=$user_assoc['email']?>">
                    
                    <?php if(isset($_SESSION["email_err"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["email_err"]?>
                        </div>
                    <?php }?>

                    
                    <?php if(isset($_SESSION["email_exist"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["email_exist"]?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>NID no*</strong></label>
                    <input type="text" class="form-control" name="nid" value="<?=$user_assoc['nid_no']?>">
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Phone*</strong></label>
                    <input type="text" class="form-control" name="phone" value="<?=$user_assoc['phone']?>">
                    
                    <?php if(isset($_SESSION["phone_err"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["phone_err"]?>
                        </div>
                    <?php }?>

                    <?php if(isset($_SESSION["phone_exist"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["phone_exist"]?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Division*</strong></label>
                    <input type="text" class="form-control" name="division" value="<?=$user_assoc['division']?>">
                    
                    <?php if(isset($_SESSION["division_err"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["division_err"]?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>District*</strong></label>
                    <input type="text" class="form-control" name="district" value="<?=$user_assoc['district']?>">
                    
                    <?php if(isset($_SESSION["district_err"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["district_err"]?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Sub-District*</strong></label>
                    <input type="text" class="form-control" name="sub_district" placeholder="Upazila/Thana" value="<?=$user_assoc['sub_district']?>">
                    
                    <?php if(isset($_SESSION["sub_district"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["sub_district"]?>
                        </div>
                    <?php }?>
                </div>
                <div class="form-group">
                    <label class="mb-1  "><strong>Date Of Birth*</strong></label>
                    <input type="date" class="form-control" name="date" value="<?=$user_assoc['birth_date']?>">

                    <?php if(isset($_SESSION["date_err"])){ ?>
                    <div class="alert alert-warning mt-3 text-capitalize ">
                        <?= $_SESSION["date_err"]?>
                    </div>
                    <?php }?>
                </div>
                <!-- </div> -->
                <div class="form-group">
                    <div class="custom-file">
                        <label class="mb-1  "><strong>Upload photo*</strong></label>
                        <input type="file" class="form-control" name="photo">
                        
                        <?php if(isset($_SESSION["photo_err"])){ ?>
                        <div class="alert alert-warning mt-3 text-capitalize ">
                            <?= $_SESSION["photo_err"]?>
                        </div>
                        <?php }?>
                    </div>
                    <div class="mt-5">
                        <img src="uploads/voter/<?= $user_assoc['photo'] ?>" width="150" alt=""/>
                    </div>
                </div>
                <div class="mt-3">
                    <div class="text-center text-white">
                        <button type="submit" class="btn btn-primary btn-block">Update voter</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>


<?php

include 'dashboard_footer.php';

// error section

unset($_SESSION["name_err"]);
unset($_SESSION["fname_err"]);
unset($_SESSION["mname_err"]);
unset($_SESSION["email_err"]);
unset($_SESSION["division_err"]);
unset($_SESSION["district_err"]);
unset($_SESSION["sub_district"]);
unset($_SESSION["date_err"]);
unset($_SESSION["gender_err"]);
unset($_SESSION["photo_err"]);
unset($_SESSION["phone_err"]);
unset($_SESSION["success"]);
unset($_SESSION["phone_exist"]);
unset($_SESSION["email_exist"]);


// old value section

unset($_SESSION["old_name"]);
unset($_SESSION["old_fname"]);
unset($_SESSION["old_mname"]);
unset($_SESSION["old_email"]);
unset($_SESSION["old_division"]);
unset($_SESSION["old_district"]);
unset($_SESSION["old_sub_district"]);
unset($_SESSION["old_date"]);
unset($_SESSION["old_gender"]);
unset($_SESSION["old_phone"]);
unset($_SESSION["success"]);
unset($_SESSION["update"]);
?>
