<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en" class="h-100">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Election Voting System Dashboard</title>
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
    <link href="./css/style.css" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&family=Roboto:wght@100;300;400;500;700;900&display=swap" rel="stylesheet">
</head>

<body class="h-100">
    <div class="authincation h-100">
        <div class="container h-100">
            <div class="row justify-content-center h-100 align-items-center">
                <div class="col-md-12">
                    <form action="registration_post.php" method="POST" enctype="multipart/form-data">
                        <div class="authincation-content">
                                <h3 class="text-center text-white">Sign up your account</h3>
                                            <?php if(isset($_SESSION["success"])){ ?>
                                            <div class="alert alert-warning mt-3 text-capitalize ">
                                                <?= $_SESSION["success"]?>
                                            </div>
                                            <?php }?>

                                            <?php if(isset($_SESSION["logout_frst"])){ ?>
                                            <div class="alert alert-warning mt-3 text-capitalize ">
                                                <?= $_SESSION["logout_frst"]?>
                                            </div>
                                            <?php }?>
                            <div class="row no-gutters">
                                <div class="col-xl-6">
                                    <div class="auth-form">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Name*</strong></label>
                                            <input type="text" class="form-control" name="name" value="<?= isset($_SESSION['old_name'])?$_SESSION['old_name']:'' ?>">
                                            
                                            <?php if(isset($_SESSION["name_err"])){ ?>
                                            <div class="alert alert-warning mt-3 text-capitalize ">
                                                <?= $_SESSION["name_err"]?>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Father's Name*</strong></label>
                                            <input type="text" class="form-control" name="fathers_name" value="<?= isset($_SESSION['old_fname'])?$_SESSION['old_fname']:'' ?>">
                                            
                                            <?php if(isset($_SESSION["fname_err"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["fname_err"]?>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Mother's Name*</strong></label>
                                            <input type="text" class="form-control" name="mothers_name" value="<?= isset($_SESSION['old_mname'])?$_SESSION['old_mname']:'' ?>">

                                            <?php if(isset($_SESSION["mname_err"])){ ?>
                                            <div class="alert alert-warning mt-3 text-capitalize ">
                                                <?= $_SESSION["mname_err"]?>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Email*</strong></label>
                                            <input type="email" class="form-control" name="email" placeholder="hello@example.com" value="<?= isset($_SESSION['old_email'])?$_SESSION['old_email']:'' ?>">
                                            
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
                                        <!-- <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Password*</strong></label>
                                            <input type="password" class="form-control" name="password">
                                        </div> -->
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Phone*</strong></label>
                                            <input type="text" class="form-control" name="phone" value="<?= isset($_SESSION['old_phone'])?$_SESSION['old_phone']:'' ?>">
                                            
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
                                    </div>
                                </div>
                                <div class="col-xl-6">
                                    <div class="auth-form">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Division*</strong></label>
                                            <input type="text" class="form-control" name="division" value="<?= isset($_SESSION['old_division'])?$_SESSION['old_division']:'' ?>">
                                            
                                            <?php if(isset($_SESSION["division_err"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["division_err"]?>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>District*</strong></label>
                                            <input type="text" class="form-control" name="district" value="<?= isset($_SESSION['old_district'])?$_SESSION['old_district']:'' ?>">
                                            
                                            <?php if(isset($_SESSION["district_err"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["district_err"]?>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Sub-District*</strong></label>
                                            <input type="text" class="form-control" name="sub_district" placeholder="Upazila/Thana" value="<?= isset($_SESSION['old_sub_district'])?$_SESSION['old_sub_district']:'' ?>">
                                            
                                            <?php if(isset($_SESSION["sub_district"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["sub_district"]?>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Date Of Birth*</strong></label>
                                            <input type="date" class="form-control" name="date" value="<?= isset($_SESSION['old_date'])?$_SESSION['old_date']:'' ?>">

                                            <?php if(isset($_SESSION["date_err"])){ ?>
                                            <div class="alert alert-warning mt-3 text-capitalize ">
                                                <?= $_SESSION["date_err"]?>
                                            </div>
                                            <?php }?>
                                        </div>
                                        <!-- <div class="col-lg-12"> -->
                                            <div class="form-group">
                                                <?php 
                                                    $gender = "";
                                                    if(isset($_SESSION["old_gender"])){
                                                    $gender = $_SESSION["old_gender"];
                                                }
                                                ?>
                                                <label class="mb-1 text-white"><strong>Gender*</strong></label>
                                                <select name="gender" class="form-control" id="">
                                                    <option value="">Select Your Gender</option>
                                                    <option value="male" <?=($gender == 'male' ? 'selected':'')?>>
                                                        Male</option>
                                                    <option value="female"
                                                        <?=($gender == 'female' ? 'selected':'')?>>Female</option>
                                                </select>
                                                <?php if(isset($_SESSION["gender_err"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["gender_err"]?>
                                                </div>
                                                <?php }?>
                                            </div>
                                        <!-- </div> -->
                                        <div class="form-group">
                                            <div class="custom-file">
                                                <label class="mb-1 text-white"><strong>Upload photo*</strong></label>
                                                <input type="file" class="form-control" name="photo">
                                                
                                                <?php if(isset($_SESSION["photo_err"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["photo_err"]?>
                                                </div>
                                                <?php }?>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 m-auto">
                                <div class="text-center">
                                    <button type="submit" class="btn bg-white text-primary btn-block">Sign me up</button>
                                </div>
                            </div>
                            <div class="new-account text-center">
                                <p class="text-white">Already have an account? <a class="text-white" href="login.php">Sign in</a></p>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!--**********************************
	Scripts
***********************************-->
<!-- Required vendors -->
<script src="./vendor/global/global.min.js"></script>
<script src="./vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script>
<script src="./js/custom.min.js"></script>
<script src="./js/deznav-init.js"></script>

</body>
</html>

<?php
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
unset($_SESSION["logout_frst"]);


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
?>