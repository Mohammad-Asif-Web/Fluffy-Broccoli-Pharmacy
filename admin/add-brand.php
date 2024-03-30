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

if(isset($_POST['add-brand'])){
  $brand_name = $_POST['brand-name'];
  $brand_details = $_POST['details'];
  $image_name = $_FILES['image']['name'];
  $image_tmp_name = $_FILES['image']['tmp_name'];
  $path = "dist/img/brand/".$image_name;
  move_uploaded_file($image_tmp_name, $path);
  
  $sql = "INSERT INTO p_brand(name, details, img, date) VALUES(:brand_name, :details, :image, :date)";
  $query = $pdo->prepare($sql);
  $query->bindParam(':brand_name', $brand_name);
  $query->bindParam(':details', $brand_details);
  $query->bindParam(':image', $image_name);
  $query->bindParam(':date', $date);
  if($query->execute()){
      $_SESSION['msg']="{$brand_name} Brand Added";
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
          <h2 class="font-weight-bold">Brand</h2>
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
                  <h6 class="fs-17 font-weight-600 mb-0">Add New Brand</h6>
                </div>
                <div class="text-right">
                  <a href="manage-brand.php" class="btn btn-secondary btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i>Manage Brand</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                <div class="form-group">
                    <label for="brand-name">Brand Name</label>
                    <input type="text" class="form-control" id="brand-name" name="brand-name">
                </div>
                <div class="form-group">
                    <label for="details">Details</label>
                    <textarea name="details" id="details" cols="30" rows="5" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="row ml-0">
                        <div class="col-8">
                            <input type="file" id="image" name="image" class="custom-file-input" oninput="img_preview.src=window.URL.createObjectURL(this.files[0])">
                            <label class="custom-file-label">Choose file</label>
                        </div>
                        <div class="col-4">
                            <img id="img_preview" alt="Add-Brand-Image" height="80px" width="80px;" >
                        </div>
                    </div>
                </div>     
                <div class="mt-3">
                    <button type="submit" class="btn btn-info" name="add-brand">Save</button>
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



