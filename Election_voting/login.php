<?php
session_start();

if(isset($_SESSION['loged_in'])){
    header('location:dashboard.php');
}
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
                <div class="col-md-6">
                    <div class="authincation-content">
                        <div class="row no-gutters">
                            <div class="col-xl-12">
                                <div class="auth-form">
									<!-- <div class="text-center mb-3">
										<a href="index.html"><img src="images/logo-full.png" alt=""></a>
									</div> -->
                                    <h4 class="text-center mb-4 text-white">Sign in your account</h4>
                                    <form action="login_post.php" method="POST">
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Name</strong></label>
                                            <input type="text" class="form-control" name="name" value="<?= isset($_SESSION['old_name'])?$_SESSION['old_name']:'' ?>">

                                            <?php if(isset($_SESSION["name_err"])){ ?>
                                            <div class="alert alert-warning mt-3 text-capitalize ">
                                                <?= $_SESSION["name_err"]?>
                                            </div>
                                            <?php }?>

                                            
                                            <?php if(isset($_SESSION["name_exist"])){ ?>
                                                <div class="alert alert-warning mt-3 text-capitalize ">
                                                    <?= $_SESSION["name_exist"]?>
                                                </div>
                                            <?php }?>
                                        </div>
                                        <div class="form-group">
                                            <label class="mb-1 text-white"><strong>Phone Number</strong></label>
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
                                        <div class="text-center">
                                            <button type="submit" class="btn bg-white text-primary btn-block">Sign Me In</button>
                                        </div>
                                    </form>
                                    <div class="new-account mt-3">
                                        <p class="text-white">Don't have an account? <a class="text-white" href="registration.php">Sign up</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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

unset($_SESSION["name_err"]);
unset($_SESSION["name_exist"]);
unset($_SESSION["phone_err"]);
unset($_SESSION["phone_exist"]);

// old value
unset($_SESSION["old_name"]);
unset($_SESSION["old_phone"]);
?>