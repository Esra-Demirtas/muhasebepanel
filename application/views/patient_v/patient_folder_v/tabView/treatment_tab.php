<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 16.06.2025
 * Time: 22:35
 */
?>
<div class="tab-pane fade" id="treatmenttab" role="tabpanel">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Tedavi Planı</h5>
            <button class="btn btn-soft-success float-end" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addTreatmentModal">
                <i class="ri-add-circle-line me-1"></i> Yeni Tedavi Planı Ekle
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="treatmentTable" class="table table-striped">
                    <thead class="table-light">
                    <tr>
                        <th>Tedavi No</th>
                        <th>Tedavi Adı</th>
                        <th>Doktor</th>
                        <th>Diş Numarası</th>
                        <th>Tedavi Ücreti</th>
                        <th>Tedavinin Ödeme Durumu</th>
                        <th>Tedavinin Uygulandığı Tarih</th>
                        <th>Tedavi Notu</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody id="treatmentRenderTableBody">
                    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_page_v/treatment_list_render"); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>
