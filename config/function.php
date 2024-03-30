<?php
	// Store upline
	function UplineUser($Userid,&$UplineUser){
		global $mysqli;
		$Reffer=$mysqli->query("select * from `member` where `user`='".$Userid."'");
		while($res=mysqli_fetch_assoc($Reffer)){
			if($res['sponsor']=='0'){
				break;
			}else{
				$UplineUser[]=$res['sponsor'];
				UplineUser($res['sponsor'],$UplineUser);
			}
		}
	}
	
	function downUser($users,$table){
		global $mysqli;
		$fff=array();
		if(is_array($users)){
			foreach($users as $user){
				$uu=$mysqli->query("select * from `$table` where `sponsor`='".$user."' ");
				while($spp=mysqli_fetch_assoc($uu)){
					array_push($fff, $spp['user']);
				}
			}
		}else{
			$uu=$mysqli->query("select * from `$table` where `sponsor`='".$users."' ");
			while($spp=mysqli_fetch_assoc($uu)){
				array_push($fff, $spp['user']);
			}
		}
		return $fff;
	}
	
	// Generation Distrebute Start
	function daily_in($userlist,$amount){
		global $mysqli;
		global $prev_day;
		$date=date("Y-m-d");
		$iiiin=implode("' || `user`='", $userlist);
		$rrett="(`user`='".$iiiin."') and DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m')";
		$ttyy=mysqli_fetch_assoc($mysqli->query("SELECT SUM(`amount`) AS total FROM `investmentprofit` WHERE  $rrett and DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m')"));
		$total=($ttyy['total']*$amount)/100;
		return $total;
	}
	
	function MonthlyProfitGeneration($U_ID){
		global $mysqli;
		$date=date("Y-m-d");
		$yyy22=array();
		$yyy=array();
		$urt=array(12.50,2.5,2.5,1.25,1.25,1.25,1.25,1.25,1.25,.62,.62); 
		$ttt2=downUser($U_ID,'member');
		$yyy[0]=daily_in($ttt2,$urt[0]);
		$yyy22[0]=$ttt2;
		
		$userRef=mysqli_num_rows($mysqli->query("SELECT * FROM `member` WHERE `sponsor`='".$U_ID."'"));
		if($userRef<=1){
			$genCount=2;
		}elseif($userRef<=2){
			$genCount=4;
		}elseif($userRef<=3){
			$genCount=6; 
		}elseif($userRef<=4){ 
			$genCount=8;
		}elseif($userRef<=5){
			if(count($ttt2)>10){
				$genCount=10;
			}else{
				$genCount=count($ttt2);
			}
		}
		for($i=1;$i<=$genCount-1;$i++){
			$ttt2=downUser($ttt2,'member');
			$yyy[$i]=daily_in($ttt2,$urt[$i]);
			$yyy22[$i]=$ttt2;
		}
		//sum today 8 generation income
		$TotalGenSales=array_sum($yyy);
		$LvlSales=json_encode($yyy);
		
		// echo "<pre>";
		// echo $U_ID."<br />";
		// print_r($yyy22);
		// print_r($yyy);
		// echo "Total income = ".$TotalGenSales."<br />";
		// echo "Total income = ".$LvlSales."<br />";
		// echo "</pre>";
		
		// if($TotalGenSales>0){
			// $checkToday=mysqli_num_rows($mysqli->query("SELECT * FROM `generationincome` WHERE `user`='".$U_ID."' AND `date`='".$date."'"));
			// if($checkToday=='0'){
				// $mysqli->query("INSERT INTO `generationincome`(`user`, `commission`,`lvlsales`,`totalsales`, `date`) VALUES ('".$U_ID."','".$TotalGenSales."','".$LvlSales."','".$TotalGenSales."','".$date."')");
				// $mysqli->query("update `balance` set `amount`=`amount`+'".$TotalGenSales."' where `user`='".$U_ID."'");
			// }
		// }
	}
	
	// Daily Invest Generation User Id Get
	function MonthlyProfitGenerationUserIdGet($Userid){
		global $mysqli;
		
		$UplineUser=array();
		foreach($Userid as $value){
			UplineUser($value,$UplineUser);
		}
		$sfsdf=array_unique($UplineUser);
		foreach($sfsdf as $valuess){
			MonthlyProfitGeneration($valuess);
		}
	}
	
	// Generation Distrebute End
?>