<?php
	session_start();
	if(isset($_SESSION['WebCopyStaff'])){
		header("location: member/index.php");
		exit();
	}else{
		include("config/db.php");
		if(isset($_GET['fgdf'])){
			$reff=$_GET['reff'];
			$select_staff=$mysqli->query("select * from `member` where `log_user`='".$reff."'");
			$staff_fetch=mysqli_fetch_assoc($select_staff);
			$staff_count=mysqli_num_rows($select_staff);
			$member=mysqli_fetch_assoc($mysqli->query("select * from `profile` where `user`='".$staff_fetch['user']."'"));
			if($staff_count>0){
				echo $member['name'];
			}else{
				echo "Not Found";
			}
			die();
		}
		if(isset($_GET['Packagess'])){
			$Package=$_GET['Package'];
			$PackageInfo=$mysqli->query("select * from `package` where `serial`='".$Package."'");
			$PackageInfoFetch=mysqli_fetch_assoc($PackageInfo);
			$PackageInfoCount=mysqli_num_rows($PackageInfo);
			if($PackageInfoCount>0){
				echo $PackageInfoFetch['type'];
			}else{
				echo "Not Found";
			}
			die();
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="author" />
    <title>Member| Register</title>
    <!-- App favicon -->
	<link rel="shortcut icon" href="assets/images/favicon.ico" />
	<!-- Bootstrap Css -->
	<link href="member/assets/css/bootstrap.min.css" id="bootstrap-style" rel="stylesheet" type="text/css" />
	<!-- Icons Css -->
	<link href="member/assets/css/icons.min.css" rel="stylesheet" type="text/css" />
	<!-- App Css-->
	<link href="member/assets/css/app.min.css" id="app-style" rel="stylesheet" type="text/css" />
</head>
<body>


<div class="account-pages mt-5 pt-sm-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <div class="card-header p-2 bg-primary bg-soft">
                        <div class="row">
                            <div class="col-7">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary">Free Register</h5>
                                    <p>Get your free Member account now.</p>
                                </div>
                            </div>
                            <div class="col-5 align-self-end">
                                <img src="member/assets/images/profile-img.png" alt="" class="img-fluid">
                            </div>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">
                        <div class="auth-logo">
                            <a href="index.html" class="auth-logo-dark">
                                <div class="avatar-md profile-user-wid mb-4">
                                    <span class="avatar-title rounded-circle bg-light">
                                        <img src="member/assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                    </span>
                                </div>
                            </a>
                        </div>
                

                        <h5 style="text-align:center;color:red;font-weight:bold;">
                            <?php echo $_SESSION['msg1'];?>
                        </h5>
                        <h5 style="text-align:center;color:green;font-weight:bold;">
                            <?php echo $_SESSION['msg'];?>
                        </h5>
                        <form class="form-horizontal" action="member/action/join-partner.php" method="POST" enctype="multipart/form-data">
                            <div class="row">
                                <!-- name -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter Your Name" />
                                    </div>
                                </div>
                                <!-- Number -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="phone">Number</label>
                                        <input type="number" class="form-control" id="phone" name="phone"
                                            placeholder="Enter Your Number" />
                                    </div>
                                </div>
                                <!-- Email -->
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="Email">Email</label>
                                        <input type="email" class="form-control" name="email" id="Email"
                                            placeholder="Enter Your Email" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="nid">NID</label>
                                        <input type="number" class="form-control" id="nid" name="nid"
                                            placeholder="Enter Your NID" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="present_address">Present Address</label>
                                        <textarea class="form-control" id="present_address"
                                            name="present_address" placeholder="Present Address"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="permanent_address">Permanent Address</label>
                                        <textarea class="form-control" id="permanent_address"
                                            name="permanent_address"
                                            placeholder="Permanent Address"></textarea>
                                    </div>
                                </div>		
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="pass">User id</label>
                                        <input type="text" class="form-control" id="pass" name="userid"
                                            placeholder="Enter user id" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="pass">User Password</label>
                                        <input type="password" class="form-control" id="pass" name="pass"
                                            placeholder="********" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="pass">User Pin</label>
                                        <input type="password" class="form-control" id="pass" name="Pin"
                                            placeholder="********" />
                                    </div>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <div class="form-group">
                                        <label for="sponsor-id">Sponsor Id</label>
                                        <input type="text" class="form-control reff" id="sponsor-id"
                                            name="sponsorid" placeholder="Enter Sponsor Id" />
                                            <p class="user"></p>
                                    </div>
                                </div>
                                
                                <script>
                                    $(document).ready(function(){								
                                        $(".reff").on("keyup",function(){
                                            var reff=$(this).val();
                                            var req=$.ajax({
                                                method:"GET",
                                                url:"#",
                                                data:{
                                                    reff:reff,
                                                    fgdf:"jhgfjsd"
                                                }
                                            });
                                            req.done(function(msg){
                                                if(msg=='Not Found'){
                                                    $(".user").text("Sponsor "+msg);
                                                    $(".user").css({ 'color': 'red', 'font-size': '15px' });
                                                }else{
                                                    $(".user").text("Sponsor Name : "+msg);
                                                    $(".user").css({ 'color': 'green', 'font-size': '15px' });
                                                }
                                                
                                            });
                                            
                                        });
                                    });
                                </script>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="blood">Blood Group</label>
                                        <select class="form-control" name="blood" id="blood">
                                            <option disabled selected>Select Blood Group</option>
                                            <option value="A+">A+</option>
                                            <option value="A-">A-</option>
                                            <option value="AB+">AB+</option>
                                            <option value="AB-">AB-</option>
                                            <option value="B+">B+</option>
                                            <option value="B-">B-</option>
                                            <option value="O+">O+</option>
                                            <option value="O-">O-</option>
                                        </select>
                                    </div>
                                </div>
                                
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="package">Select Package</label>
                                        <select class="form-control Package" name="Package" id="package">
                                            <option disabled selected>Select Package</option>
                                            <?php 
                                                $package = "SELECT * FROM package ORDER BY serial DESC";
                                                $query = $mysqli->query($package);
                                                $sl = 1;
                                                while($res = mysqli_fetch_assoc($query)){
                                            ?>
                                            <option value="<?php echo $res['serial'];?>"><?php echo $res['name'];?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                
                                
                                <!--<div class="col-md-6 mb-3 Maturity" style="display:none;">
                                    <div class="form-group">
                                        <label for="sponsor-id">Maturity</label>
                                        <input type="number" class="form-control " id="sponsor-id"
                                            name="Maturity" placeholder="Enter maturity" />
                                    </div>
                                </div>-->
                                <script>
                                    // $(document).ready(function(){								
                                        // $(".Package").on("change",function(){
                                            // var Package=$(this).val();
                                            // var req=$.ajax({
                                                // method:"GET",
                                                // url:"#",
                                                // data:{Package:Package,Packagess:"Packagess"}
                                            // });
                                            // req.done(function(msg){
                                                // if(msg=='Invest'){
                                                    // $(".Maturity").show();
                                                // }else{
                                                    // $(".Maturity").hide();
                                                // }
                                                
                                            // });
                                            
                                        // });
                                    // });
                                </script>

                                <div class="form-group">
                                    <label for="image">Image</label>
                                    <div class="row">
                                        <div class="col-md-6">
                                            <input type="file" id="image" name="image" class="form-control"
                                                oninput="img_preview.src=window.URL.createObjectURL(this.files[0])">
                                        </div>
                                        <div class="col-md-4">
                                            <img id="img_preview" alt="Add-Brand-Image" height="80px"
                                                width="80px;">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group mt-4">
                                    <button type="submit" class="btn btn-danger" name="submit" value="submit">
                                        Submit
                                    </button>
                                </div>
                            </div>
                        </form>
                        <div class="mt-4 text-center">
                            <h5 class="font-size-14 mb-3">Sign up using</h5>

                            <ul class="list-inline">
                                <li class="list-inline-item">
                                    <a href="javascript::void()"
                                        class="social-list-item bg-primary text-white border-primary">
                                        <i class="mdi mdi-facebook"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript::void()"
                                        class="social-list-item bg-info text-white border-info">
                                        <i class="mdi mdi-twitter"></i>
                                    </a>
                                </li>
                                <li class="list-inline-item">
                                    <a href="javascript::void()"
                                        class="social-list-item bg-danger text-white border-danger">
                                        <i class="mdi mdi-google"></i>
                                    </a>
                                </li>
                            </ul>
                        </div>

                        <div class="mt-4 text-center">
                            <p class="mb-0">By registering you agree to the Skote <a href="#" class="text-primary">Terms of Use</a></p>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
        </div>
    </div>
</div>


    <!-- JAVASCRIPT -->
    <script src="member/assets/libs/jquery/jquery.min.js"></script>
    <script src="member/assets/libs/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="member/assets/libs/metismenu/metisMenu.min.js"></script>
    <script src="member/assets/libs/simplebar/simplebar.min.js"></script>
    <script src="member/assets/libs/node-waves/waves.min.js"></script>
	<script src="member/assets/js/app.js"></script>
	<?php unset($_SESSION['msg']);?>
</body>
</html>