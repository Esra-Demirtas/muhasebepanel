<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 23.06.2025
 * Time: 15:55
 */
?>
<div class="tab-pane fade" id="incometab" role="tabpanel">
    <div class="card">

        <div class="card-header">
            <h5 class="card-title mb-0">Ödeme Geçmişi</h5>
            <button class="btn btn-soft-success float-end" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addIncomeModal">
                <i class="ri-add-circle-line me-1"></i> Yeni Ödeme Ekle
            </button>
        </div>

        <div class="card-body">
            <div class="table-responsive">
                <table id="incomeTable" class="table table-striped">
                    <thead class="table-light">
                    <tr>
                        <th>Ödeme No</th>
                        <th>Tedavi Adı</th>
                        <th>Ödenen Ücret</th>
                        <th>Ödeme Türü</th>
                        <th>Ödeme Tarihi</th>
                        <th>Ödeme Notu</th>
                        <th>İşlem</th>
                    </tr>
                    </thead>
                    <tbody id="incomeRenderTableBody">
                    <?php $this->load->view("{$viewFolder}/{$subViewFolder}/render_page_v/income_list_render"); ?>
                    </tbody>
                </table>
            </div>
        </div>
        <!--end card-body-->
    </div>
    <!--end card-->
</div>