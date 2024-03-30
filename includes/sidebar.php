  <!-- Main Sidebar Container -->
  <aside class="main-sidebar main-sidebar-custom sidebar-light-primary elevation-4">
    <!-- Sidebar -->
        <div class="sidebar" style="background-color: #9dffc978; height: 100%;">
      <!-- SidebarSearch Form -->
      
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <li class="nav-item d-none cat-2">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button" style="font-size: 1.5rem;">
              <i class="nav-icon fas fa-bars text-blue2"></i>
              <p class="text-blue2 font-weight-bold">
                Category
              </p>
            </a>
            <hr>
          </li>
          <li class="nav-item d-none call-item">
            <a href="tel:+880" class="nav-link">
              <i class="fas fa-phone-volume text-blue2"></i>
              <p class="text-blue2 font-weight-bold">
                Call to order
              </p>
            </a>
          </li>
          <li class="nav-item d-none health-item">
            <a href="all-products.php" class="nav-link">
              <i class="fas fa-heart text-blue2" aria-hidden="true"></i>
              <p class="text-blue2 font-weight-bold">
                Healthcare Products
              </p>
            </a>
          </li>

          <?php
          $sqlCat = "SELECT * FROM ecm_category";
          $queryCat = $pdo->prepare($sqlCat);
          $queryCat->execute();
          while($row = $queryCat->fetch(PDO::FETCH_OBJ)){
          ?>
          <li class="nav-item">
            <a href="category.php?id=<?php echo $row->cat_id;?>" class="nav-link">
              <img src="admin/dist/img/category/<?php echo $row->category_image ?>" 
                  alt="<?php echo $row->category?>" class="nav-icon"
                >
              <p class="text-blue2 font-weight-bold text-capitalize">
                <?php echo $row->category ?>
              </p>
            </a>
          </li>
          <?php
          }
          ?>

          <!-- <li class="nav-item d-none upload-2">
            <hr>
            <a class="nav-link" >        
                <i class="nav-icon fas fa-upload text-blue2"></i>
                <p class="text-blue2">
                  <label class="file-input__label " for="file-input" style="cursor: pointer;" >
                    <span>&nbsp; Upload Prescription</span>
                  </label>
                  <input type="file" name="file-input" id="file-input" 
                    class="file-input__input" style="display: none;"
                  />
                </p>
            </a>
          </li>
          <li class="nav-item d-none health-2">
            <a href="all-products.php" class="nav-link">
              <i class="nav-icon fas fa-heart text-blue2"></i>
              <p class="text-blue2 font-weight-bold">
                Healthcare Products
              </p>
            </a>
          </li> -->
          </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>

  </aside>