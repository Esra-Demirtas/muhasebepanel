<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 20:27
 */
?>
<div class="profile-foreground position-relative mx-n4 mt-n4">
    <div class="profile-wid-bg2">
        <img src="" alt="" class="profile-wid-img" />
    </div>
</div>
<div class="pt-4 mb-4 mb-lg-3 pb-lg-4">
    <div class="row g-4">

        <!--end col-->
        <div class="col">
            <div class="p-2">
                <h3 class="text-white mb-1"><?=$familyData->family_name ?></h3>
            </div>
        </div>

    </div>
    <!--end row-->
</div>

<div class="row">
    <div class="col-lg-12">
        <div>
            <div class="d-flex">
                <!-- Nav tabs -->
                <ul class="nav nav-pills animation-nav profile-nav gap-2 gap-lg-3 flex-grow-1"
                    role="tablist">
                    <li class="nav-item">
                        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#detailtab"
                           role="tab">
                            <i class="ri-airplay-fill d-inline-block d-md-none"></i> <span
                                class="d-none d-md-inline-block">Detay Dosyası</span>
                        </a>
                    </li>
                </ul>
                <div class="flex-shrink-0">
                    <a href="<?=base_url("Family/update/$familyData->uniq_id") ?>" class="btn btn-success"><i
                            class="ri-edit-box-line align-bottom"></i> Profili Düzenle</a>
                </div>
            </div>
            <div class="tab-content pt-4 text-muted">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/detail_tab"); ?>
            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->