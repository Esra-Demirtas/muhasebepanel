<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 28.05.2025
 * Time: 19:17
 */
?>

<div class="layout-width">
    <div class="navbar-header">
        <div class="d-flex">
            <!-- LOGO -->
            <div class="navbar-brand-box horizontal-logo">
                <a href="index.html" class="logo logo-dark">
                        <span class="logo-sm">
                            <img src="<?=base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                        </span>
                    <span class="logo-lg">
                            <img src="<?=base_url(); ?>assets/images/logo-dark.png" alt="" height="17">
                        </span>
                </a>

                <a href="index.html" class="logo logo-light">
                        <span class="logo-sm">
                            <img src="<?=base_url(); ?>assets/images/logo-sm.png" alt="" height="22">
                        </span>
                    <span class="logo-lg">
                            <img src="<?=base_url(); ?>assets/images/logo-light.png" alt="" height="17">
                        </span>
                </a>
            </div>

            <button type="button" class="btn btn-sm px-3 fs-16 header-item vertical-menu-btn topnav-hamburger"
                    id="topnav-hamburger-icon">
                    <span class="hamburger-icon">
                        <span></span>
                        <span></span>
                        <span></span>
                    </span>
            </button>

            <!-- App Search-->

            <?php $this->load->view("includes/header_parts/form"); ?>

        </div>

        <div class="d-flex align-items-center">

            <?php $this->load->view("includes/header_parts/search_mobile"); ?>

            <div class="ms-1 header-item d-none d-sm-flex">
                <button type="button" class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle"
                        data-toggle="fullscreen">
                    <i class='bx bx-fullscreen fs-22'></i>
                </button>
            </div>

            <div class="ms-1 header-item d-none d-sm-flex">
                <button type="button"
                        class="btn btn-icon btn-topbar btn-ghost-secondary rounded-circle light-dark-mode">
                    <i class='bx bx-moon fs-22'></i>
                </button>
            </div>

            <?php $this->load->view("includes/header_parts/notification"); ?>
            <?php $this->load->view("includes/header_parts/user_information"); ?>

        </div>
    </div>
</div>