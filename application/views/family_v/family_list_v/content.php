<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 17:18
 */
?>

<div class="main-content">
    <div class="page-content">
        <div class="container-fluid">
            <!-- Başlık ve Breadcrumb Bölümü -->
            <div class="row">
                <div class="col-12">
                    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
                        <h4 class="mb-sm-0">Hasta - Aile Yönetim Sayfası!</h4>
                        <div class="page-title-right">
                            <ol class="breadcrumb m-0">
                                <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                                <li class="breadcrumb-item active">Aile Yönetim Sayfası!</li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Başlık ve Breadcrumb Bölümü -->

            <!-- Ana İçerik Kartı -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border-0">
                            <div class="d-flex align-items-center">
                                <h5 class="card-title mb-0 flex-grow-1">Aile Listesi</h5>
                                <div class="flex-shrink-0">
                                    <div class="d-flex flex-wrap gap-2">
                                        <a href="<?= base_url("family/add") ?>" class="btn btn-primary add-btn">
                                            <i class="ri-add-line align-bottom me-1"></i>Yeni Aile Ekle
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <table id="dataTable" class="table table-hover table-striped align-middle table-nowrap mb-0">
                                <thead>
                                <tr>
                                    <th scope="col">Benzersiz ID</th>
                                    <th scope="col">Aile Adı</th>
                                    <th scope="col">Ailenin Bağlı Olduğu Kişi</th>
                                    <th scope="col">Toplam Hasta Sayısı</th>
                                    <th scope="col">Dosyası</th>
                                    <th scope="col">İşlemler</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($familyData)) : ?>
                                    <?php foreach ($familyData as $item) : ?>
                                        <tr>
                                            <td><?= $item->uniq_id ?></td>
                                            <td><?= $item->family_name ?></td>
                                            <td>
                                                <?php
                                                $patient = null;
                                                if (isset($patientData) && !empty($patientData)) {
                                                    foreach ($patientData as $data) {
                                                        if (isset($item->main_contact_id) && $data->uniq_id == $item->main_contact_id) {
                                                            $patient = $data;
                                                            break;
                                                        }
                                                    }
                                                }
                                                echo $patient ? $patient->name . ' ' . $patient->surname : 'Bilinmiyor';
                                                ?>
                                            </td>
                                            <td>
                                                <?php
                                                $patientCount = 0;
                                                if (isset($patientData) && !empty($patientData)) {
                                                    foreach ($patientData as $data) {
                                                        if (isset($data->family_id) && $data->family_id == $item->uniq_id) {
                                                            $patientCount++;
                                                        }
                                                    }
                                                }
                                                echo $patientCount;
                                                ?>
                                            </td>

                                            <td>
                                                <a href="<?=base_url("family/folder/$item->uniq_id") ?>" class="btn btn-sm btn-primary btn-label rounded-pill"><i class="ri-folder-2-fill label-icon align-middle rounded-pill fs-16 me-2"></i>Dosyası</a>
                                            </td>

                                            <td>
                                                <a href="<?= base_url("family/update/$item->uniq_id") ?>" class="btn btn-sm btn-primary">
                                                    <i class="ri-pencil-fill"></i>
                                                </a>
                                                <button data-deleteurl="<?= base_url("family/delete/$item->uniq_id") ?>" class="btn btn-sm btn-danger deletebtn">
                                                    <i class="ri-delete-bin-fill"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr>
                                        <td colspan="6" class="text-center text-muted">Kayıt bulunamadı.</td>
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
