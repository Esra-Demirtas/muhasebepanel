<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 16.06.2025
 * Time: 22:42
 */
?>
<div class="modal fade" id="addTreatmentModal" tabindex="-1" aria-labelledby="addTreatmentModalLabel" >
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addTreatmentModalLabel">Yeni Tedavi Planı Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= isset($patientData->uniq_id) ? base_url("treatment/addForm/$patientData->uniq_id") : '#' ?>" id="add_treatment_form" class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="treatment_name" class="form-label">Tedavi Adı</label>
                        <input type="text" class="form-control" name="treatment_name" id="treatment_name"
                               placeholder="Tedavi Adı" value="<?= isset($treatmentData->treatment_name) ? $treatmentData->treatment_name : '' ?>">
                    </div>

                    <div class="col-6">
                        <div class="mb-6">
                            <label for="doctor_id" class="form-label">Doktor</label>
                            <select name="doctor_id" class="form-control select2" id="doctor_id">
                                <option value="0">--Diğer--</option>
                                <?php foreach ($doctorData as $item){ ?>
                                    <option value="<?=$item->uniq_id; ?>"><?=$item->name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="tooth_number" class="form-label">Diş Numarası</label>
                        <input type="text" class="form-control" name="tooth_number" id="tooth_number"
                               placeholder="Diş Numarası" value="<?= isset($treatmentData->tooth_number) ? $treatmentData->tooth_number : '' ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="treatment_price" class="form-label">Tedavi Ücreti</label>
                        <input type="number" class="form-control" name="treatment_price" id="treatment_price"
                               placeholder="Tedavi Ücreti" value="<?= isset($treatmentData->treatment_price) ? $treatmentData->treatment_price : '' ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="payment_status" class="form-label">Tedavinin Ödenme Durumu</label>
                        <select name="payment_status" id="payment_status" class="form-control">
                            <option value="" <?= (isset($treatmentData->payment_status) && $treatmentData->payment_status == '') ? 'selected' : '' ?>>Seçiniz</option>
                            <option value="0" <?= (isset($treatmentData->payment_status) && $treatmentData->payment_status == 0) ? 'selected' : '' ?>>Ödenmedi</option>
                            <option value="1" <?= (isset($treatmentData->payment_status) && $treatmentData->payment_status == 1) ? 'selected' : '' ?>>Ödendi</option>
                        </select>
                    </div>


                    <div class="col-md-6">
                        <label for="treatment_date" class="form-label">Tedavinin Uygulandığı Tarih</label>
                        <input type="date" class="form-control" name="treatment_date" id="treatment_date"
                               placeholder="Tedavinin Uygulandığı Tarih" value="<?= isset($treatmentData->treatment_date) ? $treatmentData->treatment_date : '' ?>">
                    </div>

                    <div class="col-md-12">
                        <label for="note" class="form-label">Tedavi Notu</label>
                        <textarea class="form-control" name="note" id="note" rows="3" placeholder="Tedavi Notu"><?= isset($treatmentData->note) ? $treatmentData->note : '' ?></textarea>
                    </div>

                    <div class="col-12 text-end mt-3">
                        <button id="add_treatment_form" type="submit" class="btn btn-success">Tedaviyi Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>