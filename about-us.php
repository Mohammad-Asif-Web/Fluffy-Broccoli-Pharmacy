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
        <div id="about-us">
            <div class="row about-banner" >
              <h2 class="m-auto">Making healthcare accesible to Millions</h2>
            </div>
            <div class="row about-content">
              <div class="col-md-8">
                <h3>WebTouch aims to empower patients to better manage their health</h3>
                <h4>our mission</h4>
                <p>WebTouch brings to you a digital platform for all your healthcare needs from genuine medicines to vitamins, doctor consultations, and even lab testing with sample collection conveniently from your home.</p>
                <a href="" class="btn btn-lg">Get the app</a>
              </div>
              <div class="col-md-4">
                <div class="about-img">
                  <img src="dist/img/hand-mobile.png" class="w-100 h-100" alt="pharmacy mobile app">
                </div>
              </div>
            </div>
            <div class="row steps justify-content-around">
              <div class="col-md-4 text-center">
                <div class="step-img">
                  <img src="dist/img/e-pharmecy-doctor.png" class="w-100" alt="">
                </div>
                <h4>E-Pharmacy</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, sint? Quae fugit rem quod odio expedita
                </p>
              </div>
              <div class="col-md-4 text-center">
                <div class="step-img">
                  <img src="dist/img/pill.png" class="w-100" alt="">
                </div>
                <h4>Lab Testing</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, sint? Quae fugit rem quod odio expedita
                </p>
              </div>
              <div class="col-md-4 text-center">
                <div class="step-img">
                  <img src="dist/img/flask.png" class="w-100" alt="">
                </div>
                <h4>Lab Testing</h4>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt, sint? Quae fugit rem quod odio expedita
                </p>
              </div>
            </div>
            <div class="row our-work">
              <div class="col-md-6">
                <h2>How We Work</h2>
                <p>Our working process is very simple which follows some procedures. Firstly you have fixed a service that you want to order and contact one of our staff then order the service and fix the price and note down a work delivery date and the work will be delivered in time. Domain Registration Company in Bangladesh.</p>
              </div>
              <div class="col-md-6 text-center align-items-center">
                <div class="img">
                  <img src="dist/img/pad.webp" class="w-100" alt="">
                </div>
              </div>
            </div>
            <div class="team">
              <h2>Leadership Team</h2>
              <p class="team-text">All of our programmers are visionary and diligent; many of them are expert in both corporate and online marketplace. our proficient team of designers shapes your website according to customer expectation level.</p>
              <div class="row team-item pt-4">
                <div class="col-md-3 text-center">
                  <div class="img m-auto">
                    <img src="dist/img/asif.jpg" class="text-dark" alt="Muhammad Asif Web application developer">
                  </div>
                  <h4>Muhammad Asif</h4>
                  <p>Web Application Developer</p>
                  <div class="social">
                    <a href="https://www.linkedin.com/in/mohammad-asif-a668a813b/" target="_blank" class="pl-2"><i class="fab fa-linkedin-in"></i></a>
                    <a href="https://muhammadasif10.blogspot.com/" target="_blank" class="pl-2"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="col-md-3 text-center">
                  <div class="img m-auto">
                    <img src="dist/img/pino.jpg" class="text-dark" alt="Mahamud Pino React.js Developer">
                  </div>
                  <h4>Mahamud Pino</h4>
                  <p>React.js Developer</p>
                  <div class="social">
                    <a href="" class="pl-2"><i class="fab fa-linkedin-in"></i></a>
                    <a href="" class="pl-2"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="col-md-3 text-center">
                  <div class="img m-auto">
                    <img src="dist/img/lipu.jpg" class="text-dark" alt="shiblur rahman digital marketting">
                  </div>
                  <h4>Shiblur Rahman Lipu</h4>
                  <p>Digital Marketting Expert</p>
                  <div class="social">
                    <a href="" class="pl-2"><i class="fab fa-linkedin-in"></i></a>
                    <a href="" class="pl-2"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  </div>
                </div>
                <div class="col-md-3 text-center">
                  <div class="img m-auto">
                    <img src="dist/img/fahim.jpg" class="text-dark" alt="Fahim Rahman UI/UX Designer">
                  </div>
                  <h4>Fahim Rahman</h4>
                  <p>UI/UX Designer</p>
                  <div class="social">
                    <a href="" class="pl-2"><i class="fab fa-linkedin-in"></i></a>
                    <a href="" class="pl-2"><i class="fa fa-globe" aria-hidden="true"></i></a>
                  </div>
                </div>
  
              </div>
            </div>
        </div>
        <!-- newsletter section start-->
        <!-- <?php include "includes/newsletter.php" ?> -->
        <!-- newsletter section end -->
      </div>
    </section>
  </div>
  <!-- /.content-wrapper -->

<?php include "includes/footer.php" ?>