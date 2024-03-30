<!-- head -->
<?php
// session_start();
include('config/db.php');

include "includes/head.php";
include "includes/cart.php";
include "includes/navbar.php";
include "includes/sidebar.php";

$product_id = $_GET['id'];
$cat_id = $_GET['cat_id'];

?>
  <!-- sidebar.php end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- product image details -->
        <?php
        $sql = "SELECT * FROM ecm_product WHERE serial = :id";
        $query = $pdo->prepare($sql);
        $query->bindParam(':id', $product_id);
        $query->execute();
        if($query->rowCount() > 0){
            while($row = $query->fetch(PDO::FETCH_OBJ)){
        ?>
        <div class="row mt-3 pro-detail">
          <div class="col-md-12">
            <div class="card">
              <div class="card-body">
                <div class="row mt-3">
                  <!-- product image section -->

                  <div class="col-md-8">
                    <div class="card detail-img">
                      <div class="card-body ">
                        <div class="row h-100">
                          <!-- 3 small img card -->
                          <div class="col-md-3 d-md-block d-sm-flex img-row">
                            <div class="card mb-2">
                              <div class="card-body">
                                <img class="sm-img" style="width: 100%; height:150px" src="admin/dist/img/product/<?php echo $row->img ?>" alt="<?php echo $row->name ?>">
                              </div>
                            </div>
                            <div class="card mb-2">
                              <div class="card-body">
                                <img class="sm-img" style="width: 100%; height:150px" src="dist/img/slider-3.jpg" alt="">
                              </div>
                            </div>
                            <div class="card mb">
                              <div class="card-body">
                                <img class="sm-img" style="width: 100%; height:150px" src="dist/img/slider-4.jpg" alt="">
                              </div>
                            </div>
                          </div>
                          <!-- 3 small img card end -->
                          <!-- 1 big img card -->
                          <div class="col-md-9">
                            <div class="card">
                              <div class="card-body">
                                <img class="big-img" style="width: 100%; height:545px" src="admin/dist/img/product/<?php echo $row->img ?>" alt="<?php echo $row->name ?>">
                              </div>
                            </div>
                          </div>
                          <!-- 1 big img card end -->
                        </div>
                      </div>
                    </div>
                  </div>

                  <!-- product image section end -->
                  <div class="col-md-4 col-sm-6">
                    <div class="card detail">
                      <div class="card-body ">
                        <h4 class=" text-dark font-weight-bold" style="text-decoration: underline;"><?php echo $row->name ?></h4>
                        <p class="company text-dark"><?php echo $row->brand ?></p>
                        <span class="price"><?php echo $row->mrp_price ?></span>
                        <span class="d-block discount">
                          <del>৳ 8.00</del>
                          <!-- <small class="text-red font-weight-bold"> 10% off</small> -->
                        </span>
                        <div class="count">
                          <button onclick="increment()" class="button-minus" data-id="<?php echo $row->serial ?>">+</button>  
                          <span id="counting" class="counting">0</span>
                          <button onclick="decrement()" class="button-plus" data-id="<?php echo $row->serial ?>">-</button> 
                        </div>
                        <a href="#" class="btn bg-blue2 text-white w-100 add-cart addToCart" data-product-id="<?php echo $row->serial ?>">
                          <i class="fas fa-cart-plus"></i>
                          Add to Card
                        </a>

                        <!-- <div class="cart-btn">
                          <a href="#" class=" btn btn-outline-light">
                            <i class="fas fa-heart"></i>
                            Wishlist
                          </a>
                          <a href="#" class=" btn btn-outline-light">
                            <i class="fas fa-share"></i>
                            Share
                          </a>
                        </div> -->
                        <span class="text-dark dt-cat d-block mt-2">Category: <small><?php echo $row->category_id ?></small></span>
                        <!-- <span class="d-block text-dark dt-tag">Tags: <small>Health, LifeStyle</small></span> -->
                        <h5 class="mt-4">About <?php echo $row->name ?>:</h5>
                        <p><?php echo $row->short_desc ?></p>
                      </div>
                    </div>
                  </div>
                  
                </div>                
              </div>
            </div>
          </div>
        </div>
        <?php
        }
      }
        ?>

        <!-- product Details End -->

        <!-- Product Description -->
        <div class="row pro-desc">
          <div class="card w-100">
            <div class="card-body">
              <!-- description header -->
              <div class="desc-head">
                <h5 class="mb-0">Description</h5>
                <span>Additional information</span>
              </div>
              <!-- Description information -->
              <div class="desc-info">
                <h6>Indication</h6>
                <p>Fever, Mild to moderate pain, osteoarthritis, rheumatold arthritis, chroic low back pain, Renal stone pain, neuropathic pain, toolhache.<br>Migraine, postoperative mild to moderate pain.</p>
                <h6>Administration</h6>
                <p>May be taken with or without food.</p>
                <h6>Adult Dose</h6>
                <p>Oral Mild to moderate pain and fever Tablet Adult: 1-2 tablets every 4 to 6 hours up to a maximum of 4g (8tablets) daily Extended Release (XR) Tablet Adults: 2 tablets, swallowed whole every 6 to 8 hours (maximum of 6 tablets in any 24 hours).<br>
                Syrup/Suspension: Adults 4-8 Measuring spoonful 3-4 times daily; Rectal Suppository Adults; 500 mg-1 every 4-6 hours to a maximum of 4g daily.</p>
                <h6>Copntraindication</h6>
                <p>Hypersensitivity.</p>
                <h6>Mode of Action</h6>
                <p>Paracetamol exhibits analgesic action by peripheral blockage of pain impulse generation. It produces antipyresis by.inhibiting the hypothalamic heat-regulating centre. Its weak anti-inflammatory activity is related to inhibition ofprostaglandin synthesis in the CNS.</p>
              </div>
              <!-- Additional Information -->
              <div class="add-info w-100">
                <h6>Size</h6>
                <p>Some Size info will go there</p>
                <h6>Expired Date</h6>
                <p>Date Date will be here</p>
                <h6>MFG Date</h6>
                <p>MFG Date will be here</p>
                <h6>Company Info</h6>
                <p>The medicine company info will be here</p>
              </div>
            </div>
          </div>
        </div>
        <!-- product description End -->

        <!-- Related Product Sections -->
        <div class="row products-div">
			    <div class="col-12">
				    <h4 class="text-dark">Related Products</h4>
			    </div>
          <section class="product">
                <button class="pre-btn"><img src="dist/img//arrow.png" alt=""></button>
                <button class="nxt-btn"><img src="dist/img//arrow.png" alt=""></button>
                <div class="product-container">
                    <?php
                      $sqlProduct = "SELECT * FROM ecm_product WHERE category_id = $cat_id";
                      $queryProduct = $pdo->prepare($sqlProduct);
                      $queryProduct->execute();
                      while($row = $queryProduct->fetch(PDO::FETCH_OBJ)){
                    ?>
                    <div class="product-card product-under">
                        <div class="item-image">
                            <span class="discount-tag">50% off</span>
                            <a href="product-details.php?id=<?php echo $row->serial ?>&cat_id=<?php echo $row->category_id ?>" class="eye-tag"><i class="fa fa-eye"></i></a>
                            <a href="product-details.php?id=<?php echo $row->serial ?>&cat_id=<?php echo $row->category_id ?>"><img src="admin/dist/img/product/<?php echo $row->img ?>" class="product-thumb" alt=""></a>
                        </div>
                        <div class="product-info">
                            <h3 class="product-brand productName"><?php echo $row->name ?></h3>
                            <p class="product-short-description">a short line about the cloth..</p>
                            <div class="fw-bold">৳<span class="product-price priceValue"><?php echo $row->mrp_price ?></span><span class="actual-price">৳40</span></div>
                            
                        </div>
                        <button class="card-btn addToCart" data-product-id="<?php echo $row->serial ?>">add to cart</button>
                    </div>
                    <?php } ?>
                </div>
            </section>

        </div>
        <!-- newsletter section start-->
        <?php include "includes/newsletter.php" ?>
        <!-- newsletter section end -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->


<?php include "includes/footer.php" ?>
