<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 16.06.2025
 * Time: 22:56
 */
?>
<?php if (!empty($assignedTreatment)) {
    foreach ($assignedTreatment as $key => $item) { ?>
        <tr>
            <td><?= !empty($item->uniq_id) ? $item->uniq_id : 'Belirtilmedi' ?></td>
            <td><?= !empty($item->treatment_name) ? $item->treatment_name : 'Belirtilmedi' ?></td>
            <td><?= !empty($item->doctor_id) ? getDoctorName($item->doctor_id) : 'Belirtilmedi' ?></td>
            <td>
                <?php
                // Tedavi Ücreti kontrolü
                if (isset($item->treatment_price) && is_numeric($item->treatment_price) && $item->treatment_price > 0) {
                    echo number_format($item->treatment_price, 2, ',', '.') . ' ₺';
                } else {
                    echo 'Belirtilmedi';
                }
                ?>
            </td>
            <td>
                <?php
                if ($item->payment_status === '1' || $item->payment_status === 1) {
                    echo 'Ödendi';
                } elseif ($item->payment_status === '0' || $item->payment_status === 0) {
                    echo 'Ödenmedi';
                } else {
                    echo 'Belirtilmedi';
                }
                ?>
            </td>

            <td>
                <?php
                // Tedavi Tarihi kontrolü
                $validDate = false;
                if (!empty($item->treatment_date)) {
                    $time = strtotime($item->treatment_date);
                    if ($time !== false && $time > 0 && $item->treatment_date != '0000-00-00') {
                        $validDate = true;
                    }
                }
                if ($validDate) {
                    echo date('d-m-Y', strtotime($item->treatment_date));
                } else {
                    echo 'Belirtilmedi';
                }
                ?>
            </td>
            <td><?= !empty($item->note) ? $item->note : 'Belirtilmedi' ?></td>

            <td>
                <button data-post-url="<?php echo base_url("treatment/getTreatmentsDetail/$item->uniq_id") ?>"
                        class="btn btn-sm btn-primary updateTreatment">
                    <i class="ri-pencil-fill"></i>
                </button>

                <button data-delteurl="<?= base_url("treatment/delete/$item->uniq_id") ?>" class="btn btn-sm btn-danger deletebtn">
                    <i class="ri-delete-bin-fill"></i>
                </button>
            </td>
        </tr>
    <?php }
} else { ?>
    <tr>
        <td colspan="10" class="text-center text-muted">Tedavi Planı Bulunamadı.</td>
    </tr>
<?php } ?>
