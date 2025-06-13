<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 13:00
 */
?>
<?php $adminUser = $this->session->userdata('users_info'); ?>
<div class="tab-pane active" id="generaltab" role="tabpanel">
    <div class="row">
        <?php $this->load->view("{$viewFolder}/{$subViewFolder}/tabview/leftbar"); ?>
        <div class="col-xxl-9">

            <div class="row">
                <div class="col-lg-12">
                    <div class="card">
                        <div class="card-header border">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Hasta Borç Listesi</h5>
                                <div class="d-flex gap-2">
                                    <a href="<?php echo base_url("patient/debitForm/$patientData->uniq_id") ?>"
                                       class="btn btn-success btn-label waves-effect waves-light">
                                        <i class="ri-printer-line label-icon align-middle fs-16 me-2"></i>
                                        Hasta Formu Oluştur
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="tab-content text-muted">
                                <div class="tab-pane active" id="today" role="tabpanel">

                                </div>
                            </div>
                        </div><!-- end card body -->

                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>

    </div>
</div>
