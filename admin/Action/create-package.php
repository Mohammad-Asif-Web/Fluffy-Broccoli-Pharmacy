<?php 
	session_start();
	if((!isset($_POST['submit']))){
		$_SESSION['msg']="Invalite Your User Id And Password";
		header("location:../create-package.php");
		exit();
	}else{
		include("../../config/db.php");
		
		$PackageName=$mysqli->real_escape_string($_POST['PackageName']);
		$refCommission=$mysqli->real_escape_string($_POST['refCommission']);
		$monthlyBenefit=$mysqli->real_escape_string($_POST['monthlyBenefit']);
		$Amount=$mysqli->real_escape_string($_POST['Amount']);
		$type=$mysqli->real_escape_string($_POST['type']);
		$MonthCount=$mysqli->real_escape_string($_POST['MonthCount']);
		
		$Chk=0;
		if($PackageName==''){
			$Chk=1;
			$_SESSION['msg1']='Enter your package name';
			header("location:../create-package.php");
			exit();
		}
		if($refCommission==''){
			$Chk=1;
			$_SESSION['msg1']='Enter your reffer commission';
			header("location:../create-package.php");
			exit();
		}
		if($monthlyBenefit==''){
			$Chk=1;
			$_SESSION['msg1']='Enter your monthly benefit';
			header("location:../create-package.php");
			exit();
		}
		if($Amount==''){
			$Chk=1;
			$_SESSION['msg1']='Enter your amount';
			header("location:../create-package.php");
			exit();
		}
		
		if($Chk==0){
			$mysqli->query("INSERT INTO `package`(`name`, `amount`, `refCommission`, `monthlybenefit`,`mobthcount`,`type`) VALUES ('".$PackageName."','".$Amount."','".$refCommission."','".$monthlyBenefit."','".$MonthCount."','".$type."')");
			$_SESSION['msg']='Create your package';
			header("location:../create-package.php");
			exit();
		}else{
			$_SESSION['msg1']='Something wrong try later...';
			header("location:../create-package.php");
			exit();
		}
	}
?>