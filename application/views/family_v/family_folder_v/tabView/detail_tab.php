<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 20:26
 */
?>
<?php $adminUser = $this->session->userdata('users_info'); ?>
<div class="tab-pane active" id="detailtab" role="tabpanel">
    <div class="row">
       <!-- --><?php /*$this->load->view("{$viewFolder}/{$subViewFolder}/tabview/leftbar"); */?>
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Aileye Bağlı Hasta Listesi</h5>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo base_url("family/debitForm/$familyData->uniq_id") ?>"
                                       class="btn btn-success btn-label waves-effect waves-light">
                                        <i class="ri-printer-line label-icon align-middle fs-16 me-2"></i>
                                        Aileye Bağlı Hasta Borç Formu Oluştur
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <h5 class="card-title mb-3">Aileye Bağlı Hasta Listesi</h5>
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
                                <?php if (!empty($patientData)) : ?>
                                    <?php foreach ($patientData as $item) : ?>
                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url("family/folder/$item->family_id") ?>">
                                                    <?= $item->uniq_id ?>
                                                </a>
                                            </th>
                                            <td><?= $item->name . ' ' . $item->surname; ?></td>
                                            <td><?= $item->identity_no; ?></td>
                                            <td><?= $item->treatment_name ?? 'Bilgi Girilmedi'; ?></td>
                                            <td><?= $item->treatment_price ?? 'Bilgi Girilmedi'; ?></td>
                                            <td><?= $item->payment_status ?? 'Bilgi Girilmedi'; ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td colspan="6">Bu aileye ait hasta bulunamadı.</td></tr>
                                <?php endif; ?>

                                </tbody>

                            </table>
                        </div>

                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>

    </div>
</div>
