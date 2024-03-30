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

if(isset($_POST['add-ads'])){
    $title = $_POST['title'];
    $file = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $path = "dist/img/ads/".$file;

    move_uploaded_file($temp_name, $path);
    $sql = "INSERT INTO ecm_ads(ads_title, ads_image, date) VALUES(:title, :image, :date)";
    $query = $pdo->prepare($sql);
    $query->bindParam(':title', $title);
    $query->bindParam(':image', $file);
    $query->bindParam(':date', $date);
    if($query->execute()){
        header("location: ads-list.php");
        $_SESSION['msg']="New Ads Added";
    }

}



?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header p-0">
    <div class="container-fluid">
      <div class="row mb-5 bg-white py-1 px-4">
          <h2 class="font-weight-bold">Advertise</h2>
      </div>
    </div>
  </section> -->

        <!-- Main content -->
    <section class="content mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="card card-dark">
                        <div class="card-header py-2">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="fs-17 font-weight-600 mb-0">Add New Advertise</h6>
                                </div>
                                <div class="text-right">
                                    <a href="ads-list.php" class="btn btn-secondary btn-sm mr-1"><img src="dist/img/icon/ads.png" class="mr-2" alt="" style="width: 20px;">Advertise List</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="d-flex flex-column">
                                <label for="title">Ads Title</label>
                                <textarea name="title" id="title"rows="2" style="outline: 0; border-radius: 3px; margin-bottom: 20px"></textarea>
                                <label for="file">Upload Image</label>
                                <input type="file" name="file" id="file" class="mb-4">
                                <button class="btn btn-info" name="add-ads" style="width: 100px">Add Image</button>
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

