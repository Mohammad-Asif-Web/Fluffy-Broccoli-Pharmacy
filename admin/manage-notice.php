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



if(isset($_POST['updateNotice'])){
    $id = $_POST['id'];
    $body = $_POST['body'];
    $status = $_POST['status'];


  $sqlUpd = "UPDATE notice 
                SET body=:body, date=:date,
                status=:status
                WHERE serial = :id 
            "; 

  $queryUpd = $pdo->prepare($sqlUpd);
  $queryUpd->bindParam(':id', $id);
  $queryUpd->bindParam(':body', $body);
  $queryUpd->bindParam(':status', $status);
  $queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){
        $_SESSION['msg'] = "Notice Updated Successfully";

    } else {
      $_SESSION['e-msg'] = "Notice Not Updated";
    }
}

?>

      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header p-0">
    <div class="container-fluid">
      <div class="row mb-5 bg-white py-1 px-4">
          <h2 class="font-weight-bold">Notice</h2>
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
                  <h6 class="fs-17 font-weight-600 mb-0">Notice</h6>
                </div>
                <div class="text-right">
                  <a href="manage-notice.php" class="btn btn-secondary btn-sm mr-1"><img src="dist/img/icon/notice.png" class="mr-2" alt="" style="width: 20px;">Update Notice</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr class="bg-info">
                    <th>SL</th>
                    <th>body</th>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $sql = "SELECT * FROM notice ORDER BY serial";
                  $query = $pdo->prepare($sql);
                  $query->execute();
                  $sl = 1;
                  while($row = $query->fetch(PDO::FETCH_OBJ)){
                  ?>
                  <tr>
                    <td class="text-capitalize"><?php echo $sl++ ?></td>
                    <td class="text-capitalize"><?php echo $row->body ?></td>
                    <td class="text-capitalize"><?php echo $row->date ?></td>
                    <td>
                      <a data-toggle="modal" data-target="#edit<?php echo $row->serial ?>">
                        <button class="btn btn-sm btn-success"><i class="fa fa-edit"></i> Update</button>
                      </a>
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
                            <div class="form-group">
                              <label for="body">body</label>
                              <input type="text" class="form-control" id="body" name="body" value="<?php echo $row->body ?>" >
                            </div>
                            <div class="form-group">
                              <label for="date">date</label>
                              <input type="date" class="form-control" id="date" name="date" value="<?php echo $row->date ?>" >
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
                            <button type="submit" name="updateNotice" class="btn btn-primary">Save changes</button>
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

