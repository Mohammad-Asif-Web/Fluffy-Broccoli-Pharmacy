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

if(isset($_GET['id'])){
  $del_id = $_GET['id'];

  // delele href link, image link and file
  $sqlLink = "SELECT * FROM ecm_product WHERE serial = :del_id";
  $queryLink = $pdo->prepare($sqlLink);
  $queryLink->bindParam(':del_id', $del_id);
  $queryLink->execute();
  $link = $queryLink->fetch(PDO::FETCH_OBJ);
  $cat_img = $link->img;

  // Delete Category
  $sql = "DELETE FROM ecm_product WHERE serial = :del_id";
  $query = $pdo->prepare($sql);
  $query->bindParam(':del_id', $del_id);
  if($query->execute()){
    // removing image from folder
    unlink("dist/img/product/{$cat_img}");
  
    $_SESSION['msg']="{$link->name} Product Deleted";
  }
}

if(isset($_POST['updateProduct'])){
  $id = $_POST['id'];
  $category = $_POST['category'];
  $product = $_POST['product'];
  $details = $_POST['details'];
  $short_desc = $_POST['short_desc'];
  $product_code = $_POST['product_code'];
  $tp_price = $_POST['tp_price'];
  $mrp_price = $_POST['mrp_price'];
  $comission = $_POST['comission'];
  $quantity = $_POST['qty'];
  $total_cost = $_POST['total-cost'];

  $New_image = $_FILES['new-image']['name'];
  $old_image = $_POST['old-image'];
  // if new image is not empty
  if($New_image != ''){
    $update_name = $New_image;
  } else {
    $update_name = $old_image;
  }

  $sqlUpd = "UPDATE ecm_product 
              SET category_id=:category, 
                  name=:product, 
                  details=:details, 
                  short_desc=:short_desc,
                  product_code=:product_code, 
                  tp_price=:tp_price,
                  mrp_price=:mrp_price, 
                  comission_price=:comission, 
                  qty=:quantity, 
                  total_cost=:total_cost,  
                  img=:image, 
                  date=:date  
            WHERE serial = :id 
            "; 

  $queryUpd = $pdo->prepare($sqlUpd);
  $queryUpd->bindParam(':id', $id);
  $queryUpd->bindParam(':category', $category);
  $queryUpd->bindParam(':product', $product);
  $queryUpd->bindParam(':details', $details);
  $queryUpd->bindParam(':short_desc', $short_desc);
  $queryUpd->bindParam(':product_code', $product_code);
  $queryUpd->bindParam(':tp_price', $tp_price);
  $queryUpd->bindParam(':mrp_price', $mrp_price);
  $queryUpd->bindParam(':comission', $comission);
  $queryUpd->bindParam(':quantity', $quantity);
  $queryUpd->bindParam(':total_cost', $total_cost);

  $queryUpd->bindParam(':image', $update_name);
  $queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){
        if($New_image != ''){
          move_uploaded_file($_FILES['new-image']['tmp_name'], "dist/img/product/".$New_image);
          unlink("dist/img/product/".$old_image);
        }
        $_SESSION['msg'] = "{$product} Updated Successfully";

    } else {
      $_SESSION['e-msg'] = "{$product} Not Updated";
    }
}

