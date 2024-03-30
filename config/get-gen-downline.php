<?php 
	session_start();
    include("db.php");
	$time_start = microtime(true); 
	
	// Start genaration
	function downUser($users,$table,$AllUser){
		global $mysqli;
		$fff=array();
		if(is_array($users)){
			foreach($users as $user){
				foreach($AllUser as $sponsor => $userId) {
					if($userId == $user) {
						array_push($fff, $sponsor);
					}
				}
			}
		}else{
			foreach($AllUser as $sponsor => $userId) {
				if($userId == $users) {
					array_push($fff, $sponsor);
				}
			}
		}
		return $fff; 
	}
	
	function ganaration($U_ID,$Info){
		global $mysqli;
		$memberid = $U_ID;
		$yyy=array();
		$ttt2=downUser($memberid,'member',$Info);
		$yyy[0]=$ttt2;
		echo count($ttt2);
		// for($i=1;$i<=count($ttt2);$i++){
			// $ttt2=downUser($ttt2,'member',$Info);
			// $yyy[$i]=$ttt2;
		// }
		// foreach($ttt2 as $keys=>$values){
			// $ttt2=downUser($values,'member',$Info);
			// $yyy[$keys+1]=$ttt2;
		// }
		return $yyy;
	}
	
	$allUserInfo['allUserInfo']=mysqli_fetch_all($mysqli->query("select user,sponsor from `member` "),MYSQLI_ASSOC);
	// where `rank`='6' || `rank`='7'
	$InfoForGenaration=array_column($allUserInfo['allUserInfo'],"sponsor","user");
	
	$TotalGeneration=ganaration("56456",$InfoForGenaration);
	
	$AllGeneration= call_user_func_array('array_merge', $TotalGeneration);
	
	// End genaration
	
	echo "<pre>";
	print_r($TotalGeneration);
	
	$time_end = microtime(true);
	$execution_time = ($time_end - $time_start)/60;

	//execution time of the script
	echo '<b>Total Execution Time:</b> '.$execution_time.' Mins';
	
?>