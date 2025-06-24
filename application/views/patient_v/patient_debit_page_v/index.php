<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 13:07
 */
?>
<!doctype html>
<html lang="tr" data-layout="semibox"
      data-layout-style="default" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none"
      data-preloader="disable" data-bs-theme="light" data-layout-width="fluid" data-layout-position="fixed" data-sidebar-visibility="show">

<head>
    <?php $this->load->view("{$viewFolder}/viewLibrary/style"); ?>
    <?php $this->load->view("includes/head"); ?>

</head>

<body>

<!-- Begin page -->
<div id="layout-wrapper">

    <header id="page-topbar">
        <?php $this->load->view("includes/header"); ?>
    </header>
    <!-- ========== App Menu ========== -->
    <div class="app-menu navbar-menu">
        <!-- LOGO -->
          
           <?php $this->load->view("includes/appmenu"); ?>
    </div>
    <!-- Left Sidebar End -->
    <!-- Vertical Overlay-->
    <div class="vertical-overlay"></div>


    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                <?php $this->load->view("{$viewFolder}/content"); ?>

            </div>
            <!-- container-fluid -->
        </div>
        <!-- End Page-content -->

        <?php $this->load->view("includes/footer"); ?>

    </div>
    <!-- end main content-->

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->

<?php $this->load->view("includes/include_script"); ?>

<?php $this->load->view("{$viewFolder}/viewLibrary/script"); ?>


</body>

</html>