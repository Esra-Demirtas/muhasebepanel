<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 29.05.2025
 * Time: 01:51
 */

function get_user_ip_address(){
    /** Obtaining the user IP Address  */
    if(getenv("HTTP_CLIENT_IP")) {
    $ip = getenv("HTTP_CLIENT_IP");
    } elseif(getenv("HTTP_X_FORWARDED_FOR")) {
    $ip = getenv("HTTP_X_FORWARDED_FOR");
    if (strstr($ip, ',')) {
    $tmp = explode (',', $ip);
    $ip = trim($tmp[0]);
    }
    } else {
    $ip = getenv("REMOTE_ADDR");
    }
    return $ip;
}

function get_user_roles($roles_id){
    /** Obtaining the user roles detail.  */
    $t = get_instance();
    $t->load->model('general_model');
    $rolesDetail = $t->general_model->get(
    "user_roles",
    array("roles_id" => $roles_id,)
    );
    if ($rolesDetail){
    return $rolesDetail;
    }else{
    return false;
    }

}