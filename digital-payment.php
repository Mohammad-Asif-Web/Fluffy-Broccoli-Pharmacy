<!-- head -->
<?php
// session_start();
include('config/db.php');

include "includes/head.php";
include "includes/cart.php";
include "includes/navbar.php";
include "includes/sidebar.php";

?>
  <!-- sidebar.php end -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <section class="content">
      <div class="container-fluid">
        <!-- product image details -->
        <div id="d-payment">
            <h2>Digital Payment Methods</h2>
            <div class="row mt-5" style="padding: 50px 55px">
                <!-- bank account information -->
                <div class="col-12" >
                    <h3 class="text-blue2">Bank Account Information</h3>
                    <div class="row my-5 justify-content-between">
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="card-img w-25">
                                        <img src="dist/img/credit/bbl.png" class="w-100" alt="">
                                    </div>
                                    <h4 class="text-dark text-blue2 font-weight-bold ml-3 h1">Brac Bank ltd</h4>
                                </div>
                                <div class="card-body">
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">payee name: <small class="font-weight-normal text-uppercase">webtouch</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">account number: <small class="font-weight-normal text-uppercase">2345323332</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">bank name: <small class="font-weight-normal text-uppercase">brac bank limited</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">branch: <small class="font-weight-normal text-uppercase">bonosree</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">route number: <small class="font-weight-normal text-uppercase">00033343</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">swift code: <small class="font-weight-normal text-uppercase">brakbddh</small></small></p>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="card">
                                <div class="card-header d-flex align-items-center">
                                    <div class="card-img w-25">
                                        <img src="dist/img/credit/ebl.png" class="w-100" alt="">
                                    </div>
                                    <h4 class="text-dark text-blue2 font-weight-bold ml-3 h1">Eastern Bank ltd</h4>
                                </div>
                                <div class="card-body">
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">payee name: <small class="font-weight-normal text-uppercase">webtouch</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">account number: <small class="font-weight-normal text-uppercase">2345323332</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">bank name: <small class="font-weight-normal text-uppercase">brac bank limited</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">branch: <small class="font-weight-normal text-uppercase">bonosree</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">route number: <small class="font-weight-normal text-uppercase">00033343</small></small></p>
                                    <p class="font-weight-bold text-capitalize text-blue2 h4">swift code: <small class="font-weight-normal text-uppercase">brakbddh</small></small></p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <!-- Debit and Credit Cards -->
                <div class="col-12">
                    <h3 class="text-blue2">Debit & Credit Cards</h3>
                    <div class="row my-5 justify-content-around" >
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/visa (1).png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/mastercard (1).png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/qcash.png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/nexus.png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Banking -->
                <div class="col-12">
                    <h3 class="text-blue2">Mobile Banking</h3>
                    <div class="row my-5 justify-content-around" >
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/bkash.png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/rocket.png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/mcash.png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card py-5">
                                <div class="card-body text-center">
                                    <div class="card-img w-50 mx-auto">
                                        <img src="dist/img/credit/mycash.png" class=" w-100" alt="">
                                    </div>
                                    <hr>
                                    <a href="" class="btn btn-sm bg-blue2 text-warning rounded-pill px-4 py-2 my-3 font-weight-bold text-capitalize">website</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter section start-->
        <?php include "includes/newsletter.php" ?>
        <!-- newsletter section end -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include "includes/footer.php" ?>