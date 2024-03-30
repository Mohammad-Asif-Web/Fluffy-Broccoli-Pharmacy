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
?>
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
        <div class="col-md-8 offset-md-2">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Create package</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="Action/create-package.php" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="Package name">Package name</label>
                            <input type="text" class="form-control" name="PackageName">
                        </div>
                        <div class="form-group">
                            <label for="Ref commission">Ref commission</label>
                            <input type="number" class="form-control" name="refCommission">
                        </div>
                    </div>
                    <div class="col-md-6">
						<div class="form-group">
                            <label for="category">Package type</label>
                            <select class="form-control" id="category" name="type">
                              <option value="Free">Free</option>
                              <option value="Reguler">Reguler</option>
                              <option value="Invest">Invest</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="Ref commission">Month count</label>
                            <input type="number" class="form-control" name="MonthCount">
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">
                            <label for="Monthly benefit">Monthly benefit</label>
                            <input type="number" class="form-control" name="monthlyBenefit">
                        </div>
                        <div class="form-group">
                            <label for="Amount">Amount</label>
                            <input type="number" class="form-control" name="Amount">
                        </div>
                    </div>
                </div>     
                <div class="mt-3">
                    <button type="submit" class="btn btn-info" name="submit" >Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
		
		
		<div class="col-md-12">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">List of package</h6>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-info">
                    <th>SL</th>
                    <th>Package name</th>
                    <th>Reffer commission (%)</th>
                    <th>Monthly benefit</th>
                    <th>Amount</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $package = "SELECT * FROM package ORDER BY serial DESC";
                  $query = $mysqli->query($package);
                  $sl = 1;
                  while($res = mysqli_fetch_assoc($query)){
                  ?>
                  <tr>
                    <td class="text-capitalize"><?php echo $sl++; ?></td>
                    <td class="text-capitalize"><?php echo $res['name']; ?></td>
                    <td class="text-capitalize"><?php echo $res['refCommission']; ?></td>
                    <td class="text-capitalize"><?php echo $res['monthlybenefit']; ?></td>
                    <td class="text-capitalize"><?php echo $res['amount']; ?></td>
                  </tr>
                  <?php
                  }
                  ?>
                </tbody>
              </table>
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

