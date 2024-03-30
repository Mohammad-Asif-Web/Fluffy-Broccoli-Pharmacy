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
  
    // Delete Category
    $sql = "DELETE FROM product_unit WHERE id = :del";
    $query = $pdo->prepare($sql);
    $query->bindParam(':del', $del_id);
    if($query->execute()){

      $_SESSION['msg']="Unit Deleted";
    }
}

if(isset($_POST['update-unit'])){
    $id = $_POST['id'];
    $unit = $_POST['unit'];

    $sqlUpd = "UPDATE product_unit SET unit=:unit, date=:date WHERE id = :id "; 
    $queryUpd = $pdo->prepare($sqlUpd);
    $queryUpd->bindParam(':id', $id);
    $queryUpd->bindParam(':unit', $unit);
    $queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){

        $_SESSION['msg'] = "{$unit} Updated Successfully";

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
          <h2 class="font-weight-bold">Unit</h2>
      </div>
    </div>
  </section> -->

  <!-- Main content -->
  <section class="content mt-5">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12 col-lg-8">
          <div class="card card-dark">
            <div class="card-header py-2">
              <div class="d-flex justify-content-between align-items-center">
                <div>
                  <h6 class="fs-17 font-weight-600 mb-0">Manage Unit</h6>
                </div>
                <div class="text-right">
                  <a href="add-unit.php" class="btn btn-secondary btn-sm mr-1"><i class="fas fa-align-justify mr-1"></i>Add Unit</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-info">
                    <th>SL</th>
                    <th>Unit</th>
                    <th>Date</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM product_unit ORDER BY id DESC";
                  $query = $pdo->prepare($sql);
                  $query->execute();
                  $sl = 1;
                  while($row = $query->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <tr>
                    <td class="text-capitalize"><?php echo $sl++ ?></td>
                    <td class="text-capitalize"><?php echo $row->unit ?></td>
                    <td class="text-capitalize"><?php echo $row->date ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#edit<?php echo $row->id ?>">
                        <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Edit</button>
                      </a>

                      <a href="manage-unit.php?id=<?php echo $row->id ?>">
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
                              <label for="unit">Unit Name</label>
                              <input type="text" class="form-control" id="unit" name="unit" value="<?php echo $row->unit ?>">
                            </div>
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <button type="submit" name="update-unit" class="btn btn-primary">Save changes</button>
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

