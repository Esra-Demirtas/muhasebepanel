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
                        <h4 class="mb-sm-0">Stok Yönetim Sayfası</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Stok Listesi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Başlık ve Breadcrumb Bölümü -->

            <!-- Ana İçerik Kartı (Stok Listesi) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">Stok Listesi</h5>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="<?=base_url("stock/add") ?>" type="button"
                                           class="btn btn-primary add-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>Yeni Stok Ekle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="dataTable" class="table table-striped">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">ID</th>
                                        <th>Barkod Numarası</th>
                                        <th>Ürün Adı</th>
                                        <th>Kategori</th>
                                        <th>Alt Ktegori</th>
                                        <th>Stok Birimi</th>
                                        <th>Stok Miktarı</th>
                                        <th>Minimum Stok Miktarı</th>
                                        <th>İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($stockData)) : ?>
                                        <?php foreach ($stockData as $item) : ?>
                                            <tr>
                                                <td><?= $item->uniq_id ?></td>
                                                <td><?= $item->barcode ?></td>
                                                <td><?= $item->item_name ?></td>
                                                <td><?= $item->stock_parent_category_id ?></td>
                                                <td><?= $item->stock_sub_category_id ?></td>
                                                <td><?= $item->unit ?></td>
                                                <td><?= $item->stock_quantity ?></td>
                                                <td><?= $item->critical_level ?></td>
                                                <td>
                                                    <a href="<?= base_url("stock/update/$item->uniq_id") ?>" class="btn btn-sm btn-primary">
                                                        <i class="ri-pencil-fill"></i>
                                                    </a>
                                                    <button data-deleteurl="<?= base_url("stock/delete/$item->uniq_id") ?>" class="btn btn-sm btn-danger deletebtn">
                                                        <i class="ri-delete-bin-fill"></i>
                                                    </button>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <tr><td colspan="8" class="text-center">Kayıtlı stok bulunamadı.</td></tr>
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
</div>
