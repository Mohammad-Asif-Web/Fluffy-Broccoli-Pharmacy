<!-- head -->
<?php 
// session_start();
include('config/db.php');

include "includes/head.php";
include "includes/cart.php";
include "includes/navbar.php";
include "includes/sidebar.php";


?>
  <!-- sidebar.php end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- Related Product Sections -->
        <div class="row" id="add-row">
          <div class="col-12">
            <h4 class="text-dark">Healthcare Products</h4>
          </div>
          <?php
              $cat_id = $_GET['cat_id'];
              $sqlProduct = "SELECT * FROM ecm_product WHERE category_id = $cat_id LIMIT 2";
              $queryProduct = $pdo->prepare($sqlProduct);
              $queryProduct->execute();
              $last_id = '';
              while($row = $queryProduct->fetch(PDO::FETCH_OBJ)){
          ?>
          <div class="products-data my-3">
            <div class="product-grid product-under">
                <div class="product-image" style="height: 200px;">
                    <a href="product-details.php?id=<?php echo $row->serial ?>
                        &cat_id=<?php echo $row->category_id ?>" class="image">
                        <img src="admin/dist/img/product/<?php echo $row->img ?>" class="w-100 h-100">
                    </a>
                    <!-- <span class="product-discount-label">-25%</span> -->
                    <ul class="product-links">
                        <li>
                          <a href="" title="save">
                            <i class="fa fa-heart"></i>
                          </a>
                        </li>
                        <li>
                          <a href="product-details.php?id=<?php echo $row->serial ?>
                            &cat_id=<?php echo $row->category_id ?>" title="details">
                            <i class="fa fa-eye"></i>
                          </a>
                        </li>
                    </ul>
                </div>
                <div class="product-content">
                    <h3 class="title productName"><a href="#"><?php echo $row->name ?></a></h3>
                    <div class="price">৳ <span class="priceValue"><?php echo $row->mrp_price ?></span></div>
                </div>
                <a class="add-cart addToCart" data-product-id="<?php echo $row->serial ?>">Add to cart</a>
            </div>
          </div>
          <?php 
            $last_id = $row->serial;
            }
          ?>
          <div id="remove-data" style="place-self: center; margin: 20px auto 30px auto;">
              <button class="btn btn-info btn-sm" id="load-more" data-last="<?php echo $last_id ?>" data-cat="<?php echo $cat_id; ?>">Load More..</button>
          </div>

        </div>
        <!-- newsletter section start-->
        <?php include "includes/newsletter.php"?>
        <!-- newsletter section end -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include "includes/footer.php" ?>

