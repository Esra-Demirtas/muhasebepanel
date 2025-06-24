<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:32
 */
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Doktor Kaydı Düzenleme Sayfası</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url("doctor"); ?>">Doktor Yönetim Sayfası</a></li>
                                <li class="breadcrumb-item active">Doktor Kaydı Düzenleme</li>
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
                                            <div class="col-md">
                                                <div>
                                                    <h4 class="fw-bold fs-16 mb-1">Doktor Bilgilerini Güncelle</h4>
                                                    <p class="text-muted mb-0">Mevcut doktor bilgilerini bu ekran üzerinden düzenleyebilirsiniz.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url("doctor/updateForm/{$doctorData->uniq_id}") ?>" method="post" class="row g-3">
                                <div class="col-md-6">
                                    <label for="name" class="form-label">Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name"
                                           value="<?= htmlspecialchars($doctorData->name) ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="surname" class="form-label">Soyadı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="surname" id="surname"
                                           value="<?= htmlspecialchars($doctorData->surname) ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="branch" class="form-label">Uzmanlık Alanı</label>
                                    <input type="text" class="form-control" name="branch" id="branch"
                                           value="<?= htmlspecialchars($doctorData->branch) ?>">
                                </div>

                                <div class="col-md-3">
                                    <label for="fixed_salary" class="form-label">Sabit Maaş (₺)</label>
                                    <input type="number" step="0.01" class="form-control" name="fixed_salary" id="fixed_salary"
                                           value="<?= htmlspecialchars($doctorData->fixed_salary) ?>">
                                </div>

                                <div class="col-md-3">
                                    <label for="commission_rate" class="form-label">Hakediş Oranı (%)</label>
                                    <input type="number" class="form-control" name="commission_rate" id="commission_rate"
                                           value="<?= htmlspecialchars($doctorData->commission_rate) ?>" min="0" max="100">
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success">Güncelle</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
