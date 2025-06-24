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
                        <h4 class="mb-sm-0">Hasta Ekleme Formu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?=base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?=base_url("patient"); ?>">Hasta Listesi</a></li>
                                <li class="breadcrumb-item active">Hasta Ekleme Formu</li>
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
                                                    <h4 class="fw-bold fs-16 mb-1">Hasta Formu</h4>
                                                    <p class="text-muted mb-0">Yeni hastayı bu ekran üzerinden ekleyebilirsiniz, yanında <span class="text-danger">*</span> olan bilgiler doldurulmak zorundadır.</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?=base_url("Patient/addForm") ?>" class="row g-3" method="post">
                                <div class="col-md-3">
                                    <label for="name" class="form-label">Hasta Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Hasta Adını Buraya Yazınız" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="surname" class="form-label">Hasta Soyadı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="surname" id="surname" oninput="this.value = this.value.toUpperCase()" placeholder="Hasta Soyadını Buraya Yazınız" required>
                                </div>
                                <div class="col-md-3">
                                    <label for="identity_no" class="form-label">TC No <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" name="identity_no" id="identity_no"  placeholder="Personel TC No Buraya Yazınız">
                                </div>
                                <div class="col-md-3">
                                    <label for="birth_date" class="form-label">Doğum Tarihi <span class="text-danger">*</span></label>
                                    <input type="date" class="form-control" name="birth_date" id="birth_date">
                                </div>
                                <div class="col-md-3">
                                    <label for="phone" class="form-label">Telefon Numarası</label>
                                    <input type="text" class="form-control" name="phone" id="phone" placeholder="Hasta Telefonu Bilgisini Buraya Yazınız">
                                </div>
                                <div class="col-md-3">
                                    <label for="email" class="form-label">E-posta Adresi</label>
                                    <input type="text" class="form-control" name="email" id="email" placeholder="E-posta Adresini Buraya Yazınız">
                                </div>
                                <div class="col-3">
                                    <div class="mb-3">
                                        <label for="family_id" class="form-label">Hastanın Bağlı Olduğu Aile</label>
                                        <select name="family_id" class="form-control select2" id="family_id">
                                            <option value="0">--Diğer--</option>
                                            <?php foreach ($familyData as $item){ ?>
                                                <option value="<?=$item->uniq_id; ?>"><?=$item->family_name; ?></option>
                                            <?php } ?>
                                        </select>
                                    </div>
                                </div><!--end col-->
                                <div class="col-md-3">
                                    <label class="form-label d-block">Cinsiyeti <span class="text-danger"></span></label>
                                    <div class="d-flex align-items-center gap-4">
                                        <div class="form-check d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="gender" id="genderMale" value="0">
                                            <label class="form-check-label" for="genderMale">
                                                <i class="fas fa-mars text-primary me-1"></i> Erkek
                                            </label>
                                        </div>
                                        <div class="form-check d-flex align-items-center gap-2">
                                            <input class="form-check-input" type="radio" name="gender" id="genderFemale" value="1">
                                            <label class="form-check-label" for="genderFemale">
                                                <i class="fas fa-venus text-danger me-1"></i> Kadın
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <label for="reason_for_visit" class="form-label">Hasta Geliş Sebebi</label>
                                    <textarea class="form-control" name="reason_for_visit" id="reason_for_visit" rows="4" placeholder="Hastann Geliş Sebebini Buraya Yazınız"></textarea>
                                </div>
                                <div class="col-md-12">
                                    <label for="notes" class="form-label">Hasta Notu</label>
                                    <textarea class="form-control" name="notes" id="notes" rows="4" placeholder="Hastann Notlarını Buraya Yazınız"></textarea>
                                </div>

                                <div class="col-12">
                                    <div class="text-end">
                                        <button type="submit" class="btn btn-success">Hastayı Kaydet</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
