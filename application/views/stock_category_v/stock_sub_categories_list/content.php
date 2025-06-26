<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 26.06.2025
 * Time: 18:19
 */
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Stok Alt Kategori Listesi</h4>

                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?=base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Stok Alt Kategori Listesi</li>
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
                                                    <h4 class="fw-bold fs-16 mb-1"><?=$parentData->category_name; ?> - Kategorisi Stok Başlıkları Listesi</h4>
                                                    <p class="text-muted mb-0">Bu kategoriye ait alt kategorileri buradan görüntüleyebilir ve yönetebilirsiniz.</p>
                                                </div>
                                            </div>
                                            <div class="col-md-auto">
                                                <a href="<?=base_url("stockCategory/newSubCategory/$parentData->uniq_id") ?>" class="btn btn-primary add-btn">
                                                    <i class="ri-add-line align-bottom me-1"></i>Yeni Alt Kategori Ekle
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0" id="productTable">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">Alt Kategori No</th>
                                        <th scope="col">Ana Kategori Adı</th>
                                        <th scope="col">Kategori Adı</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php if (!empty($subCategoryData)) : ?>
                                        <?php foreach ($subCategoryData as $item){ ?>
                                            <tr>
                                                <td><?=$item->uniq_id ?></td>
                                                <td><?=$parentData->category_name; ?></td>
                                                <td><?=$item->category_name; ?></td>

                                                <td class="position-static">
                                                    <div class="dropdown">
                                                        <a href="#" role="button" id="dropdownMenuLink_<?=$item->uniq_id?>" data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="ri-more-2-fill"></i>
                                                        </a>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink_<?=$item->uniq_id?>">
                                                            <li><a href="<?php echo base_url("stockCategory/subCategoryUpdate/$item->uniq_id")?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                            <li>
                                                                <button data-delteurl="<?=base_url("stockCategory/stockDeleteSubCategory/$item->uniq_id/$item->parent_id") ?>" class="dropdown-item remove-item-btn deletebtn"><i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil</button>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
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
