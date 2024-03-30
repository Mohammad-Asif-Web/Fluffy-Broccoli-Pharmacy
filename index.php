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
            <div class="row">
                <div class="col-12">
                    <!-- slider  -->
                    <section class="splide splide2" aria-label="Splide Basic HTML Example">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <?php
                                $sqlSlider = "SELECT * FROM ecm_slider";
                                $querySlider = $pdo->prepare($sqlSlider);
                                $querySlider->execute();
                                $SliderRowCount = $querySlider->rowCount();

                                for ($i = 1; $i <= $SliderRowCount; $i++) {
                                    $row = $querySlider->fetch(PDO::FETCH_ASSOC);
                                ?>
                                <li class="splide__slide"><img
                                        src="admin/dist/img/slider/<?php echo $row['slider_image'] ?>"
                                        alt="<?php echo $row['slider_title'] ?>" class="w-100"></li>
                                <?php
                                }
                                ?>
                            </ul>
                        </div>
                    </section>
                    <!-- slider end -->
                </div>
            </div>
            
            <!-- Notice Section Marquee -->
            <?php
                $sqlMark = "SELECT * FROM notice";
                $queryMark = $pdo->prepare($sqlMark);
                $queryMark->execute();

                $rowMark = $queryMark->fetch(PDO::FETCH_ASSOC);
            ?>
            <marquee><?php echo $rowMark['body'] ?></marquee>
            
            <!-- Notice Section Marquee End -->

            <!-- Advertise section -->
            <div class="row" style="margin-top: 100px">
                <div class="col-12 d-flex justify-content-around px-0">
                    <?php
                    $sqlAds = "SELECT * FROM ecm_ads";
                    $queryAds = $pdo->prepare($sqlAds);
                    $queryAds->execute();
                    $AdsRowCount = $queryAds->rowCount();

                    for ($i = 1; $i <= $AdsRowCount; $i++) {
                        $row = $queryAds->fetch(PDO::FETCH_ASSOC);
                    ?>
                    <div class="col-md-4 text-left">
                        <a href="">
                            <img src="admin/dist/img/ads/<?php echo $row['ads_image'] ?>"
                                alt="<?php echo $row['ads_title'] ?>" class="w-100 h-75 banner-sd-hover">
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
            <!-- Advertise section End -->

            <!-- FLASH SECTION -->
            <div class="row my-4 products-div">
                <div class="d-flex justify-content-between w-100 products-top">
                    <h4 class="text-uppercase text-secondary ml-2">FLASH SALES</h4>
                    <a href="flash-sale.php" class="btn btn-outline-secondary btn-sm mr-2">View More</a>
                </div>
                <div class="splide splide3 mt-3 w-100" role="group" aria-label="Splide Basic HTML Example">
                    <div class="splide__track">
                        <ul class="splide__list">
                        <?php
                            $sqlFlash = "SELECT * FROM ecm_product LIMIT 20";
                            $queryFlash = $pdo->prepare($sqlFlash);
                            $queryFlash->execute();
                            while($row = $queryFlash->fetch(PDO::FETCH_OBJ)){
                        ?>
                            <!-- p1 -->
                            <li class="splide__slide all_product">
                                <div class="product-grid product-under">
                                    <div class="product-image" style="height: 200px;">
                                    <a href="product-details.php?id=<?php echo $row->serial ?>&cat_id=<?php echo $row->category_id ?>" class="image">
                                            <img src="admin/dist/img/product/<?php echo $row->img ?>" class="w-100 h-100">
                                        </a>
                                        <span class="product-discount-label">-25%</span>
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
                                        <h3 class="title productName"><a href="#"><?php echo $row->name ?></a></h3>
                                        <div class="price">৳ <span class="priceValue"><?php echo $row->mrp_price ?></span></div>
                                    </div>
                                    <a class="add-cart addToCart" data-product-id="<?php echo $row->serial ?>">Add to cart</a>
                                </div>
                            </li>
                        <?php } ?>

                        </ul>
                    </div>
                </div>
            </div>

            <!-- FLASH SECTION end -->

            <!-- Category wise all Product list -->
            <?php 
				$allCat=$mysqli->query("SELECT * FROM `ecm_category` ORDER BY `cat_id` ASC limit 6");
					while($res=mysqli_fetch_assoc($allCat)){
			?>
            <div class="row my-4 products-div">
                <div class="d-flex justify-content-between w-100 products-top">
                    <h4 class="text-uppercase text-secondary ml-2"><?php echo $res['category'];?> <?php echo $res['cat_id'];?></h4>
                    <a href="all-products.php?cat_id=<?php echo $res['cat_id'];?>" class="btn btn-outline-secondary btn-sm mr-2">View More</a>
                </div>
                <section class="product">
                    <button class="pre-btn"><img src="dist/img//arrow.png" alt=""></button>
                    <button class="nxt-btn"><img src="dist/img//arrow.png" alt=""></button>
                    <div class="product-container">
                    <?php
                        $sqlProduct = $mysqli->query("SELECT * FROM ecm_product where `category_id`='".$res['cat_id']."' ORDER BY `serial` DESC  limit 10");
                        while($row = mysqli_fetch_assoc($sqlProduct)){
                    ?>
                        <div class="product-card product-under">
                            <div class="item-image">
                                <span class="discount-tag">50% off</span>
                                <a href="product-details.php?id=<?php echo $row['serial']; ?>&cat_id=<?php echo $row['category_id']; ?>" class="eye-tag"><i class="fa fa-eye"></i></a>
                                <a href="product-details.php?id=<?php echo $row['serial']; ?>&cat_id=<?php echo $row['category_id']; ?>"><img src="admin/dist/img/product/<?php echo $row['img']; ?>" class="product-thumb" alt=""></a>
                            </div>
                            <div class="product-info">
                                <h3 class="product-brand productName"><?php echo $row['name']; ?></h3>
                                <p class="product-short-description">a short line about the cloth..</p>
                                <div class="fw-bold">৳<span class="product-price priceValue"><?php echo $row['mrp_price']; ?></span><span class="actual-price">৳40</span></div>
                                
                            </div>
                            <button class="card-btn addToCart" data-product-id="<?php echo $row['serial']; ?>">add to cart</button>
                        </div>
                    <?php } ?>
                    </div>
                </section>
            </div>
            <?php } ?>
              <!-- Category wise all Product list -->





            <!-- newsletter section start-->
            <?php include "includes/newsletter.php" ?>
            <!-- newsletter section end -->
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

<?php include "includes/footer.php" ?>