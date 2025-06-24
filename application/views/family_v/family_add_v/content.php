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
                        <h4 class="mb-sm-0">Yeni Aile Ekleme Formu</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url("family"); ?>">Aile Yönetim Sayfası</a></li>
                                <li class="breadcrumb-item active">Yeni Aile Ekleme Formu</li>
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
                                                    <h4 class="fw-bold fs-16 mb-1">Yeni Aile Ekleme Formu</h4>
                                                    <p class="text-muted mb-0">Yeni bir aile kaydı oluşturmak için aşağıdaki formu doldurunuz.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-auto">
                                        <!-- Yeni Aile Ekle butonu, burada bir formun parçası olmadığı için sadece link olarak kalabilir veya kaldırılabilir -->
                                        <!-- Mevcut formunuzun mantığı gereği bu kısım burada gereksiz olabilir -->
                                        <!-- <a href="<?= base_url("family/add") ?>" class="btn btn-primary add-btn"><i class="ri-add-line align-bottom me-1"></i>Yeni Aile Ekle</a> -->
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <!-- Form içeriği buraya taşındı, orijinal haliyle korundu -->
                            <form action="<?= base_url("family/addForm") ?>" class="row g-3" method="post">
                                <div class="col-md-6">
                                    <label for="family_name" class="form-label">Aile Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="family_name" id="family_name" required>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label for="main_contact_id" class="form-label">Ailenin Bağlı Olduğu Kişi</label>
                                        <select name="main_contact_id" class="form-control select2" id="main_contact_id">
                                            <option value="0">--Diğer--</option>
                                            <?php foreach ($patientData as $item){ ?>
                                                <option value="<?=$item->uniq_id; ?>"><?=$item->name . ' ' . $item->surname; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div><!--end col-->

                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- container-fluid -->
    </div>
</div>
