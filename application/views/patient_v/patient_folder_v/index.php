<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:37
 */
?>
<!doctype html>
<html lang="tr" data-layout="semibox"
      data-layout-style="default" data-sidebar="light" data-topbar="dark" data-sidebar-size="lg" data-sidebar-image="none"
      data-preloader="disable" data-bs-theme="light" data-layout-width="fluid" data-layout-position="fixed" data-sidebar-visibility="show">


<head>

    <link rel="stylesheet" href="<?=base_url() ?>/assets/css/select2.min.css" type="text/css" />
    <link rel="stylesheet" href="<?=base_url() ?>/assets/css/dropzone.min.css" type="text/css" />

    <?php $this->load->view("includes/head"); ?>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/viewLibrary/style"); ?>
    <?php $this->load->view("includes/include_style"); ?>
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

    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

</div>
<!-- END layout-wrapper -->



<!--start back-to-top-->
<button onclick="topFunction()" class="btn btn-danger btn-icon" id="back-to-top">
    <i class="ri-arrow-up-line"></i>
</button>
<!--end back-to-top-->


<!-- Theme Settings -->

<?php $this->load->view("{$viewFolder}/{$subViewFolder}/treatment_update_modal"); ?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/income_update_modal"); ?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/income_add_modal"); ?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/treatment_add_modal"); ?>

<?php $this->load->view("includes/include_script"); ?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/viewLibrary/script"); ?>

<?php $this->load->view("{$viewFolder}/{$subViewFolder}/viewLibrary/treatment_script"); ?>
<?php $this->load->view("{$viewFolder}/{$subViewFolder}/viewLibrary/income_script"); ?>

</body>

</html>