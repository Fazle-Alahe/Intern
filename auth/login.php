
<?php
    session_start();

    if(isset($_SESSION['loged_in'])){
        header('location:dashboard.php');
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"> -->
    <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-6 m-auto">
                <div class="card">
                    <div class="card-header">
                        <h2>Login</h2>
                    </div>
                    <div class="card-body">
                        <form action="login_post.php" method="POST">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Email address</label>
                                <input type="email" class="form-control" name="email">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                <div class="text-danger">
                                <?php 
                                    if(isset($_SESSION['exist'])){
                                        echo $_SESSION['exist'];
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" name="password">
                                <small id="emailHelp" class="form-text text-muted"></small>
                                <div class="text-danger">
                                <?php 
                                    if(isset($_SESSION['wrong_pass'])){
                                        echo $_SESSION['wrong_pass'];
                                    }
                                ?>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>

<?php 

unset($_SESSION['exist']);
unset($_SESSION['wrong_pass']);
?>