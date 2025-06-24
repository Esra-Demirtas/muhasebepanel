<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 20:27
 */
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü (Orijinal hali korunmuştur, değişiklik istenmediği için) -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Aile Detay Sayfası</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Aile Detay</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Başlık ve Breadcrumb Bölümü -->

            <div class="row">
                <div class="col-lg-12">
                    <div class="card mt-n4 mx-n4">
                        <div class="bg-info-subtle">
                            <div class="card-body pb-0 px-4">
                                <div class="row mb-3">
                                    <div class="col-md">
                                        <div class="row align-items-center g-3">
                                            <div class="col-md-auto">
                                                <div class="avatar-md">
                                                    <div class="rounded-circle overflow-hidden d-flex justify-content-center align-items-center bg-light">
                                                        <?php

                                                        if (empty($familyData->profile_image)) {
                                                            $familyImgSrc = base_url() . 'assets/img/default-family.jpeg';
                                                        } else {
                                                            $familyImgSrc = base_url("uploads/family_profiles/{$familyData->profile_image}");
                                                        }
                                                        ?>
                                                        <img src="<?= $familyImgSrc ?>" alt="Aile Resmi" class="avatar-md rounded-circle object-fit-cover">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold"><?=$familyData->family_name ?></h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <?php if (isset($familyData->main_contact_id) && !empty($patientData)) {
                                                            $main_contact_name = 'Bilinmiyor';
                                                            foreach ($patientData as $patient) {
                                                                if ($patient->uniq_id == $familyData->main_contact_id) {
                                                                    $main_contact_name = $patient->name . ' ' . $patient->surname;
                                                                    break;
                                                                }
                                                            }
                                                            ?>
                                                            <div>
                                                                <i class="ri-user-line align-bottom me-1"></i> Ana İletişim:
                                                                <?php if ($main_contact_name !== 'Bilinmiyor') { ?>
                                                                    <a href="<?= base_url("patient/folder/{$familyData->main_contact_id}") ?>" class="fw-semibold text-primary">
                                                                        <?= $main_contact_name ?>
                                                                    </a>
                                                                <?php } else { ?>
                                                                    <span class="fw-semibold"><?= $main_contact_name ?></span>
                                                                <?php } ?>
                                                            </div>
                                                            <div class="vr"></div>
                                                        <?php } ?>
                                                        <!-- Örnek: Aile ID'si -->
                                                        <div><i class="ri-bookmark-line align-bottom me-1"></i> Aile ID: <span class="fw-semibold"><?=$familyData->uniq_id ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Profili Düzenle Butonu -->
                                    <div class="col-md-auto">
                                        <a href="<?=base_url("Family/update/$familyData->uniq_id") ?>" class="btn btn-success"><i
                                                    class="ri-edit-box-line align-bottom"></i> Profili Düzenle</a>
                                    </div>
                                </div>

                                <!-- Nav Tabs (Sekme Başlıkları) -->
                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#detailtab" role="tab">
                                            Detay Dosyası
                                        </a>
                                    </li>
                                    <!-- Diğer aileye özel sekmeler buraya eklenebilir -->
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tab İçerikleri -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                        <div class="tab-pane fade show active" id="detailtab" role="tabpanel">
                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/detail_tab"); ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
