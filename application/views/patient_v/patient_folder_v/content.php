<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:37
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
                <h3 class="text-white mb-1"><?=$patientData->name. ' ' .  $patientData->surname  ?></h3>
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
                        <a class="nav-link fs-14 active" data-bs-toggle="tab" href="#generaltab"
                           role="tab">
                            <i class="ri-airplay-fill d-inline-block d-md-none"></i>
                            <span class="d-none d-md-inline-block">Genel Dosyası</span>
                        </a>
                    </li>
                    <li class="nav-item">
                       <a class="nav-link fs-14" data-bs-toggle="tab" href="#treatmenttab" role="tab">
                           <i class="ri-price-tag-line d-inline-block d-md-none"></i>
                           <span class="d-none d-md-inline-block">Tedavi Planı</span>
                       </a>
                   </li>
                    <li class="nav-item">
                        <a class="nav-link fs-14" data-bs-toggle="tab" href="#incometab" role="tab">
                            <i class="ri-price-tag-line d-inline-block d-md-none"></i>
                            <span class="d-none d-md-inline-block">Ödeme İşlemleri</span>
                        </a>
                    </li>
                </ul>
                <div class="flex-shrink-0">
                    <a href="<?=base_url("Patient/update/$patientData->uniq_id") ?>" class="btn btn-success"><i
                            class="ri-edit-box-line align-bottom"></i> Profili Düzenle</a>
                </div>
            </div>
            <div class="tab-content pt-4 text-muted">
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/general_tab"); ?>
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/treatment_tab"); ?>
                <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/income_tab"); ?>
            </div>
            <!--end tab-content-->
        </div>
    </div>
    <!--end col-->
</div>
<!--end row-->