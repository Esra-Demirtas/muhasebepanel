<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 16.06.2025
 * Time: 23:36
 */

function getDoctorName($doctor_id)
{
    $t = get_instance();
    $t->load->model('General_model');
    $data = $t->General_model->get(
        'doctor_table',
        array(
            "uniq_id" => $doctor_id
        )
    );
    if ($data){
        return $data->name;
    }else{
        return "Veri Bulunamadı";
    }
}