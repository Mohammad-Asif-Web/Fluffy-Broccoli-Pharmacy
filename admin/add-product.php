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

if(isset($_POST['add-product'])){
  $product_name = $_POST['product-name'];
  $details = $_POST['details'];
  $short_desc = $_POST['short_desc'];
  $category = $_POST['category'];
  $product_code = $_POST['product_code'];
  $tp_price = $_POST['tp_price'];
  $mrp_price = $_POST['mrp_price'];
  $comission = $_POST['comission'];
  $totalCost = $_POST['total-cost'];
  $quantity = $_POST['quantity'];

  $img = $_FILES['image']['name'];
  $img_tmp_name = $_FILES['image']['tmp_name'];

  $path = "dist/img/product/".$img;
  move_uploaded_file($img_tmp_name, $path);


  
  $sql = "INSERT INTO ecm_product (`name`, `details`, `short_desc`, 
                                  `category_id`, `product_code`, `tp_price`, 
                                  `mrp_price`, `comission_price`, `qty`, 
                                  `total_cost`, `img`, `date`) 
                            VALUES(:name, :details, :short_desc,
                                  :category, :product_code, :tp_price, 
                                  :mrp_price, :comission, :qty, 
                                  :total_cost, :img, :date)
          ";

  $query = $pdo->prepare($sql);
  $query->bindParam(':name', $product_name);
  $query->bindParam(':details', $details);
  $query->bindParam(':short_desc', $short_desc);
  $query->bindParam(':category', $category);
  $query->bindParam(':product_code', $product_code);
  $query->bindParam(':tp_price', $tp_price);
  $query->bindParam(':mrp_price', $mrp_price);
  $query->bindParam(':comission', $comission);
  $query->bindParam(':qty', $quantity);
  $query->bindParam(':total_cost', $totalCost);
  $query->bindParam(':img', $img);
  $query->bindParam(':date', $date);

  if($query->execute()){
    $_SESSION['msg']="{$product_name} Product Added";
  } else {
    $_SESSION['e-msg'] = "{$product_name} not added";
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
          <h2 class="font-weight-bold">Products</h2>
      </div>
    </div>
  </section> -->

  <!-- Main content -->
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Add New Product</h6>
                </div>
                <div class="text-right">
                  <a href="manage-product.php" class="btn btn-secondary btn-sm mr-1">
                    <img src="dist/img/icon/product.png" class="mr-2" alt="" style="width: 20px;">Manage Products</a>
                </div>
              </div>
            </div>
            <div class="card-body">
              <form action="<?php $_SERVER['PHP_SELF']?>" enctype="multipart/form-data" 
                    method="post" accept-charset="utf-8">
                <div class="row">
                    <div class="col-lg-6">
                        <!-- category -->
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" name="category">
                              <?php
                              $sqlCategory = "SELECT * FROM ecm_category";
                              $queryCategory = $pdo->prepare($sqlCategory);
                              $queryCategory->execute();
                              while($row = $queryCategory->fetch(PDO::FETCH_OBJ)){
                              ?>
                              <option value="<?php echo $row->cat_id ?>"><?php echo $row->category ?></option>
                              <?php 
                              }
                              ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="product-name">Product Name</label>
                            <input type="text" class="form-control" id="product-name" name="product-name">
                        </div>
                        
                        <div class="form-group">
                            <label for="summernote">Details</label>
                            <textarea name="details" id="summernote" class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <label for="short_desc">Short Text</label>
                            <textarea name="short_desc" id="short_desc" cols="30" rows="4" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="form-group">
                            <label for="product_code">Product Code</label>
                            <input type="text" class="form-control" id="product_code" name="product_code">
                        </div>
                        <div class="form-group">
                            <label for="tp_price">TP Price</label>
                            <input type="number" class="form-control" id="tp_price" name="tp_price">
                        </div>
                        <div class="form-group">
                            <label for="mrp_price">MRP Price</label>
                            <input type="number" class="form-control" id="mrp_price" name="mrp_price">
                        </div>
                        <div class="form-group">
                            <label for="comission">Comission Price</label>
                            <input type="number" class="form-control" id="comission" name="comission">
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity">
                        </div>
                        <div class="form-group">
                            <label for="total-cost">Total Cost</label>
                            <input type="number" class="form-control" id="total-cost" name="total-cost">
                        </div>
                    </div>
                    <div class="col-lg-12">
                      <div class="form-group">
                          <label for="image">Image</label>
                          <div class="row ml-0">
                              <div class="col-6">
                                  <input type="file" id="image" name="image" class="custom-file-input" 
                                          oninput="img_preview.src=window.URL.createObjectURL(this.files[0])">
                                  <label class="custom-file-label">Choose file</label>
                              </div>
                              <div class="col-4">
                                  <img id="img_preview" alt="Add-Brand-Image" height="80px" width="80px;" >
                              </div>
                          </div>
                      </div>
                    </div>
                </div>     
                <div class="mt-3">
                    <button type="submit" class="btn btn-info" name="add-product">Save</button>
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

