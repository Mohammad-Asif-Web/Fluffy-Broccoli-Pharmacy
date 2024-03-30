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

if(isset($_GET['cat-id'])){
  $del_id = $_GET['cat-id'];

  // get image name
  $sqlLink = "SELECT * FROM ecm_category WHERE cat_id = :del_link";
  $queryLink = $pdo->prepare($sqlLink);
  $queryLink->bindParam(':del_link', $del_id);
  $queryLink->execute();
  $link = $queryLink->fetch(PDO::FETCH_OBJ);
  // $cat_link = $link->category_link;
  $cat_img = $link->category_image;

  // Delete Category
  $sql = "DELETE FROM ecm_category WHERE cat_id = :del_id";
  $query = $pdo->prepare($sql);
  $query->bindParam(':del_id', $del_id);
  if($query->execute()){
    // removing generated file
    // unlink("../{$cat_link}.php");
    // removing image from folder
    unlink("dist/img/category/{$cat_img}");
  
    $_SESSION['msg']="{$link->category} Category Deleted";
  }
}

if(isset($_POST['updateCategory'])){
  $cat_id = $_POST['cat_id'];
  $status = $_POST['status'];
  $New_image = $_FILES['new-image']['name'];
  $old_image = $_POST['old-image'];
  // if new image is not empty
  if($New_image != ''){
    $update_name = $New_image;
  } else {
    $update_name = $old_image;
  }

  $sqlUpd = "UPDATE ecm_category SET category_image=:category_image, date=:date, status=:status WHERE cat_id = :cat_id "; 
  $queryUpd = $pdo->prepare($sqlUpd);
  $queryUpd->bindParam(':cat_id', $cat_id);
  $queryUpd->bindParam(':category_image', $update_name);
  $queryUpd->bindParam(':status', $status);
  $queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){
        if($New_image != ''){
          move_uploaded_file($_FILES['new-image']['tmp_name'], "dist/img/category/".$New_image);
          unlink("dist/img/category/".$old_image);
        }
        $_SESSION['msg'] = "Category Updated Successfully";

    } else {
      $_SESSION['e-msg'] = "Category Not Updated";
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
        <div class="col-12-8 col-md-12">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Category List</h6>
                </div>
                <div class="text-right">
                  <a href="add-category.php" class="btn btn-secondary btn-sm mr-1"><img src="dist/img/icon/category.png" class="mr-2" alt="" style="width: 20px;">Add New Category</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-info">
                    <th>SL</th>
                    <th>Category Name</th>
                    <th>Category Image</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM ecm_category ORDER BY cat_id DESC";
                  $query = $pdo->prepare($sql);
                  $query->execute();
                  $sl = 1;
                  while($row = $query->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <tr>
                    <td class="text-capitalize"><?php echo $sl++ ?></td>
                    <td class="text-capitalize"><?php echo $row->category ?></td>
                    <td class="text-capitalize"><img src="dist/img/category/<?php echo $row->category_image ?>" style="width: 40px;" ></td>
                    <td class="text-capitalize"><?php echo $row->date ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#edit<?php echo $row->cat_id ?>">
                        <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                      </a>

                      <a href="manage-category.php?cat-id=<?php echo $row->cat_id ?>">
                        <button class="btn btn-sm btn-danger" name="delete"><i class="fa fa-trash"></i> Delete</button>
                      </a>
                    </td>
                    <td>
                      <?php
                      if($row->status == '1'){
                        echo "<button class='btn btn-sm btn-primary'>Active</button>";
                      } else {
                        echo "<button class='btn btn-sm btn-secondary'>Inactive</button>";
                      }
                      ?>
                    </td>
                  </tr>
                  <!-- Edit Modal -->
                  <div class="modal fade" id="edit<?php echo $row->cat_id ?>" tabindex="-1" aria-hidden="true">
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
                            <input type="hidden" name="cat_id" value="<?php echo $row->cat_id ?>">
                            <div class="form-group">
                              <label for="category">Category Name</label>
                              <input type="text" class="form-control" id="category" name="category" value="<?php echo $row->category ?>" readonly>
                            </div>
                            <div class="form-group">
                              <label>old Image</label>
                              <img src="dist/img/category/<?php echo $row->category_image ?>" class="form-control border-0 w-25 h-25">
                              <input type="hidden" name="old-image" value="<?php echo $row->category_image ?>">
                            </div>
                            <div class="form-group">
                              <label for="new-image">Upload New Image</label>
                              <input type="file" id="new-image" class="form-control border-0" name="new-image">
                            </div>
                            <div class="form-group">
                            <label for="status">Status</label>
                            <select class="form-control" name="status" id="status">
                              <option value="1">Active</option>
                              <option value="0">Inactive</option>
                            </select>
                          </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="updateCategory" class="btn btn-primary">Save changes</button>
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

