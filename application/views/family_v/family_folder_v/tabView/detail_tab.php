<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 14.06.2025
 * Time: 20:26
 */
?>
<?php $adminUser = $this->session->userdata('users_info'); ?>
<div class="tab-pane active" id="detailtab" role="tabpanel">
    <div class="row">
       <!-- --><?php /*$this->load->view("{$viewFolder}/{$subViewFolder}/tabview/leftbar"); */?>
        <div class="col-md-12">

            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header border">
                            <div class="d-flex align-items-center justify-content-between">
                                <h5 class="card-title mb-0">Aileye Bağlı Hasta Listesi</h5>
                            </div>
                        </div>

                        <div class="card-body table-responsive">
                            <h5 class="card-title mb-3">Aileye Bağlı Hasta Listesi</h5>
                            <table class="table table-bordered border-secondary table-nowrap">
                                <thead>
                                <tr>
                                    <th scope="col">Hasta No</th>
                                    <th scope="col">Hasta Adı</th>
                                    <th scope="col">Tc No</th>
                                    <th scope="col">Yaşı</th>
                                    <th scope="col">Cinsiyeti</th>
                                    <th scope="col">Telefon Numarası</th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php if (!empty($patientData)) : ?>
                                    <?php foreach ($patientData as $item) : ?>
                                        <?php
                                        if (!empty($item->birth_date) && $item->birth_date !== '0000-00-00') {
                                            $birthDate = new DateTime($item->birth_date);
                                            $today = new DateTime();
                                            $age = $today->diff($birthDate)->y;
                                        } else {
                                            $age = 'Bilinmiyor';
                                        }

                                        if ($item->gender === '1' || $item->gender === 1) {
                                            $genderText = 'Kadın';
                                        } elseif ($item->gender === '0' || $item->gender === 0) {
                                            $genderText = 'Erkek';
                                        } else {
                                            $genderText = 'Bilinmiyor';
                                        }

                                        $phone = (!empty($item->phone)) ? $item->phone : 'Bilinmiyor';
                                        ?>
                                        <tr>
                                            <th scope="row">
                                                <a href="<?= base_url("patient/folder/$item->uniq_id") ?>">
                                                    <?= $item->uniq_id ?>
                                                </a>
                                            </th>
                                            <td><?= htmlspecialchars($item->name . ' ' . $item->surname); ?></td>
                                            <td><?= !empty($item->identity_no) ? htmlspecialchars($item->identity_no) : 'Bilinmiyor'; ?></td>
                                            <td><?= $age; ?></td>
                                            <td><?= $genderText; ?></td>
                                            <td><?= htmlspecialchars($phone); ?></td>
                                        </tr>
                                    <?php endforeach; ?>
                                <?php else : ?>
                                    <tr><td colspan="6">Bu aileye ait hasta bulunamadı.</td></tr>
                                <?php endif; ?>
                                </tbody>
                            </table>
                        </div>

                    </div><!-- end card -->
                </div><!-- end col -->
            </div><!-- end row -->
        </div>

    </div>
</div>
