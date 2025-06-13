<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 17:18
 */
?>
<div class="row mb-4">
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

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title mb-0">Aile Yönetim Sayfası!</h5>
                <a href="<?= base_url("family/add") ?>" class="btn btn-soft-success float-end">
                    <i class="ri-add-circle-line me-1"></i> Yeni Aile Ekle
                </a>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">Benzersiz ID</th>
                            <th>Aile Adı</th>
                            <th>Ailenin Bağlı Olduğu Kişi</th>
                            <th>Toplam Hasta Sayısı</th>
                            <th>İşlemler</th>
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

                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
