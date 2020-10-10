 <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

      <!-- Sidebar - Brand -->
      <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.php">
        <div class="sidebar-brand-icon rotate-n-15">
          <i class="fas fa-home"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Tboy <sup>CT</sup> </div>
      </a>

      <!-- Divider -->
      <hr class="sidebar-divider my-0">

      <!-- Nav Item - Dashboard -->
      <li class="nav-item active">
        <a class="nav-link" href="index.php">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          <span>Dashboard</span></a>
      </li>

     
        <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="admin.student.php">
          <i class="fas fa-fw fa-users"></i>
          <span>Students</span></a>
      </li>

      <!-- Nav Item - Charts -->
      <li class="nav-item">
        <a class="nav-link" href="admin.record.php">
          <i class="fas fa-fw fa-book"></i>
          <span>Records</span></a>
      </li>

      <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="admin.access.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Access</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="admin.category.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Categories</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="admin.brand.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Brands</span></a>
      </li>

       <!-- Nav Item - Tables -->
      <li class="nav-item">
        <a class="nav-link" href="admin.product.php">
          <i class="fas fa-fw fa-table"></i>
          <span>Products</span></a>
      </li>

      <!-- Divider -->
      <hr class="sidebar-divider d-none d-md-block">

      <!-- Sidebar Toggler (Sidebar) -->
      <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
      </div>

    </ul>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>

         <h10 style="color: blue;"><b>TBOY COMPUTER TECHNOLOGY - INVENTORY SYSTEM</b></h10>

          <!-- Topbar Navbar -->
          <ul class="navbar-nav ml-auto">

            

            <!-- Nav Item - Alerts -->
            <li class="nav-item dropdown no-arrow mx-1">
              <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-bell fa-fw"></i>
                <!-- Counter - Alerts -->
                <span class="badge badge-danger badge-counter">
                  <?php 
                  include("./include/admin.DBOperation.php");
                  $admin = new AdminDBOperation();

                  $alert = $admin->countAlert();

                  if ($alert < 1) {

                    echo $alert;
                  }elseif ($alert == 1) {

                   echo $alert;

                  }elseif ($alert > 1) {
                    echo $alert."+";
                    
                  }
                  ?>

                </span>
              </a>
              <!-- Dropdown - Alerts -->
              <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                <h6 class="dropdown-header">
                  Alerts Center
                </h6>

                <?php

                  $rows = $admin->GethomeAlert("invoice");

                  foreach ($rows as $row) {
                 ?>

                <a class="dropdown-item d-flex align-items-center" href="admin.alertsub.php?alertid=<?php echo $row["invoice_no"];?>">
                  <div class="mr-3">
                    <div class="icon-circle bg-primary">
                      <i class="fas fa-book text-white"></i>
                    </div>
                  </div>
                  <div>
                    <div class="small text-gray-500"><?php echo $row["order_date"]; ?></div>
                    <span class="font-weight-bold">
                      <?php if($name == $row["in_user_name"]){

                       echo "You";
                            }else{
                              echo $row["in_user_name"];
  } ?> , sold goods of <?php echo "N".number_format($row["net_total"],2)."K";?> to <?php echo $row["customer_name"];?></span>
                  </div>
                </a>
              <?php   
                  }


                ?>
                <a class="dropdown-item text-center small text-gray-500" href="admin.alert.php">Show All Alerts</a>
              </div>
            </li>

            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
              <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $name;?></span>
                <img class="img-profile rounded-circle" src="image/<?php echo $photo;?>">
              </a>
              <!-- Dropdown - User Information -->
              <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                <a class="dropdown-item" href="admin.profile.php">
                  <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                  Profile
                </a>
              
                <div class="dropdown-divider"></div>
                <a class="dropdown-item" href="admin.logout.php"  >
                  <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                  Logout
                </a>
              </div>
            </li>

          </ul>

        </nav>
        <!-- End of Topbar -->