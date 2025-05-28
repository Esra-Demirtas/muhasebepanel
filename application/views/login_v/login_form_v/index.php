<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 29.05.2025
 * Time: 01:07
 */
?>
<!doctype html>
<html lang="tr" data-layout="vertical" data-topbar="light" data-sidebar="light" data-sidebar-size="lg">

<head>
    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/viewLibrary/style"); ?>
    <?php $this->load->view("includes/head"); ?>
</head>

<body>

<?php $this->load->view("{$viewFolder}/{$subViewFolder}/content"); ?>

<!-- JAVASCRIPT -->
<?php $this->load->view("includes/include_script"); ?>
<script src="<?=base_url(); ?>assets/js/pages/password-addon.init.js"></script>



</body>

</html>