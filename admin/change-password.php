<?php
session_start();
if(!isset($_SESSION['pharmacyAdmin'])) {
    header("location:login.php");
    exit();
}else{
    include('../config/db.php');
}

include("include/head.php");
include("include/navbar.php");
include("include/sidebar.php");

if(isset($_POST['save'])){
  $oldPass = $_POST['current_pass'];
  $newPass = $_POST['new_pass'];
  $conPass = $_POST['con_pass'];

  if(empty($oldPass)){
    $_SESSION['e-msg']="Enter your Current Password";
    echo "<script>window.history.back();</script>";
    exit();
  }
  if(empty($newPass)){
    $_SESSION['e-msg']="Enter your New password";
    echo "<script>window.history.back();</script>";
    exit();
  }
  if(empty($conPass)){
    $_SESSION['e-msg']="Enter your Confirm password";
    echo "<script>window.history.back();</script>";
    exit();

  } else{

    $adminLogId = $_SESSION['adminLogId'];
    $sql = "SELECT * FROM admin WHERE logid = :logId";
    $query = $pdo->prepare($sql);
    $query->bindParam(':logId', $adminLogId);
    $query->execute();
    $row = $query->fetch(PDO::FETCH_ASSOC);
    if($row['pass'] == $oldPass){
      if($newPass == $conPass){
        $sql_pass = "UPDATE admin SET pass = :newPass  WHERE logid = :logId " ;
        $query_pass = $pdo->prepare($sql_pass);
        $query_pass->bindParam(':newPass', $newPass);
        $query_pass->bindParam(':logId', $adminLogId);
        $result = $query_pass->execute();
        if($result){
          $_SESSION['msg'] = "Successfully Password Updated";
        }

      } else {
        $_SESSION['e-msg'] = "New password not matched";

      }

    } else{
      $_SESSION['e-msg'] = "Current Password Not Matched";
    }
    
  }

}
?>

      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header p-0">
    <div class="container-fluid">
      <div class="row mb-5 bg-white py-1 px-4">
          <h2 class="font-weight-bold">User Profile</h2>
      </div>
    </div>
  </section> -->

  <!-- Main content -->
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-sm-4">
          <div class="card shadow-none">
              <div class="card-body p-0">
                  <ul class="navbar-nav">
                      <li class="nav-item pl-3">
                          <a href="profile.php" class="nav-link text-dark">User Profile</a>
                      </li>
                      <hr class="w-100 m-0">
                      <li class="nav-item pl-3" style="background: #e6eeee">
                          <a href="change-password.php" class="nav-link text-dark">Reset Password</a>
                      </li>
                  </ul>
              </div>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-sm-8" id="profile-body">
          <div class="card shadow-none">
              <div class="card-body p-0"  style="background: #e6eeee">
                <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post">
                    <div class="row px-4 pt-3">
                        <div class="col-12">
                            <h5>Set A New Password</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row body-input px-4">
                        <div class="col-sm-12">
                            <label for="current_pass">Current Password</label>
                            <input type="text" id="current_pass" name="current_pass" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="new_pass">New Password</label>
                            <input type="text" id="new_pass" name="new_pass" class="form-control">
                        </div>
                        <div class="col-sm-6">
                            <label for="con_pass">Confirm Password</label>
                            <input type="text" id="con_pass" name="con_pass" class="form-control">
                        </div>
                        <div class="col-sm-12">
                            <button class="btn btn-info btn-sm" name="save">Save Changes</button>
                        </div>
                    </div>
                  </form>
              </div>
          </div>
        </div>
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
      <!-- /.content-wrapper -->

<!-- footer Start -->
<?php include("include/footer.php")?>
<!-- footer End -->

