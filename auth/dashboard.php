
<?php
session_start();
require 'db.php'; 
require 'login_check.php'; 

$id = $_SESSION['id'];
$select_users = "SELECT * FROM user WHERE id !=$id AND status=0";
$select_users_result = mysqli_query($db_connect, $select_users);

$select_users1 = "SELECT * FROM user WHERE id =$id";
$select_users_result1 = mysqli_query($db_connect, $select_users1);
$fetch_assoc = mysqli_fetch_assoc($select_users_result1);



$select_soft = "SELECT * FROM user WHERE status=1";
$select_soft_result = mysqli_query($db_connect, $select_soft);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<?php 
if($fetch_assoc['roll'] == 1){ ?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary mt-2" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
Action
</button>

<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Take action on your Users</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <table class="table table-bordered">
          <tr>
            <th>SL</th>
            <th>Name</th>
            <th>Email</th>
            <th>Action</th>
          </tr>
          <?php
          foreach($select_soft_result as $sl=> $users){ ?> 
          <tr>
            <td><?=$sl+1?></td>
            <td><?=$users['name']?></td>
            <td><?=$users['email']?></td>
            <td>
              <a href="restore.php?id=<?= $users['id']?>" class="btn btn-success">Restore</a>
              <a href="delete.php?id=<?=$users['id']?>" class="btn btn-danger">Delete</a>
            </td>
          </tr>
            <?php  }  ?>
        </table>
      </div>
    </div>
  </div>
</div>
<?php  }  ?>
  <!-- Modal end -->

  <div class="row mt-3">
    <div class="col-lg-8">
      <div class="card">
        <div class="card-header">
          <h3>User List</h3>
        </div>
        <strong class="text-danger">
          <?php 
            if(isset($_SESSION['soft_delete'])){
                echo $_SESSION['soft_delete'];
            }
          ?>
        </strong>
        <strong class="text-danger">
          <?php 
            if(isset($_SESSION['delete'])){
                echo $_SESSION['delete'];
            }
          ?>
        </strong>
        <strong class="text-success">
          <?php 
            if(isset($_SESSION['restore'])){
                echo $_SESSION['restore'];
            }
          ?>
          </strong>
        <strong class="text-success">
          <?php 
            if(isset($_SESSION['admin_role'])){
                echo $_SESSION['admin_role'];
            }
          ?>
          </strong>
        <strong class="text-success">
          <?php 
            if(isset($_SESSION['sub_admin_role'])){
                echo $_SESSION['sub_admin_role'];
            }
          ?>
          </strong>
        <strong class="text-success">
          <?php 
            if(isset($_SESSION['moderator_role'])){
                echo $_SESSION['moderator_role'];
            }
          ?>
          </strong>
        <strong class="text-danger">
            <?php 
              if(isset($_SESSION['deactive'])){
                  echo $_SESSION['deactive'];
              }
            ?>
            </strong>
          <div class="card-body">
              <table class="table table-bordered">
                <tr>
                  <th>SL</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Action</th>
                  <th>Role</th>
                  <th>Role Status</th>
                </tr>
                <?php
                foreach($select_users_result as $sl=> $user){ ?> 
                <tr>
                  <td><?=$sl+1?></td>
                  <td><?=$user['name']?></td>
                  <td><?=$user['email']?></td>
                  
                <?php 
                  if($fetch_assoc['roll'] == 1){ ?>
                    <td>
                      <a href="edit.php?id=<?= $user['id']?>" class="btn btn-info">Edit</a>
                      <a href="soft_delete.php?id=<?=$user['id']?>" class="btn btn-danger">Delete</a>
                    </td>
                    <td>
                      <?php
                       if($user['roll']==1){?>
                        <p class="btn btn-info">Admin</p>
                       <?php }
                       if($user['roll']==2){?>
                        <p class="btn btn-primary">Sub Admin</p>
                       <?php }
                       if($user['roll']==3){?>
                        <p class="btn btn-warning">Moderator</p>
                       <?php } if($user['roll']==0){?>
                       <p class="btn btn-secondary">Member</p>
                        <?php } ?>
                    </td>
                    <td>
                        <a href="admin_role.php?id=<?=$user['id']?>" class="btn btn-success">Admin</a>
                        <a href="sub_admin_role.php?id=<?=$user['id']?>" class="btn btn-success">Sub Admin</a>
                        <a href="moderator_role.php?id=<?=$user['id']?>" class="btn btn-success">Moderator</a>
                      <?php if($user['roll']==0){?>
                        
                        <?php } else{?>
                        <a href="deactive.php?id=<?=$user['id']?>" class="btn btn-warning">Deactive</a>
                        <?php } ?> 
                    </td>
                      <?php } ?> 
                </tr>
                  <?php  }  ?>
              </table>
          </div>  
      </div>
    </div>
    <div class="col-lg-4"> 
      <div class="card">
        <div class="card-header">
            <h2>Registration Form</h2>
        </div>
        <?php 
          if($fetch_assoc['roll'] == 1){ ?>
        <div class="text-success">
            <?php if(isset( $_SESSION['reg_success'])){
            echo $_SESSION['reg_success'] ;
              }?>
        </div>
        <div class="card-body">
            <form action="register_post.php" method="POST">
              <div class="text-danger">
              <?php 
                if(isset($_SESSION['info_err'])){
                    echo $_SESSION['info_err'];
                }
                ?>
                </div>
                <div class="form-group">
                    <label for="exampleInputEmail1">Name</label>
                    <input type="name" class="form-control" name="name">
                    <small id="emailHelp" class="form-text text-muted"></small>
                    <!-- <?php 
                    // if(isset($_SESSION["name"])){
                    //     echo $_SESSION["name"];
                    // }
                    ?> -->
                </div>
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
                <div class="form-group">
                    <label for="exampleInputPassword1">Confirm Password</label>
                    <input type="password" class="form-control" name="confirm_password">
                </div>
                <button type="submit" class="btn btn-primary mt-2">Submit</button>
            </form>
        </div>
          <?php }  else{?> 
            <div class="text-danger">
              <h4>You are not allow to register user</h4>
            </div>
          <?php } ?>  
      </div>
    </div>
  </div>
    <div class="mt-3 ">
       <a href="logout.php" class="btn btn-danger">LogOut</a>
    </div>
</body>
</html>


<?php 

unset($_SESSION['reg_success']);
unset($_SESSION['wrong_pass']);
unset($_SESSION['info_err']);
unset($_SESSION['exist']);
unset($_SESSION['soft_delete']);
unset($_SESSION['delete']);
unset($_SESSION['restore']);
unset($_SESSION['deactive']);
unset($_SESSION['admin_role']);
unset($_SESSION['sub_admin_role']);
unset($_SESSION['moderator_role']);
?>


<!-- Latest compiled JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js">
  
</script>