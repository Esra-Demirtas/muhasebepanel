<?php
/**
 * Created by Ahmet ERCAN.
 * Date: 26.11.2023
 * Time: 14:44
 */
?>

<!-- Update Modal -->
<div class="modal fade" id="updateIncomeModal" tabindex="-1" aria-labelledby="updateIncomeModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateIncomeModalLabel">Ödeme Kaydını Güncelle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="updateIncomeForm" action="<?php echo base_url("income/updateForm")?>" class="row g-3" method="post" enctype="multipart/form-data">
                    <div class="col-md-6">
                        <label for="treatment_id-update" class="form-label">Uygulanan Tedavi</label>
                        <select class="form-select" name="treatment_id" id="treatment_id-update">
                            <option value="">Seçiniz</option>
                            <?php
                            if (!empty($treatmentData)) {
                                foreach ($treatmentData as $item) {
                                    echo '<option value="' . $item->uniq_id . '">' . htmlspecialchars($item->treatment_name) . '</option>';
                                }
                            }
                            ?>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="amount-update" class="form-label">Ödenen Ücret</label>
                        <input type="number" step="0.01" min="0" class="form-control" name="amount" id="amount-update" placeholder="Ödenen Ücret">
                    </div>

                    <div class="col-md-6">
                        <label for="payment_type-update" class="form-label">Ödeme Türü</label>
                        <select class="form-select" name="payment_type" id="payment_type-update">
                            <option value="">Seçiniz</option>
                            <option value="2">Nakit</option>
                            <option value="1">Kredi Kartı</option>
                            <option value="0">Havale</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="payment_date-update" class="form-label">Ödemenin Alındığı Tarihi</label>
                        <input type="date" class="form-control" name="payment_date" id="payment_date-update">
                    </div>

                    <div class="col-md-12">
                        <label for="description-update" class="form-label">Ödeme Notu</label>
                        <textarea class="form-control" name="description" id="description-update" rows="3" placeholder="Ödeme Notu"></textarea>
                    </div>

                    <input type="hidden" name="uniq_id" id="uniq_id-update">

                    <div class="col-12 text-end mt-3">
                        <button id="updateIncomeForm" type="submit" class="btn btn-success">Ödeme Kaydını Güncelle</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

