<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Stock extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('stock');
        $this->load->model('General_model');

        if (!$this->session->userdata('users_info')){
            redirect(base_url('login'));
        }

        date_default_timezone_set('Europe/Istanbul');
    }
    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_v";
        $viewData->subViewFolder = "stock_list_v";

        $viewData->stockData = $this->General_model->get_all(
            'stock_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add(){
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_v";
        $viewData->subViewFolder = "stock_add_v";

        $this->load->model('General_model');

        $viewData->stockData = $this->General_model->get_all(
            'stock_table',
            array()
        );

        $viewData->categoryData = $this->General_model->get_all(
            'stock_parent_category',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function addForm(){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->add(
            'stock_table',
            array(
                "uniq_id"           => random_string('nozero',7),
                "item_name"              => strip_tags(trim($this->input->post("item_name"))),
                "barcode"              => strip_tags(trim($this->input->post("barcode"))),
                "stock_parent_category_id"           => strip_tags(trim($this->input->post("stock_parent_category_id"))),
                "stock_sub_category_id"           => strip_tags(trim($this->input->post("stock_sub_category_id"))),
                "unit"           => strip_tags(trim($this->input->post("unit"))),
                "stock_quantity"           => strip_tags(trim($this->input->post("stock_quantity"))),
                "critical_level"           => strip_tags(trim($this->input->post("critical_level"))),
                "created_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Stok Kaydı Başarılı Şekilde Eklendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Stock"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Stock"));
        }

    }

    public function update($uniq_id){
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_v";
        $viewData->subViewFolder = "stock_update_v";

        $this->load->model('General_model');

        $viewData->stockData = $this->General_model->get(
            'stock_table',
            array("uniq_id" => $uniq_id)
        );

        $viewData->categoryData = $this->General_model->get_all(
            'stock_parent_category',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function updateForm($uniq_id){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->update(
            'stock_table',
            array('uniq_id' => $uniq_id),
            array(
                "item_name"              => strip_tags(trim($this->input->post("item_name"))),
                "barcode"              => strip_tags(trim($this->input->post("barcode"))),
                "stock_parent_category_id"           => strip_tags(trim($this->input->post("stock_parent_category_id"))),
                "stock_sub_category_id"           => strip_tags(trim($this->input->post("stock_sub_category_id"))),
                "unit"           => strip_tags(trim($this->input->post("unit"))),
                "stock_quantity"           => strip_tags(trim($this->input->post("stock_quantity"))),
                "critical_level"           => strip_tags(trim($this->input->post("critical_level"))),
                "updated_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Stok Kaydı Başarılı Şekilde Güncellendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Stock"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Stock"));
        }
    }

    public function delete($uniq_id){

        $this->load->model('General_model');

        $delete = $this->General_model->delete(
            'stock_table',
            array("uniq_id" => $uniq_id)
        );

        if ($delete){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Stok Kaydı Başarılı Şekilde Silindi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Stock"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Stock"));
        }

    }
}
