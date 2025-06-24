<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 31.05.2025
 * Time: 00:09
 */
?>
<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Hasta Listesi</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?=base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Hasta Listesi</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Başlık ve Breadcrumb Bölümü -->

            <!-- Ana İçerik Kartı (Hasta Listesi) -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">Hasta Listesi</h5>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="<?=base_url("patient/add") ?>" type="button"
                                           class="btn btn-primary add-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>Yeni Hasta Ekle
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <!-- "Hasta Sayfası Yönetimi!" ve açıklamayı buraya taşıdık -->
                            <p class="text-muted mb-0 mt-2">Hasta kayıtlarını ve dosyalarını buradan görüntüleyebilirsiniz.</p>
                        </div>

                        <div class="card-body border border-dashed border-end-0 border-start-0">
                            <div class="table-responsive">
                                <table class="table align-middle mb-0 border" id="dataTable">
                                    <thead class="table-light">
                                    <tr>
                                        <th scope="col">#Benzersiz ID</th>
                                        <th scope="col">Hasta Adı</th>
                                        <th scope="col">TC No</th>
                                        <th scope="col">Hastanın Bağlı Olduğu Aile</th>
                                        <th scope="col">Cinsiyet</th>
                                        <th scope="col">Doğum Tarihi</th>
                                        <th scope="col">Telefon Numarası</th>
                                        <th scope="col">Dosyası</th>
                                        <th scope="col">İşlemler</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($patientsData as $item){ ?>
                                        <tr>
                                            <td><?=$item->uniq_id ?></td>
                                            <td><?=$item->name . ' ' . $item->surname; ?></td>
                                            <td><?=$item->identity_no ?></td>
                                            <td>
                                                <?php
                                                $familyName = 'Bilinmiyor';
                                                if (!empty($familyData) && isset($item->family_id)) {
                                                    foreach ($familyData as $data) {
                                                        if ($data->uniq_id == $item->family_id) {
                                                            $familyName = $data->family_name;
                                                            break;
                                                        }
                                                    }
                                                }
                                                echo $familyName;
                                                ?>
                                            </td>
                                            <td>
                                                <?= isset($item->gender) ? ($item->gender == 1 ? 'Kadın' : 'Erkek') : 'Bilinmiyor' ?>
                                            </td>
                                            <td><?= date('d-m-Y', strtotime($item->birth_date)) ?></td>
                                            <td><?=$item->phone ?></td>
                                            <td>
                                                <a href="<?=base_url("patient/folder/$item->uniq_id") ?>" class="btn btn-sm btn-primary btn-label rounded-pill"><i class="ri-folder-2-fill label-icon align-middle rounded-pill fs-16 me-2"></i>Dosyası</a>
                                            </td>
                                            <td>
                                                <div class="dropdown d-inline-block">
                                                    <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="ri-more-fill align-middle"></i>
                                                    </button>
                                                    <ul class="dropdown-menu dropdown-menu-end" style="">
                                                        <li><a href="<?=base_url("patient/update/$item->uniq_id") ?>" class="dropdown-item edit-item-btn"><i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                                                        <li class="text-danger">
                                                            <button data-deleteurl="<?= base_url("patient/delete/$item->uniq_id") ?>"
                                                                    class="dropdown-item remove-item-btn deletebtn">
                                                                <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil
                                                            </button>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                    <?php if (empty($patientsData)) : ?>
                                        <tr><td colspan="9" class="text-center">Kayıtlı hasta bulunamadı.</td></tr>
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
