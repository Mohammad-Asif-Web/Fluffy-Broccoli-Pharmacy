<?php
include('../config/db.php');
$last_id = $_POST['last_id'];
$cat_id = $_POST['cat_id'];
$data = $mysqli->query("SELECT * FROM ecm_product WHERE category_id = $cat_id AND serial > $last_id ORDER BY serial LIMIT 2");
// print_r($data);

$output = "";
while($row = mysqli_fetch_assoc($data)){
    $output .= "

      <div class='products-data my-3'>
        <div class='product-grid product-under'>
            <div class='product-image' style='height: 200px;'>
                <a href='product-details.php?id= ".$row["serial"]."&cat_id={$row['category_id']}' class='image'>
                    <img src='admin/dist/img/product/{$row['img']}' class='w-100 h-100'>
                </a>
                <!-- <span class='product-discount-label'>-25%</span> -->
                <ul class='product-links'>
                    <li>
                      <a href='' title='save'>
                        <i class='fa fa-heart'></i>
                      </a>
                    </li>
                    <li>
                      <a href='product-details.php?id={$row['serial']}&cat_id={$row['category_id']}' title='details'>
                        <i class='fa fa-eye'></i>
                      </a>
                    </li>
                </ul>
            </div>
            <div class='product-content'>
                <h3 class='title productName'><a href='#'>{$row['name']}</a></h3>
                <div class='price'>৳ <span class='priceValue'> {$row['mrp_price']}</span></div>
            </div>
            <a class='add-cart addToCart' data-product-id='".$row['serial']."'>Add to cart</a>
        </div>
      </div>
    ";
    $last_id = $row['serial'];
}

$output .= "
        <div id='remove-data' style='place-self: center; margin: 20px auto 30px auto;'>
            <button class='btn btn-info btn-sm' id='load-more' data-last='".$last_id."' data-cat='".$cat_id."'>Load More..</button>
        </div>
    ";

    echo $output;

// echo "<div style='color:red; background: #000;'>This is ajax Request</div>";
