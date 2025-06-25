<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 28.05.2025
 * Time: 19:26
 */
?>
<?php
$user = $this->session->userdata('user');
?>
<div class="navbar-brand-box">
    <!-- Dark Logo-->
    <a href="<?=base_url() ?>" class="logo logo-dark">
        <span class="logo-sm">
            <img src="<?=base_url() ?>assets/root/images/12.png" alt="" height="40">
        </span>
        <span class="logo-lg">
            <img src="<?=base_url() ?>assets/root/images/11.png" alt="" height="40">
        </span>
    </a>
    <!-- Light Logo-->
    <a href="<?=base_url() ?>" class="logo logo-light">
        <span class="logo-sm">
            <img src="<?=base_url() ?>assets/root/images/11.png" alt="" height="40">
        </span>
        <span class="logo-lg">
            <img src="<?=base_url() ?>assets/root/images/11.png" alt="" height="40">
        </span>
    </a>
    <button type="button" class="btn btn-sm p-0 fs-20 header-item float-end btn-vertical-sm-hover" id="vertical-hover">
        <i class="ri-record-circle-line"></i>
    </button>
</div>


<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu"></div>

        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>

            <!-- Anasayfa -->
            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url(); ?>">
                    <i class="ri-home-4-line"></i> <span data-key="t-landing">Anasayfa</span>
                </a>
            </li>

            <!-- Hasta Yönetimi -->
            <li class="menu-title"><span data-key="t-menu">HASTA YÖNETİMİ</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url("patient") ?>">
                    <i class="ri-user-heart-line"></i> <span data-key="t-landing">Hasta Listesi</span>
                </a>
            </li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url("family") ?>">
                    <i class="ri-group-line"></i> <span data-key="t-landing">Aile Listesi</span>
                </a>
            </li>

            <!-- Doktor Yönetimi -->
            <li class="menu-title"><span data-key="t-menu">DOKTOR YÖNETİMİ</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url("doctor") ?>">
                    <i class="ri-stethoscope-line"></i> <span data-key="t-landing">Doktor Listesi</span>
                </a>
            </li>

            <!-- Stok Yönetimi -->
            <li class="menu-title"><span data-key="t-menu">STOK YÖNETİMİ</span></li>

            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url("stock") ?>">
                    <i class="ri-stethoscope-line"></i> <span data-key="t-landing">Stok Listesi</span>
                </a>
            </li>
        </ul>
    </div>
</div>

