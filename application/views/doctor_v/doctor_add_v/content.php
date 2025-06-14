<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 18:40
 */
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Yeni Doktor Ekleme Formu</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="<?= base_url("doctor"); ?>">Doktor Yönetim Sayfası</a></li>
                    <li class="breadcrumb-item active">Yeni Doktor Ekleme Formu</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="card-title mb-0">Yeni Doktor Ekleme Formu</h4>
        </div>
        <div class="card-body">
            <form action="<?= base_url("doctor/addForm") ?>" class="row g-3" method="post">
                <div class="col-md-6">
                    <label for="name" class="form-label">Adı <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?= isset($item) ? $item->name : '' ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="surname" class="form-label">Soyadı <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="surname" id="surname" value="<?= isset($item) ? $item->surname : '' ?>" required>
                </div>

                <div class="col-md-6">
                    <label for="branch" class="form-label">Uzmanlık Alanı</label>
                    <input type="text" class="form-control" name="branch" id="branch" value="<?= isset($item) ? $item->branch : '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="fixed_salary" class="form-label">Sabit Maaş (₺)</label>
                    <input type="number" step="0.01" class="form-control" name="fixed_salary" id="fixed_salary" value="<?= isset($item) ? $item->fixed_salary : '' ?>">
                </div>

                <div class="col-md-3">
                    <label for="commission_rate" class="form-label">Hakediş Oranı (%)</label>
                    <input type="number" class="form-control" name="commission_rate" id="commission_rate" value="<?= isset($item) ? $item->commission_rate : '' ?>" min="0" max="100">
                </div>

                <div class="col-12 text-end mt-3">
                    <button type="submit" class="btn btn-success">Kaydet</button>
                </div>
            </form>
        </div>
    </div>
</div>