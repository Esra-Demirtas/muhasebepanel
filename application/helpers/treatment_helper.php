<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 17.06.2025
 * Time: 01:12
 */

function getTreatmentData($id)
{
    $t = get_instance();
    $t->load->model('General_model');
    $data = $t->General_model->get(
        'treatment_table',
        array('id' => $id)
    );

    if ($data){
        return $data;
    }else{
        return false;
    }

}

function getTreatmentName($treatment_id)
{
    $t = get_instance();
    $t->load->model('General_model');
    $data = $t->General_model->get(
        'treatment_table',
        array(
            "uniq_id" => $treatment_id
        )
    );
    if ($data){
        return $data->treatment_name;
    }else{
        return "Veri Bulunamadı";
    }
}