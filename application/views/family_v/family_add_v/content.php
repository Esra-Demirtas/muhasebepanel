<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 17:18
 */
?>
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

<div class="row">
    <div class="card">
        <div class="card-header d-flex align-items-center">
            <h4 class="card-title mb-0">Yeni Aile Ekleme Formu</h4>
        </div>
        <div class="card-body">
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
