<footer class="main-footer py-5">
    <div class="row mt-4">
      <div class="col-md-2">
        <h4 class="">information</h4>
        <p><a href="about-us.php" class="text-blue2">About us</a></p>
        <p><a href="contact-us.php" class="text-blue2">Contact us</a></p>
        <p><a href="digital-payment.php" class="text-blue2">Digital Payment</a></p>
        <p><a href="customer-support.php" class="text-blue2">customer Support</a></p>
      </div>
      <div class="col-md-2">
        <h4>Categories</h4>
        <?php
        $sqlCat = "SELECT * FROM ecm_category";
        $queryCat = $pdo->prepare($sqlCat);
        $queryCat->execute();
          while($rowCat = $queryCat->fetch(PDO::FETCH_OBJ)){
          ?>
        <p><a href="<?php echo $rowCat->category_link?>.php?category=<?php echo strtolower($rowCat->category) ?>" class="text-blue2"><?php echo $rowCat->category ?></a></p>
        <?php
          }
        ?>
        <!-- <p><a href="fitness.php" class="text-blue2">Fitness</a></p>
        <p><a href="lifestyle.php" class="text-blue2">Lifestyle</a></p>
        <p><a href="personal-care.php" class="text-blue2">Personal Care</a></p> -->
      </div>
      <div class="col-md-3">
        <h4>Our Information</h4>
        <p><a href="policy.php" class="text-blue2">privacy policy update</a></p>
        <p><a href="terms.php" class="text-blue2">Terms & Conditions</a></p>
        <p><a href="refund.php" class="text-blue2">return policy</a></p>
        <p><a href="site-map.php" class="text-blue2">Site Map</a></p>
      </div>
      <div class="col-md-3">
        <h4 class="">Contact us</h4>
        <?php
        $sql = "SELECT * FROM admin";
        $query = $pdo->prepare($sql);
        $query->execute();
        $row = $query->fetch(PDO::FETCH_OBJ);
          ?>
        <p class="text-blue2"><?php echo $row->office_address ?></p>
        <p class="text-blue2">Hot Line <?php echo $row->corporate_number ?></p>
        <p class="text-blue2"><?php echo $row->email ?></p>
        <!-- <p>Social Links</p> -->
        <div class="header-social-icon text-blue2">Social Links
          <a href="https://www.facebook.com" target="_blank" class="pl-2 text-blue2"><i class="fab fa-facebook-square"></i></a>
          <a href="https://www.twitter.com" target="_blank" class="pl-2 text-blue2"><i class="fab fa-twitter-square"></i></a>
          <a href="https://www.instagram.com" target="_blank" class="pl-2 text-blue2"><i class="fab fa-instagram-square"></i></a>
          <a href="https://www.linkedin.com" target="_blank" class="pl-2 text-blue2"><i class="fab fa-linkedin"></i></a>
      </div>
      </div>
      <div class="col-md-2">
        <h4>Download app</h4>
        <img class="img-fluid w-75 my-2" src="dist/img/credit/app_store.png" alt="app_store">
        <img class="img-fluid w-75" src="dist/img/credit/play_store.png" alt="play-store">
      </div>
    </div>

  </footer>
  <div class="container-fluid footer-bottom py-2">
    <div class="row justify-content-between">
      <div class="col-md-4 d-flex align-items-center justify-content-end text-dark">
        <p class="mb-0">&copy2022 <span class="text-red">E-commarce.</span>All Rights Reserved.</p>
      </div>
      <div class="col-md-4 d-flex align-items-center justify-content-start text-dark">
        <p class="mb-0">payment:</p>
        <img src="dist/img/credit/payment.png" alt="payment" title="payment">
      </div>
    </div>
  </div>
  <!-- footer mini end -->


</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<!-- <script src="dist/js/demo.js"></script> -->
<!-- custom -->
<script src="dist/js/custom.js"></script>
<!-- shopping cart -->
<script src="dist/js/shoppingCart.js"></script>
<!-- splideJS -->
<script src="plugins/splidejs/splide.min.js"></script>
<script src="plugins/splidejs/splide-extension-auto-scroll.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $(document).on('click', '#load-more', function(event){
        event.preventDefault();
        var lastId = $('#load-more').data('last');
        var catId = $('#load-more').data('cat');
        // alert(id);
        $.ajax({
          url : "action/product-ajax.php",
          type : "post",
          data : {
            last_id : lastId,
            cat_id : catId,
          },
          success : function(res){
            $('#remove-data').remove();
            $('#add-row').append(res);
          }

        })


      })
    })
  </script>

</body>
</html>
<!-- footer.php end -->