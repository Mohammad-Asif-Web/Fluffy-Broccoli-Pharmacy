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
    $sqlLink = "SELECT * FROM p_brand WHERE id = :del";
    $queryLink = $pdo->prepare($sqlLink);
    $queryLink->bindParam(':del', $del_id);
    $queryLink->execute();
    $link = $queryLink->fetch(PDO::FETCH_OBJ);
    $img = $link->img;
  
    // Delete Category
    $sql = "DELETE FROM p_brand WHERE id = :del";
    $query = $pdo->prepare($sql);
    $query->bindParam(':del', $del_id);
    if($query->execute()){
      // removing image from folder
      unlink("dist/img/brand/{$img}");
      $_SESSION['msg']="Brand Deleted";
    }
}

if(isset($_POST['update-brand'])){
    $id = $_POST['id'];
    $brand_name = $_POST['brand-name'];
    $details = $_POST['details'];
    $New_image = $_FILES['new-image']['name'];
    $old_image = $_POST['old-image'];
    // if new image is not empty
    if($New_image != ''){
        $update_name = $New_image;
    } else {
        $update_name = $old_image;
    }

    $sqlUpd = "UPDATE p_brand SET name=:name, details=:details, img=:image, date=:date WHERE id = :id "; 
    $queryUpd = $pdo->prepare($sqlUpd);
    $queryUpd->bindParam(':id', $id);
    $queryUpd->bindParam(':name', $brand_name);
    $queryUpd->bindParam(':details', $details);
    $queryUpd->bindParam(':image', $update_name);
    $queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){
        if($New_image != ''){
        move_uploaded_file($_FILES['new-image']['tmp_name'], "dist/img/brand/".$New_image);
        unlink("dist/img/brand/".$old_image);
        }
        $_SESSION['msg'] = "Brand Updated Successfully";

    } else {
    $_SESSION['e-msg'] = "Brand Not Updated";
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
        <div class="col-md-12 col-lg-12">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Manage Brands</h6>
                </div>
                <div class="text-right">
                  <a href="add-brand.php" class="btn btn-secondary btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i>Add Brand</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-info">
                    <th>SL</th>
                    <th>Brand Name</th>
                    <th>Image</th>
                    <th>details</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM p_brand ORDER BY id DESC";
                  $query = $pdo->prepare($sql);
                  $query->execute();
                  $sl = 1;
                  while($row = $query->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <tr>
                    <td class="text-capitalize"><?php echo $sl++ ?></td>
                    <td class="text-capitalize"><?php echo $row->name ?></td>
                    <td class="text-capitalize"><img src="dist/img/brand/<?php echo $row->img ?>" style="width: 40px;" ></td>
                    <td class="text-capitalize"><?php echo $row->details ?></td>
                    <td class="text-capitalize"><?php echo $row->date ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#edit<?php echo $row->id ?>">
                        <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                      </a>

                      <a href="manage-brand.php?id=<?php echo $row->id ?>">
                        <button class="btn btn-sm btn-danger" name="delete"><i class="fa fa-trash"></i> Delete</button>
                      </a>
                    </td>
                  </tr>
                  <!-- Edit Modal -->
                  <div class="modal fade" id="edit<?php echo $row->id ?>" tabindex="-1" aria-hidden="true">
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
                            <input type="hidden" name="id" value="<?php echo $row->id ?>">
                            <div class="form-group">
                              <label for="brand-name">Brand Name</label>
                              <input type="text" class="form-control" id="brand-name" name="brand-name" value="<?php echo $row->name ?>">
                            </div>
                            <div class="form-group">
                              <label for="details">Details</label>
                              <textarea name="details" id="details" cols="30" rows="5" class="form-control"><?php echo $row->details ?></textarea>
                            </div>
                            <div class="form-group">
                              <label>old Image</label>
                              <img src="dist/img/brand/<?php echo $row->img ?>" class="form-control border-0 w-25 h-25">
                              <input type="hidden" name="old-image" value="<?php echo $row->img ?>">
                            </div>
                            <div class="form-group">
                              <label for="new-image">Upload New Image</label>
                              <input type="file" id="new-image" class="form-control border-0" name="new-image">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="update-brand" class="btn btn-primary">Save changes</button>
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

