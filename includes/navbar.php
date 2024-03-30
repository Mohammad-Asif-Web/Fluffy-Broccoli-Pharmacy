<!-- header ad start -->
<div class="container-fluid nav-head py-1 bg-blue2 text-white">
    <div class="row">
        <div class="d-flex justify-content-between w-100 px-4" style="font-size: 1.2rem;">
            <p class="mb-0">Free Shopping with minimum purchase $50.</p>
            <div class="header-social-icon">
                <a href="" class="text-white"><i class="fab fa-facebook-square"></i></a>
                <a href="" class="text-white"><i class="fab fa-twitter-square"></i></a>
                <a href="" class="text-white"><i class="fab fa-instagram-square"></i></a>
            </div>
        </div>
    </div>
</div>
<div style="border-top: 1px solid rgba(212, 216, 192, 0.76);"></div>
<!-- header ad End -->

<!-- main Nav start and nav mid section-->
<div class="container-fluid nav-mid bg-blue2">
    <div class="row align-items-center px-3 pt-3">
        <!-- logo -->
        <div class=" col-md-3">
            <?php
             $sql = "SELECT * FROM admin";
             $query = $pdo->prepare($sql);
             $query->execute();
             $row = $query->fetch(PDO::FETCH_OBJ);
            ?>
            <a href="index.php" class="brand-wrap d-flex" data-abc="true">
                <!--<img class="logo img-fluid" src="admin/dist/img/<?php echo $row->website_logo ?>" style="width:100px; height:40px">-->
                <img class="logo img-fluid" src="https://albarrexpress.com/logo.png" style="width: 60%;height:40px;object-fit: contain;">
            </a>
        </div>
        <!-- search product -->
        <div class="col-md-5">
            <form class="">
                <div class="input-group">
                    <input type="text" class="form-control search_input" placeholder="Search for medicine / healthcare"
                        aria-label="Search" aria-describedby="basic-addon1">
                    <a href="" class="text-decoration-none"><span class="input-group-text search_btn h-100"
                            id="basic-addon1"><i class="fas fa-search"></i></span></a>
                </div>
            </form>
        </div>
        <!-- sign in/profile/cart -->
        <div class="col-md-4 cart-sm">
            <div class="d-flex justify-content-end" style="margin-right: -12px"> 
                <!-- <a target="_blank" href="#"
                    data-abc="true" class="nav-link widget-header"> <i class="fas fa fa-whatsapp"></i>
                </a> 
                <span class="vl"></span> -->
                <a class="nav-link nav-user-img text-white" href="login.php"><span class="login">SIGN IN</span></a>
                <!-- call icon -->
                <a href="tel:+880" class="nav-link text-white call" title="call to order">
                    <i class="fas fa-phone-volume"></i>
                </a>
                <!-- favorite icon -->
                <a class="nav-link nav-user-img text-white" href="#">
                    <span class="login">
                        <i class="far fa-heart"></i>
                    </span>
                </a>
                <!-- cart Icon -->
                <a class="nav-link nav-user-img text-white user-cart" style="cursor: pointer;">
                    <span class="login badge bg-warning">
                        <i class="fas fa-cart-plus"></i>
                    </span>
                    <!-- total prices class of all product  -->
                    <small id="sum-prices"> </small>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- main Nav end-->

<div class="wrapper">
    <!--bottom Navbar -->
    <div class="main-header navbar navbar-expand bg-blue2 nav-bottom" style="margin-left: 0;">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link text-white" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars">
                        Category</i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <!-- <ul class="navbar-nav ml-auto upload">
            <li class="nav-item d-none d-sm-inline-block health mr-4">
                <a href="all-products.php" class="nav-link text-white"><i class="fas fa-heart" aria-hidden="true"></i>
                    Healthcare Product</a>
            </li> -->
            <!-- Navbar Search -->
            <!-- <div class="file-input d-flex justify-content-end" style="margin: 7px 20px 0 0;">
                <label class="file-input__label text-white" for="file-input" style="cursor: pointer;"><i
                        class="fas fa-upload"></i><span>&nbsp; Upload Prescription</span></label>
                <input type="file" name="file-input" id="file-input" class="file-input__input" style="display: none;" />
            </div>
        </ul> -->
    </div>
    <!-- /.navbar -->