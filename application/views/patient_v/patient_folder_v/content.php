<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:37
 */
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">

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
                                                        <?php if (empty($patientData->profile_image)) { ?>
                                                            <img src="<?=base_url('assets/img/default-avatar.jpeg') ?>" alt="Varsayılan Profil Resmi" class="avatar-md rounded-circle object-fit-cover">
                                                        <?php } else { ?>
                                                            <img src="<?=base_url("uploads/patient_profiles/{$patientData->profile_image}") ?>" alt="Profil Resmi" class="avatar-md rounded-circle object-fit-cover">
                                                        <?php } ?>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold"><?=$patientData->name. ' ' .  $patientData->surname  ?></h4>
                                                    <div class="hstack gap-3 flex-wrap">
                                                        <div><i class="ri-id-card-line align-bottom me-1"></i> TC No: <span class="fw-semibold"><?=$patientData->identity_no ?></span></div>
                                                        <div class="vr"></div>
                                                        <div><i class="ri-genderless-line align-bottom me-1"></i> Cinsiyet: <span class="fw-semibold"><?=$patientData->gender ?></span></div>
                                                        <div class="vr"></div>
                                                        <div><i class="ri-phone-line align-bottom me-1"></i> Tel: <span class="fw-semibold"><?=$patientData->phone ?: 'Belirtilmedi' ?></span></div>
                                                        <div class="vr"></div>
                                                        <div><i class="ri-calendar-line align-bottom me-1"></i> Doğum Tarihi: <span class="fw-semibold"><?=date('d-m-Y', strtotime($patientData->birth_date)) ?></span></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <a href="<?=base_url("Patient/update/{$patientData->uniq_id}") ?>" class="btn btn-success"><i
                                                    class="ri-edit-box-line align-bottom"></i> Profili Düzenle</a>
                                    </div>
                                </div>

                                <ul class="nav nav-tabs-custom border-bottom-0" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active fw-semibold" data-bs-toggle="tab" href="#generaltab" role="tab">
                                            Genel Bilgiler
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#treatmenttab" role="tab">
                                            Tedavi Planı
                                        </a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link fw-semibold" data-bs-toggle="tab" href="#incometab" role="tab">
                                            Ödeme İşlemleri
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="tab-content text-muted">
                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/general_tab"); ?>
                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/treatment_tab"); ?>
                            <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/income_tab"); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
