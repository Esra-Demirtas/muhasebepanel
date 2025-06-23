<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 18:40
 */
?>
<div class="row">
    <div class="col-12">
        <div class="page-title-box d-sm-flex align-items-center justify-content-between">
            <h4 class="mb-sm-0">Doktor Yönetim Sayfası</h4>
            <div class="page-title-right">
                <ol class="breadcrumb m-0">
                    <li class="breadcrumb-item"><a href="<?= base_url(); ?>">Anasayfa</a></li>
                    <li class="breadcrumb-item active">Doktor Listesi</li>
                </ol>
            </div>
        </div>
    </div>
</div>

<div class="row mb-3 pb-1">
    <div class="col-12">
        <div class="d-flex align-items-lg-center flex-lg-row flex-column">
            <div class="flex-grow-1">
                <h4 class="fs-16 mb-1">Doktor Sayfası Yönetimi!</h4>
                <p class="text-muted mb-0">Doktor kayıtlarını ve dosyalarını buradan görüntüleyebilirsiniz. </p>
            </div>
            <div class="mt-3 mt-lg-0">
                <form action="javascript:void(0);">
                    <div class="row g-3 mb-0 align-items-center">
                        <!--end col-->
                        <div class="col-auto">
                            <a href="<?=base_url("doctor/add") ?>" type="button"
                               class="btn btn-soft-success"><i class="ri-add-circle-line align-middle me-1"></i>Yeni Doktor Ekle</a>
                        </div>

                    </div>
                    <!--end row-->
                </form>
            </div>
        </div><!-- end card header -->
    </div>
    <!--end col-->
</div>

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header border-0">
                <div class="d-flex align-items-center">
                    <h5 class="card-title mb-0 flex-grow-1">Doktor Listesi</h5>
                </div>
            </div>

            <div class="card-body">
                <div class="table-responsive">
                    <table id="dataTable" class="table table-striped">
                        <thead class="table-light">
                        <tr>
                            <th scope="col">ID</th>
                            <th>Adı</th>
                            <th>Soyadı</th>
                            <th>Uzmanlık Alanı</th>
                            <th>Sabit Maaş</th>
                            <th>Hakediş Oranı (%)</th>
                            <th>Aktif mi?</th>
                            <th>İşlemler</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php if (!empty($doctorData)) : ?>
                            <?php foreach ($doctorData as $item) : ?>
                                <tr>
                                    <td><?= $item->uniq_id ?></td>
                                    <td><?= $item->name ?></td>
                                    <td><?= $item->surname ?></td>
                                    <td><?= $item->branch ?></td>
                                    <td><?= number_format($item->fixed_salary, 2) ?> ₺</td>
                                    <td><?= $item->commission_rate ?>%</td>
                                    <td class="text-success">
                                        <div class="form-check form-switch form-switch-success">
                                            <input class="form-check-input isActivityBtn"
                                                   data-activitypost="<?= base_url("doctor/activitySet/$item->uniq_id/$item->isActivity") ?>"
                                                   type="checkbox" role="switch" id="SwitchCheck<?= $item->uniq_id ?>"
                                                <?= ($item->isActivity == "1") ? 'checked' : '' ?>>
                                        </div>
                                    </td>
                                    <td>
                                        <a href="<?= base_url("doctor/update/$item->uniq_id") ?>" class="btn btn-sm btn-primary">
                                            <i class="ri-pencil-fill"></i>
                                        </a>
                                        <button data-deleteurl="<?= base_url("doctor/delete/$item->uniq_id") ?>" class="btn btn-sm btn-danger deletebtn">
                                            <i class="ri-delete-bin-fill"></i>
                                        </button>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else : ?>
                            <tr><td colspan="10" class="text-center">Kayıtlı doktor bulunamadı.</td></tr>
                        <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>