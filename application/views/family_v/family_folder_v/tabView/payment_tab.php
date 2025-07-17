<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 17.07.2025
 * Time: 11:50
 */
?>
<div class="tab-pane fade" id="paymenttab" role="tabpanel">
    <div class="row">
        <?php /*$this->load->view("{$viewFolder}/{$subViewFolder}/tabview/leftbar"); */?>
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Hastaların Tedavi Listesi</h5>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo base_url("family/debitForm/$familyData->uniq_id") ?>"
                                       class="btn btn-success btn-label waves-effect waves-light">
                                        <i class="ri-printer-line label-icon align-middle fs-16 me-2"></i>
                                        Aileye Bağlı Hasta Tedavi Formu Oluştur
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body table-responsive">
                            <h5 class="card-title mb-3">Hastaların Tedavi Listesi</h5>
                            <table class="table table-bordered border-secondary table-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">Hasta No</th>
                                    <th scope="col">Hasta Adı</th>
                                    <th scope="col">Tc No</th>
                                    <th scope="col">Uygulanan Tedavi</th>
                                    <th scope="col">Tedavi Ücreti</th>
                                    <th scope="col">Ödenme Durumu</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($treatmentData)) : ?>
                                    <?php foreach ($treatmentData as $item) : ?>
                                        <?php
                                        $patient = isset($indexedPatientData[$item->patient_id]) ? $indexedPatientData[$item->patient_id] : null;

                                        $treatmentName = isset($item->treatment_name) ? $item->treatment_name : 'Bilgi Girilmedi';
                                        $treatmentPrice = isset($item->treatment_price) ? $item->treatment_price : 'Bilgi Girilmedi';
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url("patient/folder/" . ($patient ? $patient->uniq_id : $item->patient_id)) ?>">
                                                    <?= $item->patient_id ?>
                                                </a>
                                            </th>
                                            <td><?= $patient ? ($patient->name . ' ' . $patient->surname) : 'Bilgi Yok'; ?></td>
                                            <td><?= $patient ? $patient->identity_no : 'Bilgi Yok'; ?></td>
                                            <td><?= $treatmentName; ?></td>
                                            <td><?= $treatmentPrice; ?></td>
                                            <td>
                                                <?php
                                                if (isset($item->payment_status)) {
                                                    if ($item->payment_status === '1') {
                                                        echo 'Ödendi';
                                                    } elseif ($item->payment_status === '0') {
                                                        echo 'Ödenmedi';
                                                    } else {
                                                        echo 'Bilgi Girilmedi';
                                                    }
                                                } else {
                                                    echo 'Bilgi Girilmedi';
                                                }
                                                ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td colspan="6">Bu aileye ait hasta tedavisi bulunamadı.</td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>

        </div>
    </div>
</div>