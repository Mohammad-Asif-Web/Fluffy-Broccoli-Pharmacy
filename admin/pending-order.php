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

if(isset($_POST['success-order']) || isset($_POST['cancel-order'])){
  $id = $_POST['id'];
  $invoice = $_POST['invoice'];
  $date = $_POST['date'];
  $username = $_POST['username'];
  $product = $_POST['product'];
  // $price = $_POST['price'];
  $quantity = $_POST['quantity'];
  $total_price = $_POST['total-price'];
  
  // $image_name = $_FILES['image']['name'];
  // $image_tmp_name = $_FILES['image']['tmp_name'];
  // $path = "dist/img/order/".$image_name;
  // move_uploaded_file($image_tmp_name, $path);

  // echo "<pre>
  //         {$id}
  //         {$invoice}
  //         {$date}
  //         {$username}

  //      </pre>";
  if(isset($_POST['success-order'])){
    $sqlInsert = "INSERT INTO order_success (invoice_no, date, username, product, quantity, total_price) 
    VALUES(:invoice, :date, :username, :product, :quantity, :total_price);
    DELETE FROM order_pending WHERE order_id = :id" ;

    $queryInsert = $pdo->prepare($sqlInsert);
    $queryInsert->bindParam(':id', $id);
    $queryInsert->bindParam(':invoice', $invoice);
    $queryInsert->bindParam(':date', $date);
    $queryInsert->bindParam(':username', $username);
    $queryInsert->bindParam(':product', $product);
    $queryInsert->bindParam(':quantity', $quantity);
    $queryInsert->bindParam(':total_price', $total_price);


    if($queryInsert->execute()){
    $_SESSION['msg']="{$product} Product Delivery Success";
    }
  }

  if(isset($_POST['cancel-order'])){
    $sqlInsert = "INSERT INTO order_cancel (invoice_no, date, username, product, quantity, total_price) 
    VALUES(:invoice, :date, :username, :product, :quantity, :total_price);
    DELETE FROM order_pending WHERE order_id = :id" ;

    $queryInsert = $pdo->prepare($sqlInsert);
    $queryInsert->bindParam(':id', $id);
    $queryInsert->bindParam(':invoice', $invoice);
    $queryInsert->bindParam(':date', $date);
    $queryInsert->bindParam(':username', $username);
    $queryInsert->bindParam(':product', $product);
    $queryInsert->bindParam(':quantity', $quantity);
    $queryInsert->bindParam(':total_price', $total_price);


    if($queryInsert->execute()){
    $_SESSION['msg']="{$product} Product Delivery Cancel";
    }
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
                  <a href="pending-order.php" class="btn btn-sm mr-1 text-warning text-uppercase"><i class="fa fa-hourglass-end" aria-hidden="true"></i> Pending Order</a>
                </div>
                <div class="text-right mx-2">
                  <a href="success-order.php" class="btn btn-success text-white btn-sm mr-1"><i class="fa fa-check" aria-hidden="true"></i> Success Order</a>
                </div>
                <div class="text-right">
                  <a href="cancel-order.php" class="btn btn-danger text-white btn-sm mr-1"><i class="fa fa-ban" aria-hidden="true"></i> Cancel Order</a>
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
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Total Price</th>
                        <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                        $sql = "SELECT * FROM order_pending ORDER BY order_id DESC";
                        $query = $pdo->prepare($sql);
                        $query->closeCursor(); //
                        $query->execute();
                        
                        $sl = 1;
                        while($row = $query->fetch(PDO::FETCH_OBJ)){
                    ?>
                        <tr>
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                                <td class="text-capitalize">
                                    <?php echo $sl++ ?>
                                    <input type="hidden" value="<?php echo $row->order_id ?>" name="id">
                                </td>
                                <td class="text-capitalize">
                                    <input type="text" class="form-control" value="<?php echo $row->invoice_no ?>" name="invoice">
                                </td>
                                <td class="text-capitalize">
                                    <input type="text" class="form-control" value="<?php echo $row->date ?>" name="date">
                                </td>
                                <td class="text-capitalize">
                                    <input type="text" class="form-control" value="<?php echo $row->username ?>" name="username">
                                </td>
                                <td class="text-capitalize">
                                    <input type="text" class="form-control" value="<?php echo $row->product ?>" name="product">
                                </td>
                                <td class="text-capitalize">
                                    <img src="dist/img/order/" alt="">
                                    <input type="hidden" class="form-control" value="<?php echo $row->image ?>" name="image">
                                </td>
                                <td class="text-capitalize">
                                    <input type="number" class="form-control" value="<?php echo $row->price ?>" name="price" readonly>
                                </td>
                                <td class="text-capitalize">
                                    <input type="number" class="form-control" value="<?php echo $row->quantity ?>" name="quantity" readonly>
                                </td>
                                <td class="text-capitalize">
                                    <input type="number" class="form-control" value="<?php echo $row->total_price ?>" name="total-price" readonly>
                                </td>
                                <td>
                                    <button type="submit" class="btn btn-sm btn-success mb-1" name="success-order"><i class="fa fa-check" aria-hidden="true"></i> Success</button>
                                    <button type="submit" class="btn btn-sm btn-danger" name="cancel-order"><i class="fa fa-ban" aria-hidden="true"></i> Cancel</button>
                                </td>
                            </form>
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

