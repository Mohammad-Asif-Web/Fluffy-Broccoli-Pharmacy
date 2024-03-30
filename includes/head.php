<?php

$fileName = basename($_SERVER['PHP_SELF']);
$pageTitle = '';

switch($fileName){
    case "index.php":
        $pageTitle = "Ecommerce Home Page ";
        break;
    case "category.php":
          if(isset($_GET['id'])){
            $cat_id = $_GET['id'];
            $sql = "SELECT * FROM ecm_category WHERE cat_id = $cat_id";
            $query = $pdo->prepare($sql);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            $pageTitle = $row->category. ' Category Page';
        } else {
            echo "Category Not Found";
        }
        break;
    case "product-details.php":
          if(isset($_GET['id'])){
            $id = $_GET['id'];
            $sql = "SELECT * FROM ecm_product WHERE serial = $id";
            $query = $pdo->prepare($sql);
            $query->execute();
            $row = $query->fetch(PDO::FETCH_OBJ);
            $pageTitle = $row->name. ' Product Details Page';
        } else {
            echo "Product Not Found";
        }
        break;
      case "about-us.php":
        $pageTitle = "About Us Page ";
        break;
      case "contact-us.php":
        $pageTitle = "Contact Us Page ";
        break;
      case "digital-payment.php":
        $pageTitle = "Digital Payment Page ";
        break;
      case "policy.php":
        $pageTitle = "Privacy & Policy Page ";
        break;
      case "terms.php":
        $pageTitle = "Terms & Condition Page ";
        break;
      case "refund.php":
        $pageTitle = "Return & Refund Page ";
        break;

    default:
    $pageTitle = "Ecommerce Website ";
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?php echo $pageTitle; ?></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="dist/css/custom.css">
  <link rel="stylesheet" href="plugins/splidejs/splide.min.css">
</head>
<body class="hold-transition sidebar-mini layout-fixed">