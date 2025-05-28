<?php
/**
 * Created by Esra DEMİRTAŞ.
 * Date: 29.05.2025
 * Time: 01:44
 */
?>
<?php

class General_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();

    }

    public function get($tableName = '', $where = array(),$order = "id DESC")
    {
        return $this->db->where($where)->order_by($order)->get($tableName)->row();
    }

    public function getPage($tableName = '', $where = array(), $order = "id DESC")
    {
        return $this->db->where($where)->order_by($order)->get($tableName)->row();
    }

    /** Tüm Kayıtları bana getirecek olan metot.. */
    public function get_all($tableName = '', $where = array(), $order = "id ASC")
    {
        return $this->db->where($where)->order_by($order)->get($tableName)->result();
    }

    public function add($tableName = '', $data = array())
    {
        return $this->db->insert($tableName, $data);
    }

    public function update($tableName = '', $where = array(), $data = array())
    {
        return $this->db->where($where)->update($tableName, $data);
    }

    public function delete($tableName = '', $where = array())
    {
        return $this->db->where($where)->delete($tableName);
    }

}
