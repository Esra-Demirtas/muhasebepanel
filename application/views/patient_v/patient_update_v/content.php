<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 9.06.2025
 * Time: 16:37
 */
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Hasta Bilgileri Düzenleme Formu</h4>

            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?=base_url(); ?>">Anasayfa</a></li>
                    <li class="breadcrumb-item"><a href="<?=base_url("patient"); ?>">Hasta Listesi</a></li>
                    <li class="breadcrumb-item active">Hasta Bilgileri Düzenleme Formu</li>
                </ol>
            </div>

        </div>
    </div>
</div>

<div class="row">
    <div class="card">
        <div class="card-header align-items-center d-flex">
            <h4 class="card-title mb-0 flex-grow-1"><?=$patientData->name . ' ' . $patientData->surname ?> İsimli Hastanın Bilgilerini Düzenleme Formu</h4>
        </div>
        <div class="card-body">
            <p class="text-muted">Yanında <span class="text-danger">*</span> olan bilgiler doldurulmak zorundadır.</p>
            <form action="<?=base_url("Patient/updateForm/$patientData->uniq_id") ?>" class="row g-3" method="post">
                <div class="col-md-3">
                    <label for="name" class="form-label">Hasta Adı <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="name" id="name" value="<?=$patientData->name ?>" placeholder="Hasta Adını Buraya Yazınız" required>
                </div>
                <div class="col-md-3">
                    <label for="surname" class="form-label">Hasta Soyadı <span class="text-danger">*</span></label>
                    <input type="text" class="form-control" name="surname" id="surname" value="<?=$patientData->surname ?>" oninput="this.value = this.value.toUpperCase()" placeholder="Hasta Soyadını Buraya Yazınız" required>
                </div>
                <div class="col-md-3">
                    <label for="identity_no" class="form-label">TC No <span class="text-danger">*</span></label>
                    <input type="number" class="form-control" name="identity_no" id="identity_no" value="<?=$patientData->identity_no ?>" placeholder="Hasta TC No Buraya Yazınız">
                </div>
                <div class="col-md-3">
                    <label for="birth_date" class="form-label">Doğum Tarihi <span class="text-danger">*</span></label>
                    <input type="date" class="form-control" name="birth_date" id="birth_date" value="<?=$patientData->birth_date ?>">
                </div>
                <div class="col-md-3">
                    <label for="phone" class="form-label">Telefon Numarası</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="<?=$patientData->phone ?>" placeholder="Telefonu Bilgisini Buraya Yazınız">
                </div>
                <div class="col-md-3">
                    <label for="email" class="form-label">E-posta Adresi</label>
                    <input type="text" class="form-control" name="email" id="email" value="<?=$patientData->email ?>" placeholder="E-posta Adresini Buraya Yazınız">
                </div>
                <div class="col-md-3">
                    <div class="mb-3">
                        <label for="family_id" class="form-label">Hastanın Bağlı Olduğu Aile</label>
                        <select name="family_id" class="form-select select2" id="family_id">
                            <option value="0" <?= isset($patientData->family_id) && $patientData->family_id == 0 ? 'selected' : ''; ?>>--Diğer--</option>
                            <?php foreach ($familyData as $item) { ?>
                                <option value="<?= $item->uniq_id; ?>" <?= isset($patientData->family_id) && $patientData->family_id == $item->uniq_id ? 'selected' : ''; ?>>
                                    <?= $item->family_name; ?>
                                </option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="col-md-3">
                    <label class="form-label d-block">Cinsiyeti <span class="text-danger"></span></label>
                    <div class="d-flex align-items-center gap-4">
                        <!-- Erkek (0) -->
                        <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0"
                                <?= $patientData->gender == 0 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="genderMale">
                                <i class="fas fa-mars text-primary me-1"></i> Erkek
                            </label>
                        </div>
                        <!-- Kadın (1) -->
                        <div class="form-check d-flex align-items-center gap-2">
                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1"
                                <?= $patientData->gender == 1 ? 'checked' : '' ?>>
                            <label class="form-check-label" for="genderFemale">
                                <i class="fas fa-venus text-danger me-1"></i> Kadın
                            </label>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <label for="reason_for_visit" class="form-label">Hasta Geliş Sebebi</label>
                    <textarea class="form-control" name="reason_for_visit" id="reason_for_visit" placeholder="Hastanın Geliş Sebebini Buraya Yazınız"><?= $patientData->reason_for_visit ?? '' ?></textarea>
                </div>

                <div class="col-md-12">
                    <label for="notes" class="form-label">Hasta Notu</label>
                    <textarea class="form-control" name="notes" id="notes" placeholder="Hastanın Notlarını Buraya Yazınız"><?= $patientData->notes ?? '' ?></textarea>
                </div>

                <div class="col-12">
                    <div class="text-end">
                        <button type="submit" class="btn btn-primary">Hasta Kaydını Güncelle</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>