<!-- head -->
<?php
// session_start();
include('config/db.php');

include "includes/head.php";
include "includes/cart.php";
include "includes/navbar.php";
include "includes/sidebar.php";

$cat_id = $_GET['id']; 
// $product_cat = $_GET['category'];

?>
  <!-- sidebar.php end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- product details -->
        <!-- Related Product Sections -->
        <div class="row">
          <div class="col-12">
            <h4 class="text-dark">Category: <?php echo $product_cat ?></h4>
          </div>
            <!-- product 1 -->
            <?php
                $sqlProduct = "SELECT * FROM ecm_product WHERE category_id = :category";
                $queryProduct = $pdo->prepare($sqlProduct);
                $queryProduct->bindParam(':category', $cat_id);
                $queryProduct->execute();
                while($row = $queryProduct->fetch(PDO::FETCH_OBJ)){
            // $sqlProduct = $mysqli->query("SELECT * FROM ecm_product WHERE category = '".$product_id."'");
            //         while($row = mysqli_fetch_assoc($sqlProduct)){
            ?>
          <div class="products-data my-3">
            <div class="product-grid product-under">
                <div class="product-image" style="height: 200px;">
                    <a href="product-details.php?id=<?php echo $row->serial ?>&cat_id=<?php echo $row->category_id ?>" class="image h-100">
                        <img src="admin/dist/img/product/<?php echo $row->img; ?>" class="w-100 h-100">
                    </a>
                    <!-- <span class="product-discount-label">-25%</span> -->
                    <ul class="product-links">
                        <li>
                          <a href="" title="save">
                            <i class="fa fa-heart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="product-details.php?id=<?php echo $row->serial ?>&cat_id=<?php echo $row->category_id ?>" title="details">
                            <i class="fa fa-eye"></i>
                          </a>
                        </li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title productName"><a href="#"><?php echo $row->name; ?></a></h3>
                    <div class="price">৳ <span class="priceValue"><?php echo $row->mrp_price; ?></span></div>
                </div>
                <a class="add-cart addToCart" data-product-id="<?php echo $row->serial; ?>">Add to cart</a>
            </div>
          </div>
            <?php 
                }
            ?>

        </div>
        <!-- newsletter section start-->
        <?php include "includes/newsletter.php" ?>
        <!-- newsletter section end -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->


<?php include "includes/footer.php" ?>
