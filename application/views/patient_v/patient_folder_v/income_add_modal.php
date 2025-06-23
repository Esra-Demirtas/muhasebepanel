<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 23.06.2025
 * Time: 15:50
 */
?>
<div class="modal fade" id="addIncomeModal" tabindex="-1" aria-labelledby="addIncomeModalLabel">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addIncomeModalLabel">Yeni Ödeme Ekle</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= isset($patientData->uniq_id) ? base_url("income/addForm/$patientData->uniq_id") : '#' ?>" id="add_income_form" class="row g-3" method="post" enctype="multipart/form-data">

                    <div class="col-6">
                        <div class="mb-6">
                            <label for="treatment_id" class="form-label">Uygulanan Tedavi</label>
                            <select name="treatment_id" class="form-control select2" id="treatment_id">
                                <option value="0">--Diğer--</option>
                                <?php foreach ($treatmentData as $item){ ?>
                                    <option value="<?=$item->uniq_id; ?>"><?=$item->treatment_name; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <label for="amount" class="form-label">Ödenen Ücret</label>
                        <input type="number" class="form-control" name="amount" id="amount"
                               placeholder="Ödenen Ücret" value="<?= isset($incomeData->amount) ? $incomeData->amount : '' ?>">
                    </div>

                    <div class="col-md-6">
                        <label for="payment_type" class="form-label">Ödeme Türü</label>
                        <select name="payment_type" id="payment_type" class="form-control">
                            <option value="" <?= (isset($incomeData->payment_type) && $incomeData->payment_type == '') ? 'selected' : '' ?>>Seçiniz</option>
                            <option value="2" <?= (isset($incomeData->payment_type) && $incomeData->payment_type == 2) ? 'selected' : '' ?>>Nakit</option>
                            <option value="1" <?= (isset($incomeData->payment_type) && $incomeData->payment_type == 1) ? 'selected' : '' ?>>Kredi Kartı</option>
                            <option value="0" <?= (isset($incomeData->payment_type) && $incomeData->payment_type == 0) ? 'selected' : '' ?>>Havale</option>
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="payment_date" class="form-label">Ödemenin Alındığı Tarih</label>
                        <input type="date" class="form-control" name="payment_date" id="payment_date"
                               placeholder="Ödemenin Alındığı Tarih" value="<?= isset($incomeData->payment_date) ? $incomeData->payment_date : '' ?>">
                    </div>

                    <div class="col-md-12">
                        <label for="description" class="form-label">Ödeme Notu</label>
                        <textarea class="form-control" name="description" id="description" rows="3" placeholder="Tedavi Notu"><?= isset($incomeData->description) ? $incomeData->description : '' ?></textarea>
                    </div>

                    <div class="col-12 text-end mt-3">
                        <button id="add_income_form" type="submit" class="btn btn-success">Ödemeyi Kaydet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>