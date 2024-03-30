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

  // selecting image name
  $sqlLink = "SELECT * FROM ecm_ads WHERE ads_id = :del_id";
  $queryLink = $pdo->prepare($sqlLink);
  $queryLink->bindParam(':del_id', $del_id);
  $queryLink->execute();
  $link = $queryLink->fetch(PDO::FETCH_OBJ);
  $ads_img = $link->ads_image;

  // deleting ads
  $sql = "DELETE FROM ecm_ads WHERE ads_id = :del_id";
  $query = $pdo->prepare($sql);
  $query->bindParam(':del_id', $del_id);
  if($query->execute()){

    unlink("dist/img/ads/{$ads_img}");

    $_SESSION['msg']="Ads {$del_id} Deleted";
    header("refresh: ads-list.php");
  }
}

if(isset($_POST['updateAds'])){
  $id = $_POST['id'];
  $title = $_POST['title'];

  $New_image = $_FILES['new-image']['name'];
  $old_image = $_POST['old-image'];
  // if new image is not empty
  if($New_image != ''){
    $update_name = $New_image;
  } else {
    $update_name = $old_image;
  }

  $sqlUpd = "UPDATE ecm_ads 
            SET ads_title=:title, ads_image=:image, date=:date  
            WHERE ads_id = :id 
            "; 
  $queryUpd = $pdo->prepare($sqlUpd);
  $queryUpd->bindParam(':id', $id);
  $queryUpd->bindParam(':title', $title);

  $queryUpd->bindParam(':image', $update_name);
  $queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){
        if($New_image != ''){
          move_uploaded_file($_FILES['new-image']['tmp_name'], "dist/img/ads/".$New_image);
          unlink("dist/img/ads/".$old_image);
        }
        header("refresh: ads-list.php");
        $_SESSION['msg'] = "Ads {$id} Updated Successfully";
        

    } else {
      $_SESSION['e-msg'] = "Ads {$id} Not Updated";
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
                        <h6 class="fs-17 font-weight-600 mb-0">Advertise List</h6>
                      </div>
                      <div class="text-right">
                        <a href="add-ads.php" class="btn btn-secondary btn-sm mr-1"><img src="dist/img/icon/ads.png" class="mr-2" alt="" style="width: 20px;">Add New Advertise</a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body">
                  <table id="example1" class="table table-bordered table-hover">
                      <thead>
                        <tr class="bg-info">
                          <th>SL</th>
                          <th>Ads Title</th>
                          <th>Ads Image</th>
                          <th>Date</th>
                          <!-- <th>Edit</th> -->
                          <th>Action</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $sql = "SELECT * FROM ecm_ads ORDER BY ads_id DESC";
                      $query = $pdo->prepare($sql);
                      $query->execute();
                      $sl = 1;

                      while($row = $query->fetch(PDO::FETCH_OBJ)){
                      ?>
                        <tr>
                          <td class="text-capitalize"><?php echo $sl++ ?></td>
                          <td class="text-capitalize"><?php echo $row->ads_title ?></td>
                          <td class="text-capitalize"><img src="dist/img/ads/<?php echo $row->ads_image ?>" alt="" style="width: 120px; height: 50px;"> </td>
                          
                          <td class="text-capitalize"><?php echo $row->date ?></td>
                          <td>
                          <a data-toggle="modal" data-target="#edit<?php echo $row->ads_id ?>">
                              <button class="btn btn-sm btn-primary"><i class="fa fa-edit"></i> Edit</button>
                            </a>
                            <a href="ads-list.php?id=<?php echo $row->ads_id ?>"><button class="btn btn-sm btn-danger"
                            name="delete">Delete</button></a>
                          </td>
                        </tr>
                             <!-- Edit Modal -->
                             <div class="modal fade" id="edit<?php echo $row->ads_id ?>" tabindex="-1" aria-hidden="true">
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
                                  <input type="hidden" name="id" value="<?php echo $row->ads_id ?>">
                                
                                  <!-- title -->
                                  <div class="form-group">
                                    <label for="title">Title</label>
                                    <input type="text" class="form-control" id="title" name="title" value="<?php echo $row->ads_title ?>">
                                  </div>
                                  <!-- Date -->
                                  <div class="form-group">
                                    <label for="date">Date</label>
                                    <input type="date" class="form-control" id="date" name="date" value="<?php echo $row->date ?>">
                                  </div>
                                  <!-- image -->
                                  <div class="form-group">
                                    <label>old Image</label>
                                    <img src="dist/img/ads/<?php echo $row->ads_image ?>" class="form-control border-0 w-25 h-25">
                                    <input type="hidden" name="old-image" value="<?php echo $row->ads_image ?>">
                                  </div>
                                  <div class="form-group">
                                    <label for="new-image">Upload New Image</label>
                                    <input type="file" id="new-image" class="form-control border-0" name="new-image">
                                  </div>
                                </div>
                                <!-- button -->
                                <div class="modal-footer">
                                  <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                  <button type="submit" name="updateAds" class="btn btn-primary">Save changes</button>
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

