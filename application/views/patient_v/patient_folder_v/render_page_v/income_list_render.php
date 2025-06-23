<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 23.06.2025
 * Time: 15:56
 */
?>
<?php if (!empty($assignedIncome)) {
    foreach ($assignedIncome as $key => $item) { ?>
        <tr>
            <td><?= !empty($item->uniq_id) ? $item->uniq_id : 'Belirtilmedi' ?></td>
            <td><?= !empty($item->treatment_id) ? getTreatmentName($item->treatment_id) : 'Belirtilmedi' ?></td>
            <td>
                <?php
                if (isset($item->amount) && is_numeric($item->amount) && $item->amount > 0) {
                    echo number_format($item->amount, 2, ',', '.') . ' ₺';
                } else {
                    echo 'Belirtilmedi';
                }
                ?>
            </td>
            <td>
                <?php if (is_object($item) && isset($item->payment_type)) : ?>
                    <?php
                    if ($item->payment_type === '2' || $item->payment_type === 2) {
                        echo 'Nakit';
                    } elseif ($item->payment_type === '1' || $item->payment_type === 1) {
                        echo 'Kredi Kartı';
                    } elseif ($item->payment_type === '0' || $item->payment_type === 0) {
                        echo 'Havale';
                    } else {
                        echo 'Belirtilmedi';
                    }
                    ?>
                <?php else: ?>
                    Belirtilmedi
                <?php endif; ?>
            </td>

            <td>
                <?php
                // Tedavi Tarihi kontrolü
                $validDate = false;
                if (!empty($item->payment_date)) {
                    $time = strtotime($item->payment_date);
                    if ($time !== false && $time > 0 && $item->payment_date != '0000-00-00') {
                        $validDate = true;
                    }
                }
                if ($validDate) {
                    echo date('d-m-Y', strtotime($item->payment_date));
                } else {
                    echo 'Belirtilmedi';
                }
                ?>
            </td>
            <td><?= !empty($item->description) ? $item->description : 'Belirtilmedi' ?></td>
            <td>
                <button data-post-url="<?php echo base_url("income/getIncomesDetail/$item->uniq_id") ?> "
                        class="btn btn-sm btn-primary updateIncome" >
                    <i class="ri-pencil-fill"></i>
                </button>

                <button data-delteurl="<?= base_url("income/delete/$item->uniq_id") ?>" class="btn btn-sm btn-danger deletebtn">
                    <i class="ri-delete-bin-fill"></i>
                </button>
            </td>
        </tr>

    <?php }
} else { ?>
    <tr>
        <td colspan="10" class="text-center text-muted">Ödeme kaydı bulunamadı.</td>
    </tr>
<?php } ?>