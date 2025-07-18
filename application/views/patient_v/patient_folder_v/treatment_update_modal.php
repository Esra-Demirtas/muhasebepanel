<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 23.06.2025
 * Time: 21:23
 */
?>
<div class="modal fade" id="updateTreatmentModal" tabindex="-1" aria-labelledby="updateTreatmentModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTreatmentModalLabel">Tedavi Planını Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateTreatmentForm" action="<?php echo base_url("treatment/updateForm") ?>" class="row g-3" method="post" enctype="multipart/form-data">

                    <div class="col-md-6">
                        <label for="treatment_treatment_name-update" class="form-label">Tedavi Adı</label>
                        <input type="text" class="form-control" name="treatment_name" id="treatment_treatment_name-update" placeholder="Tedavi Adı">
                    </div>

                    <div class="col-md-6">
                        <label for="treatment_doctor_id-update" class="form-label">Doktor</label>
                        <select class="form-select" name="doctor_id" id="treatment_doctor_id-update">
                            <option value="">Seçiniz</option>
                            <?php
                            if (!empty($doctorData)) {
                                foreach ($doctorData as $item) {
                                    echo '<option value="' . $item->uniq_id . '">' . htmlspecialchars($item->name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="treatment_tooth_number-update" class="form-label">Diş Numarası</label>
                        <input type="text" class="form-control" name="tooth_number" id="treatment_tooth_number-update" placeholder="Diş Numarası">
                    </div>

                    <div class="col-md-6">
                        <label for="treatment_treatment_price-update" class="form-label">Tedavi Ücreti</label>
                        <input type="number" step="0.01" min="0" class="form-control" name="treatment_price" id="treatment_treatment_price-update" placeholder="Tedavi Ücreti">
                    </div>

                    <div class="col-md-6">
                        <label for="treatment_payment_status-update" class="form-label">Ödeme Durumu</label>
                        <select class="form-select" name="payment_status" id="treatment_payment_status-update">
                            <option value="">Seçiniz</option>
                            <option value="1">Ödendi</option>
                            <option value="0">Ödenmedi</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="treatment_treatment_date-update" class="form-label">Tedavi Tarihi</label>
                        <input type="date" class="form-control" name="treatment_date" id="treatment_treatment_date-update">
                    </div>

                    <div class="col-md-12">
                        <label for="treatment_note-update" class="form-label">Tedavi Notu</label>
                        <textarea class="form-control" name="note" id="treatment_note-update" rows="3" placeholder="Tedavi hakkında açıklama"></textarea>
                    </div>

                    <input type="hidden" name="uniq_id" id="treatment_uniq_id-update">

                    <div class="col-12 text-end mt-3">
                        <button id="submitUpdateTreatmentForm" type="submit" class="btn btn-success">Tedaviyi Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>