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

    public function get_limit($tableName = '', $where = array(), $order = "id ASC", $limit = 4)
    {
        return $this->db->where($where)->order_by($order)->limit($limit)->get($tableName)->result();
    }


    public function count_all($tableName = '')
    {
        return $this->db->count_all($tableName);
    }

    public function count_filtered($tableName = '', $where = array())
    {
        $this->db->where($where);
        return $this->db->count_all_results($tableName);
    }

    public function get_patients($where = [], $order_by = 'uniq_id DESC', $limit = 10, $start = 0)
    {
        $this->db->select('*');
        $this->db->from('patient_table');

        if (!empty($where)) {
            $this->db->where($where);
        }

        $this->db->order_by($order_by);
        $this->db->limit($limit, $start);

        $query = $this->db->get();
        return $query->result();
    }

    public function get_table_columns($table)
    {
        return $this->db->list_fields($table);
    }

}
