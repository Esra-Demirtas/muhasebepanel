<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 29.05.2025
 * Time: 01:51
 */

function getPatientData($uniq_id,$request = ''){
    $t = get_instance();
    $t->load->model('General_model');
    $data = $t->General_model->get(
        'patient_table',
        array("uniq_id" => $uniq_id)
    );
    if ($data){
        if (!empty($request)){
            return $data->$request;
        }else{
            return $data;
        }
    }else{
        return false;
    }
}