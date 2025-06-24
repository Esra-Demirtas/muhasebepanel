<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 17:18
 */
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Aile Kaydı Düzenleme Sayfası</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url("family"); ?>">Aile Yönetim Sayfası</a></li>
                                <li class="breadcrumb-item active">Aile Kaydı Düzenleme</li>
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
                                                    <h4 class="fw-bold fs-16 mb-1">Aile Bilgilerini Güncelle</h4>
                                                    <p class="text-muted mb-0">Mevcut aile bilgilerini bu ekran üzerinden düzenleyebilirsiniz.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url("family/updateForm/{$familyData->uniq_id}") ?>" method="post" class="row g-3">

                                <div class="col-md-6">
                                    <label for="family_name" class="form-label">Aile Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="family_name" id="family_name"
                                           value="<?= htmlspecialchars($familyData->family_name) ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <div class="mb-3">
                                        <label for="main_contact_id" class="form-label">Ailenin Bağlı Olduğu Kişi</label>
                                        <select name="main_contact_id" class="form-select select2" id="main_contact_id">
                                            <option value="0" <?= isset($familyData->main_contact_id) && $familyData->main_contact_id == 0 ? 'selected' : ''; ?>>--Diğer--</option>
                                            <?php foreach ($patientData as $item) { ?>
                                                <option value="<?= $item->uniq_id; ?>" <?= isset($familyData->main_contact_id) && $familyData->main_contact_id == $item->uniq_id ? 'selected' : ''; ?>>
                                                    <?= $item->name . ' ' . $item->surname; ?>
                                                </option>
                                            <?php } ?>
                                        </select>
                                    </div>
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
