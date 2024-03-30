<?php

$fileName = basename($_SERVER['PHP_SELF']);
$pageTitle = '';

switch($fileName){
    case "index.php":
        $pageTitle = "Admin Dashboard";
        break;
    case "profile.php":
        $pageTitle = "Admin Profile";
        break;
    case "change-password.php":
        $pageTitle = "Reset Password";
        break;
    case "add-slider.php":
        $pageTitle = "Add Slider";
        break;
    case "slider-list.php":
        $pageTitle = "Slider List";
        break;
    case "add-ads.php":
        $pageTitle = "Add Ads";
        break;
    case "ads-list.php":
        $pageTitle = "Ads List";
        break;
    case "add-product.php":
        $pageTitle = "Add Product";
        break;
    case "manage-product.php":
        $pageTitle = "Product List";
        break;
    case "manage-product.php":
        $pageTitle = "Product List";
        break;
    case "add-category.php":
        $pageTitle = "Add Category";
        break;
    case "manage-category.php":
        $pageTitle = "Category List";
        break;
    case "manage-notice.php":
        $pageTitle = "Notice";
        break;
    case "create-package.php":
        $pageTitle = "Create Package | List";
        break;
    default:
    $pageTitle = "Admin | Dashboard";
}

?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $pageTitle; ?></title>

    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <!-- JQVMap -->
    <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="dist/css/adminlte.min.css">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
    <!-- summernote -->
    <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css">
    <!-- custom css -->
    <link rel="stylesheet" href="dist/css/custom.css">
  </head>
  <body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
