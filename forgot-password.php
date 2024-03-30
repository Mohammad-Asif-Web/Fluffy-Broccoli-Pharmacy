<!doctype html>
<html lang="en">
<head>
        
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="" name="author" />
    <title>Member | Recover Password </title>
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
    <div class="account-pages my-5 pt-sm-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-8 col-lg-6 col-xl-5">
                    <div class="card overflow-hidden">
                        <div class="bg-primary bg-soft">
                            <div class="row">
                                <div class="col-7">
                                    <div class="text-primary p-4">
                                        <h5 class="text-primary"> Recover Password</h5>
                                        <p>Hey < member name >, <br>Reset a New Password</p>
                                    </div>
                                </div>
                                <div class="col-5 align-self-end">
                                    <img src="member/assets/images/profile-img.png" alt="" class="img-fluid">
                                </div>
                            </div>
                        </div>
                        <div class="card-body pt-0"> 
                            <div>
                                <a href="index-2.html">
                                    <div class="avatar-md profile-user-wid mb-4">
                                        <span class="avatar-title rounded-circle bg-light">
                                            <img src="member/assets/images/logo.svg" alt="" class="rounded-circle" height="34">
                                        </span>
                                    </div>
                                </a>
                            </div>
                            
                            <div class="p-2">
                                <div class="alert alert-success text-center mb-4" role="alert">
                                    Enter your Mobile no and set a new Password!
                                </div>
                                <form class="form-horizontal">
        
                                    <div class="mb-3">
                                        <label for="user-no" class="form-label">Mobile No</label>
                                        <input type="text" class="form-control" id="user-no" name="user-no" placeholder="Enter mobile no">
                                    </div>
                                    <div class="mb-3">
                                        <label for="new-pass" class="form-label">New Password</label>
                                        <input type="text" class="form-control" id="new-pass" name="new-pass" placeholder="Enter new password">
                                    </div>
                                    <div class="mb-3">
                                        <label for="confirm-pass" class="form-label">Confirm Password</label>
                                        <input type="text" class="form-control" id="confirm-pass" name="confirm-pass" placeholder="Enter confirm password">
                                    </div>
                
                                    <div class="text-end">
                                        <button class="btn btn-primary w-md waves-effect waves-light" type="submit">Reset</button>
                                    </div>

                                </form>
                            </div>
        
                        </div>
                    </div>
                    <div class="mt-5 text-center">
                        <p>Remember It ? <a href="login.php" class="fw-medium text-primary"> Sign In here</a> </p>
                    </div>

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
