<?php
	session_start();
	if(!isset($_POST['submit'])){
		$_SESSION['msg']="Invalid User Id And Password";
		header("location:../login.php");
		exit();
	}else{
		include("../config/db.php");
		
		$identity=$mysqli->real_escape_string($_POST['identity']);
		$pass=$mysqli->real_escape_string($_POST['pass']);
		
		if($identity==""){
			$_SESSION['msg']="Enter Your Username";
			header("location:../login.php");
			exit();
		}
		if($pass==""){
			$_SESSION['msg']="Enter Your Password";
			header("location:../login.php");
			exit();
		}
		
		$user=$mysqli->query("SELECT * FROM `member` WHERE `log_user`='".$identity."' && `password`='".$pass."' && `chk`='0'");
		$count=mysqli_num_rows($user);
		$fetch=mysqli_fetch_assoc($user);
		
		if($count>0){
			$_SESSION['WebCopyStaff']=$fetch['user'];
			header("location:../member/index.php");
			exit();
			
		}else{
			session_destroy();
			$_SESSION['msg']="Invalid Number And Password";
			header("location:../login.php");
			exit();
		}
		 
		
	}
?>

<!-- if($_SERVER['HTTP_REFERER'] == ) -->