<?php

session_start();
include('./DataBase/config.php');
$admin_name = $_SESSION['admin_name'];
?>

<style>
  .logo {
    line-height: 80px;
    color: #fff;
    font-size: 32px;
    font-weight: 800;
    text-transform: uppercase;
    float: left;
    -webkit-transition: all 0.3s ease 0s;
    -moz-transition: all 0.3s ease 0s;
    -o-transition: all 0.3s ease 0s;
    transition: all 0.3s ease 0s;
    margin-left: 30px;
  }

  .logo em {
    font-style: normal;
    color: #ed563b;
    font-weight: 900;
  }

  @media (max-width: 767px) {
    .logo {
      color: #1e1e1e;
      margin-left: 30px;
    }
  }
</style>




<aside class="left-sidebar" data-sidebarbg="skin5">

  <!-- <a class="navbar-brand" href="index.html">
    <b class="logo-icon ps-2">
    <span class="logo-text ms-2">
      <a href="index.php" class="logo">Car<em> ZO</em></a>
    </span>
    </b>
  </a> -->

  <div class="scroll-sidebar">
    <!-- Sidebar navigation-->
    <nav class="sidebar-nav">
      <ul id="sidebarnav" class="">

        <li class="sidebar-item">
          <span class="hide-menu"> <a href="index.php" class="logo" style="margin:0px 50px">Car<em> ZO</em></a></span>
        </li>
      <!-- <?php if (isset($admin_name)) { ?>
        <li class="sidebar-item">
          <a class="sidebar-link"><i></i><span> Welcome
              <?php echo $admin_name;
              echo '<script> console.log("hiii ' . $admin_name . '");</script>'; ?>
            </span></a>
        </li>
      <?php } else {
        echo "<script>alert('Invalid password or username');
        window.location = '../../User-page/index.php#login-form'</script>";
      } ?> -->

        <li class="sidebar-item">
                  <a class="sidebar-link"><i></i><span> Welcome
                      <?php echo $_SESSION['admin_name'];
              echo '<script> console.log("hii' . $admin_name . '");</script>'; ?>
            </span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="index.php" aria-expanded="false"><i
              class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="arrived-cars-list.php"
            aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Arrived cars
              List</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link waves-effect waves-dark sidebar-link" href="running-cars-list.php"
            aria-expanded="false"><i class="mdi mdi-border-inside"></i><span class="hide-menu">Running cars
              List</span></a>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
              class="mdi mdi-receipt"></i><span class="hide-menu">Forms </span></a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="add-car.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span class="hide-menu">
                  Add Car </span></a>
            </li>
            <li class="sidebar-item">
              <a href="current-runig.php" class="sidebar-link"><i class="mdi mdi-note-outline"></i><span
                  class="hide-menu"> Add Current Running Car </span></a>
            </li>

            <li class="sidebar-item">
              <a href="form-wizard.php" class="sidebar-link"><i class="mdi mdi-note-plus"></i><span class="hide-menu">
                  Form Wizard </span></a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
              class="mdi mdi-move-resize-variant"></i><span class="hide-menu">Addons </span></a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="index2.html" class="sidebar-link"><i class="mdi mdi-view-dashboard"></i><span class="hide-menu">
                  Dashboard-2 </span></a>
            </li>
            <li class="sidebar-item">
              <a href="pages-gallery.php" class="sidebar-link"><i class="mdi mdi-multiplication-box"></i><span
                  class="hide-menu"> Gallery </span></a>
            </li>
            <li class="sidebar-item">
              <a href="pages-calendar.php" class="sidebar-link"><i class="mdi mdi-calendar-check"></i><span
                  class="hide-menu"> Calendar </span></a>
            </li>
            <li class="sidebar-item">
              <a href="pages-invoice.php" class="sidebar-link"><i class="mdi mdi-bulletin-board"></i><span
                  class="hide-menu"> Invoice </span></a>
            </li>
            <li class="sidebar-item">
              <a href="pages-chat.php" class="sidebar-link"><i class="mdi mdi-message-outline"></i><span
                  class="hide-menu"> Chat Option </span></a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
              class="mdi mdi-account-key"></i><span class="hide-menu">Authentication </span></a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="authentication-login.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span
                  class="hide-menu"> Login </span></a>
            </li>
            <li class="sidebar-item">
              <a href="authentication-register.html" class="sidebar-link"><i class="mdi mdi-all-inclusive"></i><span
                  class="hide-menu"> Register </span></a>
            </li>
          </ul>
        </li>
        <li class="sidebar-item">
          <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false"><i
              class="mdi mdi-alert"></i><span class="hide-menu">Errors </span></a>
          <ul aria-expanded="false" class="collapse first-level">
            <li class="sidebar-item">
              <a href="error-403.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span
                  class="hide-menu"> Error 403 </span></a>
            </li>
            <li class="sidebar-item">
              <a href="error-404.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span
                  class="hide-menu"> Error 404 </span></a>
            </li>
            <li class="sidebar-item">
              <a href="error-405.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span
                  class="hide-menu"> Error 405 </span></a>
            </li>
            <li class="sidebar-item">
              <a href="error-500.html" class="sidebar-link"><i class="mdi mdi-alert-octagon"></i><span
                  class="hide-menu"> Error 500 </span></a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- End Sidebar navigation -->
  </div>
  <!-- End Sidebar scroll-->
</aside>