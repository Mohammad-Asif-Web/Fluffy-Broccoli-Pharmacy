<?php

use function PHPSTORM_META\map;

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

if(isset($_POST['add-category'])){
    $category_name = $_POST['category'];
    // $category_link = $_POST['cat-link'];

    // join(-) between each words
    // $array = explode(" ", $category_name);
    // $joinLink = join("-", $array);

    // $createfile = fopen('../'.$joinLink.'.php', 'x');

    $file = $_FILES['file']['name'];
    $temp_name = $_FILES['file']['tmp_name'];
    $path = "dist/img/category/".$file;

    move_uploaded_file($temp_name, $path);
    $sql = "INSERT INTO ecm_category(category, category_image, date) VALUES(:category, :image, :date)";
    $query = $pdo->prepare($sql);
    $query->bindParam(':category', $category_name);
    $query->bindParam(':image', $file);
    // $query->bindParam(':link', $joinLink);
    $query->bindParam(':date', $date);
    if($query->execute()){
        $_SESSION['msg']="New Category Added";
    }

}

?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
    <!-- <section class="content-header p-0">
    <div class="container-fluid">
        <div class="row mb-5 bg-white py-1 px-4">
            <h2 class="font-weight-bold">Category</h2>
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
                                    <h6 class="fs-17 font-weight-600 mb-0">Add New Category</h6>
                                </div>
                                <div class="text-right">
                                    <a href="manage-category.php" class="btn btn-secondary btn-sm mr-1"><img src="dist/img/icon/category.png" class="mr-2" alt="" style="width: 20px;">Category List</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" method="post" accept-charset="utf-8" class="d-flex flex-column">
                                <div class="form-group">
                                    <label for="category">Category Name</label>
                                    <input type="text" id="category" name="category" class="form-control">
                                </div>
                                <div class="form-group">
                                    <label for="file">Add Category Image</label>
                                    <input type="file" name="file" id="file" class="d-block mb-2">
                                </div>
                                <button class="btn btn-info" name="add-category" style="width: 120px" class="form-control">Add Category</button>
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

