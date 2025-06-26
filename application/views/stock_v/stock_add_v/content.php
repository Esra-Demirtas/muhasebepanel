<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 25.06.2025
 * Time: 21:28
 */
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Yeni Stok Ekleme Formu</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item"><a href="<?= base_url("stock"); ?>">Stok Yönetim Sayfası</a></li>
                                <li class="breadcrumb-item active">Yeni Stok Ekleme Formu</li>
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
                                                    <h4 class="fw-bold fs-16 mb-1">Yeni Stok Ekleme Formu</h4>
                                                    <p class="text-muted mb-0">Stok kayıtlarını buradan görüntüleyebilirsiniz. </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="<?= base_url("stock/addForm") ?>" class="row g-3" method="post">
                                <div class="col-md-6">
                                    <label for="barcode" class="form-label">Barkod Numarası <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="barcode" id="barcode" value="<?= isset($item) ? $item->barcode : '' ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="item_name" class="form-label">Ürün Adı <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" name="item_name" id="item_name" value="<?= isset($item) ? $item->item_name : '' ?>" required>
                                </div>

                                <div class="col-md-6">
                                    <label for="stock_parent_category_id" class="form-label">Kategori</label>
                                    <select id="stock_parent_category_id" name="stock_parent_category_id" class="form-select select2">
                                        <option value="" disabled selected>Seçiniz</option>
                                        <?php foreach ($categoryData as $item) { ?>
                                            <option value="<?= $item->uniq_id; ?>" <?= isset($stockData->stock_parent_category) && $stockData->stock_parent_category == $item->uniq_id ? 'selected' : ''; ?>><?= $item->category_name; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>

                                <div class="col-md-6">
                                    <label for="stock_sub_category_id" class="form-label">Alt Kategori</label>
                                    <select name="stock_sub_category_id" class="form-select select2" id="stock_sub_category_id">
                                        <option value="0" selected>--Diğer--</option>
                                    </select>
                                </div>

                                <div class="col-md-4">
                                    <label for="unit" class="form-label">Ürün Birimi</label>
                                    <select name="unit" id="unit" class="form-control">
                                        <option value="">Seçiniz</option>
                                        <option value="1" <?= ($item->unit ?? '') == 1 ? 'selected' : '' ?>>Adet</option>
                                        <option value="2" <?= ($item->unit ?? '') == 2 ? 'selected' : '' ?>>Kutu</option>
                                        <option value="3" <?= ($item->unit ?? '') == 3 ? 'selected' : '' ?>>Mililitre (ml)</option>
                                        <option value="4" <?= ($item->unit ?? '') == 4 ? 'selected' : '' ?>>Gram (gr)</option>
                                        <option value="5" <?= ($item->unit ?? '') == 5 ? 'selected' : '' ?>>Şişe</option>
                                        <option value="6" <?= ($item->unit ?? '') == 6 ? 'selected' : '' ?>>Rulo</option>
                                        <option value="7" <?= ($item->unit ?? '') == 7 ? 'selected' : '' ?>>Paket</option>
                                        <option value="8" <?= ($item->unit ?? '') == 8 ? 'selected' : '' ?>>CC</option>
                                        <option value="9" <?= ($item->unit ?? '') == 9 ? 'selected' : '' ?>>Set</option>
                                        <option value="10" <?= ($item->unit ?? '') == 10 ? 'selected' : '' ?>>Ampul</option>
                                    </select>
                                </div>


                                <div class="col-md-4">
                                    <label for="stock_quantity" class="form-label">Stok Miktarı</label>
                                    <input type="number" class="form-control" name="stock_quantity" id="stock_quantity" value="<?= isset($item->stock_quantity) ? $item->stock_quantity : '' ?>"
                                           min="0">
                                </div>

                                <div class="col-md-4">
                                    <label for="critical_level" class="form-label">Kritik Stok Seviyesi</label>
                                    <input type="number" class="form-control" name="critical_level" id="critical_level" value="<?= isset($item->critical_level) ? $item->critical_level : '' ?>"
                                           min="0">
                                </div>

                                <div class="col-12 text-end mt-3">
                                    <button type="submit" class="btn btn-success">Kaydet</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>