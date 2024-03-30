<?php
	session_start();
	include("db.php");
	include("function.php");
	/*
		Monthly Profit Generation (MonthlyProfitGenerationUserIdGet,MonthlyProfitGeneration,daily_in,UplineUser)
	*/
	$time_start = microtime(true); 
	$prev_date =date('Y-m-d', strtotime('-1 day'));
	// Array store Today Join User
	$TotalUserInfo=array();
	$investmentprofit['investmentprofit']=mysqli_fetch_all($mysqli->query("select * from `investmentprofit` where DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m') ORDER BY `serial` DESC"),MYSQLI_ASSOC);
	$userId=array_unique(array_column($investmentprofit['investmentprofit'],"user"));
	
	// Monthly Profit Generation distrebute
	$MonthlyProfitGeneration=MonthlyProfitGenerationUserIdGet($userId);
	
	
	// Extra bonus for 1st year/12 months
	$ExtraBonus=$mysqli->query("select * from `extraBonusCount` where `month`>0");
		while($res=mysqli_fetch_assoc($ExtraBonus)){
			$mysqli->query("INSERT INTO `extraBonusGet`(`user`, `ref`, `investSerial`, `amount`, `permonth`, `month`, `date`) VALUES ('".$res['user']."','".$res['ref']."','".$res['investSerial']."','".$res['amount']."','".$res['permonth']."','".$res['month']."','".$date."')");
			$mysqli->query("update `extraBonusCount` set `month`=`month`-'1' where `user`='".$res['ref']."' and `investSerial`='".$res['investSerial']."'");
			// update balance
			$mysqli->query("update `balance` set `amount`=`amount`+'".$res['permonth']."' where `user`='".$res['ref']."' ");
		}
		
	// 1% Profit score for rank
	$companyAmountSet=mysqli_fetch_assoc($mysqli->query("SELECT * FROM `companyAmountSet` where `date`='".$date."' and `chk`='0' ORDER BY `serial` DESC limit 1"));
	$profitScore=($companyAmountSet['amount']*1)/100;
	$profitScoreForRank=$mysqli->query("SELECT * FROM `member` where `rank`='7'");
	$profitScoreForRankCount=mysqli_num_rows($profitScoreForRank);
		while($res=mysqli_fetch_assoc($profitScoreForRank)){
			$commission=$profitScore/$profitScoreForRankCount;
			$mysqli->query("INSERT INTO `companyProfitForRank`(`user`, `userCount`, `amount`, `commssion`, `date`) VALUES ('".$res['user']."','".$profitScoreForRankCount."','".$companyAmountSet['amount']."','".$commission."','".$date."')");
			// update balance
			$mysqli->query("update `balance` set `amount`=`amount`+'".$commission."' where `user`='".$res['user']."' ");
		}
	
	// Global Life Time
	$currentMonthInvest=mysqli_fetch_assoc($mysqli->query("SELECT sum(amount) as total FROM `investment` where DATE_FORMAT(date, '%Y-%m') = DATE_FORMAT('$date', '%Y-%m')"));
	$currentMonthlyTotalAmount10= ($currentMonthInvest['total']*6.4)/100;
	$GlobalLifeTime=$mysqli->query("SELECT * FROM `member` where `rank`='5' || `rank`='6' || `rank`='7'");
		while($res=mysqli_fetch_assoc($GlobalLifeTime)){
			$rankCount=mysqli_num_rows($mysqli->query("SELECT * FROM `member` where `rank`='".$res['rank']."'"));
			if($res['rank']==5){
				$percent=50;
				$rankCommission=(($currentMonthlyTotalAmount10*$percent)/100)/$rankCount;
			}elseif($res['rank']==6){
				$percent=30;
				$rankCommission=(($currentMonthlyTotalAmount10*$percent)/100)/$rankCount;
			}elseif($res['rank']==7){
				$percent=20;
				$rankCommission=(($currentMonthlyTotalAmount10*$percent)/100)/$rankCount;
			}
			
			$mysqli->query("INSERT INTO `globalLifeTime`(`user`, `rankcount`, `invest`, `amount`,`percent`, `commission`, `date`) VALUES ('".$res['user']."','".$rankCount."','".$currentMonthInvest['total']."','".$currentMonthlyTotalAmount10."','".$percent."','".$rankCommission."','".$date."')");
			// update balance
			$mysqli->query("update `balance` set `amount`=`amount`+'".$rankCommission."' where `user`='".$res['user']."' ");
		}
	
	$time_end = microtime(true);
	$execution_time = ($time_end - $time_start)/60;

	//execution time of the script
	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
?>