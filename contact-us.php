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
        <div id="contact-us">
            <div class="contact">
                <h2>Contact US</h2>
                <div class="row">
                    <div class="col-md-6 text-center">
                        <a href="mailto:easy.webtouch@gmail.com ">
                            <i class="fa fa-envelope d-block text-warning" aria-hidden="true"></i>
                            <span>Email Us</span>
                            <p>Click this box if you wish to email us</p>
                        </a>
                    </div>
                    <div class="col-md-6 text-center">
                        <a href="tel:+880">
                            <i class="fa fa-phone-square d-block text-warning" aria-hidden="true"></i>
                            <span>Call Us</span>
                            <p>Click this box if you wish to call us</p>
                        </a>
                    </div>
                    <div class="col-md-6"></div>
                </div>
            </div>
            <!-- contact main form -->
            <div class="contact-main row">
                <div class="col-md-6 ">
                    <i class="fas fa-comment-alt d-block"></i>
                    <h3>Quick Contact</h3>
                    <hr>
                    <form>
                        <label for="name">Your Name (required)</label>
                        <input type="text" id="name" name="name">
                        <label for="email">Your Email (required)</label>
                        <input type="email" id="email" name="email">
                        <label for="phone">Phone (required)</label>
                        <input type="text" id="phone" name="phone">
                        <label for="msg">Your Message</label>
                        <textarea name="msg" id="msg"></textarea>
                    </form>
                </div>
                <div class="col-md-5">
                    <i class="fa fa-map-marker d-block" aria-hidden="true"></i>
                    <h3>Our Location</h3>
                    <hr>
                    <div class="location">
                        <h6>Web Touch LTD.</h6>
                        <p>Address 101/B Chowdhurypara Malibagh, Dhaka - 1219</p>
                        <span>Skype: <small>sagor.dpi</small></span>
                        <span>Telephone: <small>+880 1234 5678</small></span>
                        <span>Phone: <small>+880 1234 5678</small></span>
                        <span>Email: <small>easy.webtouch@gmail.com</small></span>
                        <span>Web: <small>www.easywebtouch.com</small></span>
                    </div>
                </div>
            </div>
            <!-- contact google form -->
            <div class="row map w-100">
                <div class="col-12">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3651.817209589353!2d90.41408471543161!3d23.753896894558636!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3755b964fcc9de75%3A0x415c85ea45350058!2sWeb%20Touch%20Limited!5e0!3m2!1sen!2sbd!4v1667902809917!5m2!1sen!2sbd" width="600" height="450" style="border:0; width: 100%;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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