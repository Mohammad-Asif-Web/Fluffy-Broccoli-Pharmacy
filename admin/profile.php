<?php
session_start();
if(!isset($_SESSION['pharmacyAdmin'])) {
    header("location:login.php");
    exit();
}else{
    include('../config/db.php');
}

include("include/head.php");
include("include/navbar.php");
include("include/sidebar.php");

if(isset($_POST['updateProfile'])){
$id = $_POST['id'];
$name = $_POST['name'];
$email = $_POST['email'];
$mobile = $_POST['mobile'];
$Corporate = $_POST['Corporate'];
$office = $_POST['office'];
$personal = $_POST['personal'];
// admin Image
$New_image = $_FILES['new-image']['name'];
$old_image = $_POST['old-image'];
// Website Image
$New_logo = $_FILES['new-logo']['name'];
$old_logo = $_POST['old-logo'];

// admin image is not empty
if($New_image != ''){
    $update_name = $New_image;
} else {
    $update_name = $old_image;
}
// website logo is not empty
if($New_logo != ''){
    $update_logo = $New_logo;
} else {
    $update_logo = $old_logo;
}

$sqlUpd = "UPDATE admin 
            SET name=:name, 
                email=:email, 
                mobile=:mobile, 
                office_address=:office, 
                personal_address=:personal, 
                corporate_number=:corporate, 
                user_img=:userImage, 
                website_logo=:websiteLogo, 
                date=:date  
            WHERE id = :id 
            "; 

$queryUpd = $pdo->prepare($sqlUpd);
$queryUpd->bindParam(':id', $id);
$queryUpd->bindParam(':name', $name);
$queryUpd->bindParam(':email', $email);
$queryUpd->bindParam(':mobile', $mobile);
$queryUpd->bindParam(':office', $office);
$queryUpd->bindParam(':personal', $personal);
$queryUpd->bindParam(':corporate', $Corporate);

$queryUpd->bindParam(':userImage', $update_name);
$queryUpd->bindParam(':websiteLogo', $update_logo);
$queryUpd->bindParam(':date', $date);
    if($queryUpd->execute()){
        // new image is not empty
        if($New_image != ''){
        move_uploaded_file($_FILES['new-image']['tmp_name'], "dist/img/".$New_image);
        unlink("dist/img/".$old_image);
        }
        // new logo is not empty
        if($New_logo != ''){
        move_uploaded_file($_FILES['new-logo']['tmp_name'], "dist/img/".$New_logo);
        unlink("dist/img/".$old_logo);
        }
        $_SESSION['msg'] = "Profile Updated";

    } else {
    $_SESSION['e-msg'] = "Updated Unsuccessfull";
    }
}



