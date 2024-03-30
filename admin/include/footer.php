      <footer class="main-footer">
        <strong>Copyright &copy; 2022-2023 <a href="https://easywebtouch.com" target="_blank">Pharmacy</a>.</strong>
        All rights reserved.
        <div class="float-right d-none d-sm-inline-block"><b>V-</b> 1.0.0</div>
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <!-- Alert -->
    <?php include("alert.php");?> 
    <!-- Alert end -->

    <!-- All JS -->
    <?php include("all-js.php");?>
    <!-- All JS end -->

    <!-- Summernote -->
    <script>
      $('#summernote').summernote({
        placeholder: 'Hello Bootstrap 4',
        tabsize: 2,
        height: 100
      });
    </script>

    <!-- Error msg  -->
    <?php
      unset($_SESSION['msg']);
    ?>
  </body>
</html>