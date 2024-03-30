<?php

session_start();
include('../../config/db.php');

if(isset($_GET['delete'])){
    $id = $_GET['delete'];
    $table=base64_decode($_GET["tab"]);

    $check = mysqli_num_rows($conn->query("select `id` from $table where `id`='$id'"));
    if($check > 0){
        $sql = $conn->query("DELETE FROM $table WHERE `id` = '$id'");
        $_SESSION['msg']="Data removed successfully.";
        echo "<script>window.history.back();</script>";
        exit();
    }else{
        $_SESSION['e-msg']="Data not found";
        echo "<script>window.history.back();</script>";
        exit();
    }
}

// ------------ Remove Customer -------------

if(isset($_GET['removeCustomer'])){
    $customerID = $_GET['removeCustomer'];

    $check = mysqli_num_rows($conn->query("select `id` from `customer` where `id`='$customerID'"));
    if($check > 0){
        $sql = $conn->query("DELETE FROM customer WHERE `id` = '$customerID'");
        $_SESSION['msg']="Customer removed successfully.";
        header("location:../customerList.php");
        exit();
    }else{
        $_SESSION['e-msg']="Data not found";
        header("location:../customerList.php");
        exit();
    }
}


// ------------ Remove Manufacturer -------------

if(isset($_GET['removeManufacturer'])){
    $manufacturerID = $_GET['removeManufacturer'];

    $check = mysqli_num_rows($conn->query("select `id` from `manufacturer` where `id`='$manufacturerID'"));
    if($check > 0){
        $sql = $conn->query("DELETE FROM manufacturer WHERE `id` = '$manufacturerID'");
        $_SESSION['msg']="Manufacturer removed successfully.";
        header("location:../manufacturerList.php");
        exit();
    }else{
        $_SESSION['e-msg']="Data not found";
        header("location:../manufacturerList.php");
        exit();
    }
}


// ------------ Remove Medicine -------------

if(isset($_GET['removeMedicine'])){
    $medicineID = $_GET['removeMedicine'];

    $check = mysqli_num_rows($conn->query("select `id` from `medicine` where `id`='$medicineID'"));
    if($check > 0){
        $sql = $conn->query("DELETE FROM medicine WHERE `id` = '$medicineID'");
        $_SESSION['msg']="Medicine removed from list successfully.";
        header("location:../medicineList.php");
        exit();
    }else{
        $_SESSION['e-msg']="Data not found";
        header("location:../medicineList.php");
        exit();
    }
}


// ------------- Redirect to home page

header("location:../index.php");
exit();