?>
    <!--  Sidebar end -->

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper" id="profile">
    <!-- Content Header (Page header) -->
    <!-- <section class="content-header p-0">
        <div class="container-fluid">
            <div class="row mb-5 bg-white py-1 px-4">
                <h2 class="font-weight-bold">User Profile</h2>
            </div>
        </div>
    </section> -->

    <!-- Main content -->
    <section class="content mt-5">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-4 col-sm-4">
                    <div class="card shadow-none">
                        <div class="card-body p-0">
                            <ul class="navbar-nav">
                                <li class="nav-item pl-3" style="background: #e6eeee">
                                    <a href="profile.php" class="nav-link text-dark">User Profile</a>
                                </li>
                                <hr class="w-100 m-0">
                                <li class="nav-item pl-3">
                                    <a href="change-password.php" class="nav-link text-dark">Reset Password</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-lg-9 col-md-8 col-sm-8" id="profile-body">
                    <div class="card shadow-none">
                        <div class="card-body p-0"  style="background: #e6eeee">
                            <form action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                            <?php
                                $sql = "SELECT * FROM admin";
                                $query = $pdo->prepare($sql);
                                $query->execute();
                                $row = $query->fetch(PDO::FETCH_OBJ);
                            ?>
                                <div class="row px-4 pt-3">
                                    <div class="col-12">
                                        <h5>Admin Details</h5>
                                    </div>
                                </div>
                                <hr>
                                <div class="row px-4 ">
                                    <!-- admin picture section-->
                                    <input type="hidden" name="id" value="<?php echo $row->id ?>">
                                    <div class="col-md-6 d-flex align-items-center">
                                        <div class="img-circle p-2" style="width: 80px; height: 80px">
                                        <!-- current img -->
                                            <img src="dist/img/<?php echo $row->user_img ?>" class="w-100 h-100 img-circle" alt="">
                                            <input type="hidden" name="old-image" value="<?php echo $row->user_img ?>">
                                        </div>
                                        <!-- new img -->
                                        <div class="ml-3">
                                            <h5>Admin Asif</h5>
                                            <label class="text-dark" for="new-image" 
                                                    style="cursor: pointer; border: 1px solid #9c9c9c; padding: 5px 15px; 
                                                    border-radius: 20px; margin-top: 10px;" >
                                                <span style="font-size: 14px; color: #9c9c9c;">Change Picture</span>
                                            </label>
                                            <input type="file" name="new-image" id="new-image" class="d-none"
                                                    oninput="img_preview.src=window.URL.createObjectURL(this.files[0])" />
                                            <img id="img_preview" class="mb-2 img-circle" height="30px" width="30px;" >
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6 d-flex align-items-center">
                                        <!-- webiste logo section-->
                                        <div class="img-circle p-2" style="width: 80px; height: 80px">
                                        <!-- current img -->
                                            <img src="dist/img/<?php echo $row->website_logo ?>" class="w-100 h-100 img-circle" alt="">
                                            <input type="hidden" name="old-logo" value="<?php echo $row->website_logo ?>">
                                        </div>
                                        <!-- new img -->
                                        <div class="ml-3">
                                            <h5>Website Logo</h5>
                                            <label class="text-dark" for="new-logo" 
                                                    style="cursor: pointer; border: 1px solid #9c9c9c; padding: 5px 15px; 
                                                    border-radius: 20px; margin-top: 10px;" >
                                                <span style="font-size: 14px; color: #9c9c9c;">Change Logo</span>
                                            </label>
                                            <input type="file" name="new-logo" id="new-logo" class="d-none"
                                                    oninput="logo_preview.src=window.URL.createObjectURL(this.files[0])" />
                                            <img id="logo_preview" class="mb-2 img-circle" height="30px" width="30px;" >
                                        </div>
                                    </div>
                                </div>
                                <!-- <p class="ml-4" style="font-size: 13px; color: #9c9c9c">Image Size Must be 128x128</p> -->
                                <hr>
                                <div class="row body-input px-4">
                                    <div class="col-sm-6">
                                        <label for="name">Name</label>
                                        <input type="text" class="form-control" id="name" name="name" value="<?php echo $row->name ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="email">Email</label>
                                        <input type="text" class="form-control" id="email" name="email" value="<?php echo $row->email ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="mobile">Mobile</label>
                                        <input type="number" class="form-control" id="mobile" name="mobile" value="<?php echo $row->mobile ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="Corporate">Corporate Number</label>
                                        <input type="number" class="form-control" id="Corporate" name="Corporate" value="<?php echo $row->corporate_number ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="office">Office Address</label>
                                        <input type="text" class="form-control" id="office" name="office" value="<?php echo $row->office_address ?>">
                                    </div>
                                    <div class="col-sm-6">
                                        <label for="personal">Personal Address</label>
                                        <input type="text" class="form-control" id="personal" name="personal" value="<?php echo $row->personal_address ?>">
                                    </div>
                                
                                    <div class="col-sm-12">
                                        <button type="submit" name="updateProfile" class="btn btn-info btn-sm">Save Changes</button>
                                    </div>
                                </div> 
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
<!-- /.content-wrapper -->

<!-- footer Start -->
<?php include("include/footer.php")?>
<!-- footer End -->

