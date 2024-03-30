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


?>
    <!--  Sidebar end -->

      <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
  <!-- Content Header (Page header) -->
  <!-- <section class="content-header p-0">
    <div class="container-fluid">
      <div class="row mb-5 bg-white py-1 px-4">
          <h2 class="font-weight-bold">Order</h2>
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
              <div class="d-flex gap-3 align-items-center">
                <div class="text-right">
                  <a href="pending-order.php" class="btn btn-warning text-white btn-sm mr-1"><i class="fa fa-hourglass-end" aria-hidden="true"></i> Pending Order</a>
                </div>
                <div class="text-right mx-2">
                  <a href="success-order.php" class="btn btn-sm btn-success text-white mr-1"><i class="fa fa-check" aria-hidden="true"></i> Success Order</a>
                </div>
                <div class="text-right">
                  <a href="cancel-order.php" class="btn btn-sm text-danger mr-1 text-uppercase border-bottom-1"><i class="fa fa-ban" aria-hidden="true"></i> Cancel Order</a>
                </div>
              </div>
            </div>
            <div class="card-body">
            <table id="example1" class="table table-bordered table-hover">
                    <thead>
                      <tr class="bg-info">
                          <th>SL</th>
                          <th>Invoice No</th>
                          <th>Date</th>
                          <th>User Name</th>
                          <th>Product</th>
                          <th>Image</th>
                          <th>Quantity</th>
                          <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM order_cancel ORDER BY order_id DESC";
                        $query = $pdo->prepare($sql);
                        $query->execute();
                        $sl = 1;
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                      <tr>
                          <td class="text-capitalize"><?php echo $sl++ ?></td>
                          <td class="text-capitalize"><?php echo $row->invoice_no ?></td>
                          <td class="text-capitalize"><?php echo $row->date ?></td>
                          <td class="text-capitalize"><?php echo $row->username ?></td>
                          <td class="text-capitalize"><?php echo $row->product ?></td>
                          <td class="text-capitalize"><?php echo $row->image ?></td>
                          <td class="text-capitalize"><?php echo $row->quantity ?></td>
                          <td class="text-capitalize"><?php echo $row->total_price ?></td>
                      </tr>
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

