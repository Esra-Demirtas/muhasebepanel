<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 26.06.2025
 * Time: 17:40
 */
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Stok Kategori Listesi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?=base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Stok Kategori Listesi</li>
                            </ol>
                        </div>

                    </div>
                </div>
            </div>
            <!-- End Başlık ve Breadcrumb Bölümü -->

            <!-- Ana İçerik Kartı (Kategori Listesi) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">Kategori Listesi</h5>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="<?=base_url("stockCategory/newCategory") ?>" class="btn btn-primary add-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>Yeni Kategori Ekle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" id="productTable">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">#Kategori No</th>
                                        <th scope="col">Kategori Adı</th>
                                        <th scope="col">Kategori Ekle</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($categorysData)) : ?>
                                        <?php foreach ($categorysData as $item){ ?>
                                            <tr>
                                                <td><?=$item->uniq_id ?></td>
                                                <td><?=$item->category_name; ?></td>
                                                <td>
                                                    <a href="<?=base_url("stockCategory/subCategory/$item->uniq_id") ?>"  class="btn btn-sm btn-success btn-label waves-effect waves-light"><i class="ri-add-box-fill label-icon align-middle fs-16 me-2"></i> Alt Kategori Ekle</a>
                                                </td>

                                                <td class="position-static">
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink_<?=$item->uniq_id?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink_<?=$item->uniq_id?>">
                                                            <li><a href="<?= base_url("stockCategory/subCategory/$item->uniq_id") ?>" class="dropdown-item">
                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Alt Kategorilerini Görüntüle
                                                                </a>
                                                            </li>
                                                            <li><a href="<?php echo base_url("stockCategory/categoryUpdate/$item->uniq_id")?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                            <li>
                                                                <button data-deleteurl="<?=base_url("stockCategory/stockDeleteCategorys/$item->uniq_id") ?>" class="dropdown-item remove-item-btn deletebtn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                               <!-- <td>
                                                    <div class="dropdown d-inline-block">
                                                        <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-fill align-middle"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end" style="">
                                                            <li><a href="<?php /*= base_url("stockCategory/subCategory/$item->uniq_id") */?>" class="dropdown-item">
                                                                    <i class="ri-eye-fill align-bottom me-2 text-muted"></i> Alt Kategorilerini Görüntüle
                                                                </a>
                                                            </li>
                                                            <li><a href="<?php /*echo base_url("stockCategory/categoryUpdate/$item->uniq_id")*/?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                            <li>
                                                                <button data-deleteurl="<?php /*=base_url("stockCategory/stockDeleteCategorys/$item->uniq_id") */?>" class="dropdown-item remove-item-btn deletebtn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>-->
                                            </tr>
                                        <?php } ?>
                                    <?php else : ?>
                                        <tr>
                                            <td colspan="4" class="text-center text-muted">Kayıt bulunamadı.</td>
                                        </tr>
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
