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

if(isset($_POST['add-unit'])){
  $unit = $_POST['unit'];
  
  $sql = "INSERT INTO product_unit(unit, date) VALUES(:unit, :date)";
  $query = $pdo->prepare($sql);
  $query->bindParam(':unit', $unit);
  $query->bindParam(':date', $date);
  if($query->execute()){
      $_SESSION['msg']="{$unit} unit Added";
  }


}

?>
    <!--  Sidebar end -->

      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header p-0">
    <div class="container-fluid">
      <div class="row mb-5 bg-white py-1 px-4">
          <h2 class="font-weight-bold">unit</h2>
      </div>
    </div>
  </section> -->

  <!-- Main content -->
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-9 col-md-9">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Add New Unit</h6>
                </div>
                <div class="text-right">
                  <a href="manage-unit.php" class="btn btn-secondary btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i>Manage Unit</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="unit">Unit Name</label>
                    <input type="text" class="form-control" id="unit" name="unit">
                </div>     
                <div class="mt-3">
                    <button type="submit" class="btn btn-info" name="add-unit">Save</button>
                </div>
              </form>
            </div>
          </div>
        </div>
        <div class="col-lg-3 col-md-3">

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



