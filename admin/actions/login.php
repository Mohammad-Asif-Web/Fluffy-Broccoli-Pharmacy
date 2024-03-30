<?php

if(!isset($_POST['btnLogin'])){
    echo "<script>window.history.back();</script>";
	exit();
}else{

    session_start();
    include('../../config/db.php');

    $userid = $_POST['userid'];
    $pwd = $_POST['pwd'];
    if(empty($userid)){
        $_SESSION['e-msg']="Enter your user ID";
        echo "<script>window.history.back();</script>";
        exit();
    }
    if(empty($pwd)){
        $_SESSION['e-msg']="Enter your password";
        echo "<script>window.history.back();</script>";
        exit();

    } else {
        $sql = "SELECT * FROM admin WHERE logid= :logid AND pass=:pass ";
        $query = $pdo->prepare($sql);
        $query->bindParam(':logid', $userid);
        $query->bindParam(':pass', $pwd);
        $query->execute();
        // ($query->rowCount > 0)  is equivalent to (mysqli_num_row > 0)
        if($query->rowCount() > 0){
            $adminId = $query->fetch(PDO::FETCH_ASSOC);
            $_SESSION['pharmacyAdmin'] =$adminId['uid'];
            $_SESSION['adminLogId'] = $adminId['logid'];
            header("location:../index.php");
            exit();
        }else{
            $_SESSION['e-msg']="Invalid user input";
            echo "<script>window.history.back();</script>";
            exit();
        }
    }

}