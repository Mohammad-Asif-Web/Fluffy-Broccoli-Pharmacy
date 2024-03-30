<?php
// session_start();
session_start();

if(isset($_POST['buy-product']) && isset($_SESSION['WebCopyStaff'])){
    include('../config/db.php');
    $ProductsArray = json_decode($_POST['all-products-array'], true);
    // print_r($ProductsArray);

    print "<pre>";
    print_r($ProductsArray);
    print "</pre>";

    echo "<br><br>";
    foreach($ProductsArray as $product => $val) {
    echo "$product = $val<br>";
    }

    $cash = $_POST['cash'];
    $customer_name = $_POST['customer_name'];
    $customer_phone = $_POST['customer_phone'];
    $customer_city = $_POST['customer_city'];
    $customer_addr = $_POST['customer_addr'];
    $delivery_label = $_POST['label'];
    // print_r($ProductsArray);
    echo "<br><br><br>";
    echo "<pre>
            $cash
            $customer_name
            $customer_phone
            $customer_city
            $customer_addr
            $delivery_label
        </pre>";
} else {
    $_SESSION['msgt1']='Please login your id';
    session_destroy();
    header("location:../login.php");
    exit();
}

