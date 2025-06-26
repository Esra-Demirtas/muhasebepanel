<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 16.06.2025
 * Time: 23:36
 */

function parentCategoryDataGet($uniq_id)
{
    $t = get_instance();
    $t->load->model('General_model');
    $data = $t->General_model->get(
        'stock_parent_category',
        array(
            "uniq_id" => $uniq_id
        )
    );
    if ($data){
        return $data->category_name;
    }else{
        return "Veri Bulunamadı";
    }
}

function subCategoryDataGet($uniq_id)
{
    $t = get_instance();
    $t->load->model('General_model');
    $data = $t->General_model->get(
        'stock_sub_category',
        array(
            "uniq_id" => $uniq_id
        )
    );
    if ($data){
        return $data->category_name;
    }else{
        return "Veri Bulunamadı";
    }
}