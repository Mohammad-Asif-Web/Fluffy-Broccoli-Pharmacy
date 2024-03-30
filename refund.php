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
        <div class="row pl-2" id="term-head">
            <h2 class="text-center m-auto font-weight-bold text-uppercase">return & refund policy</h2>
            <p class="mt-5">The Terms are the rules and regulations that specify guidelines for using our services. Use of our services is subject to these terms. Please read them carefully and ensure that you understand and agree to all parts. Use of Web Touch services implies agreement with these terms ! The following guidelines were designed to ensure that our services remain of the utmost quality. Please read very carefully before ordering and/or using Web Touch services.</p>
            <p class="terms-mini text-blue2">Web Touch will be the sole arbiter as to what consitutes a violation of this provision, and reserves the right to deactivate and remove any site at any time for any reason without refund.</p>
        </div>
        <div class="row terms-desc" id="term-desc">
            <div class="w-100 d-block">
                <div class="faq">
                    <h3>Why shouldn't we trust atoms?</h3>
                    <small>They make up everything</small>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="faq">
                    <h3>What is: 1 + 1?</h3>
                    <small>Depends on who are you asking!</small>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="w-100 d-block">
                <div class="faq">
                    <h3>What do you call someone with no body and no nose?</h3>
                    <small>Nobody knows</small>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="faq">
                    <h3>Who Am I?</h3>
                    <small>See your NID Card😃</small>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="w-100 d-block">
                <div class="faq">
                    <h3>How may tickles does it take to tickle an octopus?</h3>
                    <small>Ten-tickles</small>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
            <div class="w-100">
                <div class="faq">
                    <h3>How may tickles does it take to tickle an octopus?</h3>
                    <small>Ten-tickles</small>
                    <div class="icon">
                        <i class="fas fa-chevron-down"></i>
                        <i class="fas fa-times"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- newsletter section start-->
        <div class="row align-items-center newsletter_section">
            <div class="col col-lg-6">
                <h2 class="newsletter_title text-white">Sign Up for Newsletter </h2>
                <p>Get E-mail updates about our latest products and special offers.</p>
            </div>
            <div class="col col-lg-6">
                <form action="">
                    <div class="newsletter_form">
                        <input type="email" name="email" placeholder="Enter your email address">
                        <button type="submit" class="btn bg-warning">Submit</button>
                    </div>
                </form>
            </div>
        </div>
        <!-- newsletter section end -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

 <?php include "includes/footer.php" ?>