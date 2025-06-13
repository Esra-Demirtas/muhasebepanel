<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 13.06.2025
 * Time: 13:18
 */
?>
<div class="col-xxl-3">

    <div class="card">
        <div class="card-body">
            <h5 class="card-title mb-3">Hasta Bilgileri</h5>
            <div class="table-responsive">
                <table class="table table-borderless mb-0">
                    <tbody>
                    <tr>
                        <th class="ps-0" scope="row">Hasta Adı :</th>
                        <td class="text-muted"><?=$patientData->name. ' ' .  $patientData->surname  ?></td>
                    </tr>
                    <tr>
                        <th class="ps-0" scope="row">Telefonu:</th>
                        <td class="text-muted"><?=$patientData->phone  ?></td>
                    </tr>
                    <tr>
                        <th class="ps-0" scope="row">E-posta :</th>
                        <td class="text-muted"><?=$patientData->email  ?></td>
                    </tr>

                    </tbody>
                </table>
            </div>
        </div><!-- end card body -->
    </div><!-- end card -->


    <!--end card-->
</div>