<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 28.05.2025
 * Time: 19:26
 */
?>

<div id="scrollbar">
    <div class="container-fluid">

        <div id="two-column-menu"></div>

        <ul class="navbar-nav" id="navbar-nav">
            <li class="menu-title"><span data-key="t-menu">Menu</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url(); ?>">
                    <i class="ri-home-heart-line"></i> <span data-key="t-landing">Anasayfa</span>
                </a>
            </li>

            <li class="menu-title"><span data-key="t-menu">HASTA YÖNETİMİ</span></li>
            <li class="nav-item">
                <a class="nav-link menu-link" href="<?=base_url("patient") ?>">
                    <i class="ri-file-list-3-line"></i> <span data-key="t-landing">Hasta Listesi</span>
                </a>
            </li>

        </ul>
    </div>
    <!-- Sidebar -->
</div>