?>

      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header p-0">
    <div class="container-fluid">
      <div class="row mb-5 bg-white py-1 px-4">
          <h2 class="font-weight-bold">Product</h2>
      </div>
    </div>
  </section> -->

  <!-- Main content -->
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-12 col-md-12">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Product List</h6>
                </div>
                <div class="text-right">
                  <a href="add-product.php" class="btn btn-secondary btn-sm mr-1">
                    <img src="dist/img/icon/product.png" class="mr-2" alt="" style="width: 20px;">
                    Add New Product
                  </a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover table-striped">
                <thead>
                  <tr class="bg-info">
                    <th>SL</th>
                    <th>Category</th>
                    <th>Product</th>
                    <th>Details</th>
                    <th>Short Text</th>
                    <th>Product Code</th>
                    <th>TP Price</th>
                    <th>MRP Price</th>
                    <th>Comission Price</th>
                    <th>Quantity</th>
                    <th>Total Cost</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM ecm_product ORDER BY serial DESC";
                  $query = $pdo->prepare($sql);
                  $query->execute();
                  $sl = 1;
                  while($row = $query->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <tr>
                    <td class="text-capitalize"><?php echo $sl++ ?></td>
                    <td class="text-capitalize"><?php echo $row->category_id ?></td>
                    <td class="text-capitalize"><?php echo $row->name ?></td>
                    <td class="text-capitalize"><?php echo $row->details ?></td>
                    <td class="text-capitalize"><?php echo $row->short_desc ?></td>
                    <td class="text-capitalize"><?php echo $row->product_code ?></td>
                    <td class="text-capitalize"><?php echo $row->tp_price ?></td>
                    <td class="text-capitalize"><?php echo $row->mrp_price ?></td>
                    <td class="text-capitalize"><?php echo $row->comission_price ?></td>
                    <td class="text-capitalize"><?php echo $row->qty ?></td>
                    <td class="text-capitalize"><?php echo $row->total_cost ?></td>

                    <td class="text-capitalize">
                      <img src="dist/img/product/<?php echo $row->img ?>" style="width: 40px;" >
                    </td>
                    <td class="text-capitalize"><?php echo $row->date ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#edit<?php echo $row->serial ?>">
                        <button class="btn btn-sm btn-primary">
                          <i class="fa fa-edit"></i> Edit
                        </button>
                      </a>
                      <a href="manage-product.php?id=<?php echo $row->serial ?>">
                        <button class="btn btn-sm btn-danger mt-1" name="delete">
                          <i class="fa fa-trash"></i> Delete
                        </button>
                      </a>
                    </td>
                  </tr>
                  <!-- Edit Modal -->
                  <div class="modal fade" id="edit<?php echo $row->serial ?>" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>

                          <div class="modal-body">
                            <input type="hidden" name="id" value="<?php echo $row->serial ?>">
                            <!-- category -->
                            <?php
                                $sqlCategory = "SELECT * FROM ecm_category";
                                $queryCategory = $pdo->prepare($sqlCategory);
                                $queryCategory->execute();
                                // $rowCat = $queryCategory->fetch(PDO::FETCH_OBJ)
                            ?>
                            <div class="form-group">
                              <label for="category">Category</label>
                              <select class="form-control" id="category" name="category">
                                <option selected disabled>Select Category</option>
                                <?php
                                while($rowCat = $queryCategory->fetch(PDO::FETCH_OBJ)){
                                ?>
                                <option value="<?php echo $rowCat->cat_id ?>"><?php echo $rowCat->category ?></option>
                                <?php 
                                }
                                ?>
                              </select>
                            </div>
                            <!-- product -->
                            <div class="form-group">
                              <label for="product">Product</label>
                              <input type="text" class="form-control" id="product" 
                                    name="product" value="<?php echo $row->name ?>">
                            </div>
                            <!-- details -->
                            <div class="form-group">
                              <label for="summernote">Details</label>
                              <textarea name="details" id="summernote" class="form-control">
                              <?php echo $row->details ?>
                              </textarea>
                            </div>
                            <!-- Short Text -->
                            <div class="form-group">
                              <label for="short_desc">Short Text</label>
                              <input type="text" class="form-control" id="short_desc" 
                                      name="short_desc" value="<?php echo $row->short_desc ?>">
                            </div>
                            <div class="form-group">
                              <label for="product_code">Code</label>
                              <input type="text" class="form-control" id="product_code" 
                                      name="product_code" value="<?php echo $row->product_code ?>">
                            </div>
                            <div class="form-group">
                              <label for="tp_price">TP Price</label>
                              <input type="number" class="form-control" id="tp_price" 
                                      name="tp_price" value="<?php echo $row->tp_price ?>">
                            </div>
                            <div class="form-group">
                              <label for="mrp_price">MRP Price</label>
                              <input type="number" class="form-control" id="mrp_price" 
                                      name="mrp_price" value="<?php echo $row->mrp_price ?>">
                            </div>
                            <div class="form-group">
                              <label for="comission">Comission</label>
                              <input type="number" class="form-control" id="comission" 
                                      name="comission" value="<?php echo $row->comission_price ?>">
                            </div>
                            <div class="form-group">
                              <label for="qty">Quantity</label>
                              <input type="text" class="form-control" id="qty" 
                                      name="qty" value="<?php echo $row->qty ?>">
                            </div>
                            <div class="form-group">
                              <label for="total-cost">Total Cost</label>
                              <input type="text" class="form-control" id="total-cost" 
                                      name="total-cost" value="<?php echo $row->total_cost ?>">
                            </div>
                            <!-- image -->
                            <div class="form-group">
                              <label>old Image</label>
                              <img src="dist/img/product/<?php echo $row->img ?>" 
                                class="form-control border-0 w-25 h-25">
                              <input type="hidden" name="old-image" value="<?php echo $row->img ?>">
                            </div>
                            <div class="form-group">
                              <label for="new-image">Upload New Image</label>
                              <input type="file" id="new-image" class="form-control border-0" name="new-image">
                            </div>
                          </div>
                          <!-- button -->
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateProduct" class="btn btn-primary">Save changes</button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                  <!-- Edit Modal end  -->
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

