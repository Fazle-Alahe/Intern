
<?php
session_start();
require 'db.php';

$id = $_GET['id'];
$select_user = "SELECT * FROM user WHERE id=$id";
$select_users_result = mysqli_query($db_connect, $select_user);
$fetch_assoc = mysqli_fetch_assoc($select_users_result);

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
                        <h2>Edit User</h2>
                    </div>
                    <div class="card-body">
                    <div class="text-danger">
                    <?php 
                        if(isset($_SESSION['info_err'])){
                            echo $_SESSION['info_err'];
                        }
                        ?>
                    </div>
                    <div class="text-success">
                    <?php 
                        if(isset($_SESSION['update'])){
                            echo $_SESSION['update'];
                        }
                        ?>
                    </div>
                        <form action="edit_user.php?id=<?= $id ?>" method="POST">
                            <div class="form-group">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Name</label>
                                <input type="text" class="form-control" name="name" value="<?=$fetch_assoc['name']?>">
                                <small id="emailHelp" class="form-text text-muted"></small>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" name="password" value="<?=$fetch_assoc['password']?>"
                                <small id="emailHelp" class="form-text text-muted"></small>
                                <div class="text-danger">
                                <?php 
                                    if(isset($_SESSION['wrong_pass'])){
                                        echo $_SESSION['wrong_pass'];
                                    }
                                ?>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="exampleInputEmail1">Confirm Password</label>
                                <input type="password" class="form-control" name="confirm_password">
                                <small id="emailHelp" class="form-text text-muted"></small>
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

unset($_SESSION['info_err']);
unset($_SESSION['wrong_pass']);
unset($_SESSION['update']);
?>