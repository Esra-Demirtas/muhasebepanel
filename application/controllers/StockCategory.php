<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class StockCategory extends CI_Controller {
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('Stock');
        $this->load->model('General_model');

        if (!$this->session->userdata('users_info')){
            redirect(base_url('login'));
        }

        date_default_timezone_set('Europe/Istanbul');
    }

    public function categories()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_category_v";
        $viewData->subViewFolder = "stock_categories_list";
        $this->load->model('general_model');

        $viewData->categorysData = $this->general_model->get_all(
            'stock_parent_category',
           array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function newCategory(){
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_category_v";
        $viewData->subViewFolder = "new_category";
        $this->load->model('general_model');

        $viewData->parentData = $this->general_model->get(
            'stock_parent_category',
            array()
        );


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function newCategoryForm(){
        $this->load->helper('string');
        $this->load->model('general_model');
        $insert = $this->general_model->add(
            'stock_parent_category',
            array(
                "uniq_id" => random_string('nozero','7'),
                'category_name' => strip_tags(trim($this->input->post("category_name"))),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Kategori Başarılı Şekilde Eklendi',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/categories"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/newCategory"));
        }
    }

    public function categoryUpdate($uniq_id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_category_v";
        $viewData->subViewFolder = "update_category";
        $this->load->model('general_model');

        $viewData->categoryData = $this->general_model->get(
            'stock_parent_category',
            array("uniq_id" => $uniq_id)
        );

        $viewData->users = $this->general_model->get_all(
            'users_table',
            array('isActivity' => 1)
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function categoryUpdateForm($uniq_id)
    {
        $this->load->model('general_model');

        $categoryUpdate = $this->general_model->update(
            'stock_parent_category',
            array('uniq_id' => $uniq_id),
            array(
                "category_name" => strip_tags(trim($this->input->post("category_name"))),
                "category_msg" =>  strip_tags(trim($this->input->post("category_msg"))),
            )
        );

        if ($categoryUpdate) {
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Kategori Başarı ile güncellendi',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/categories"));
        } else {
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/categories"));
        }
    }

    public function newSubCategory($uniq_id){
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_category_v";
        $viewData->subViewFolder = "new_sub_category";
        $this->load->model('general_model');

        $viewData->parentData = $this->general_model->get(
            'stock_parent_category',
            array("uniq_id" => $uniq_id)
        );


        /** Yardım kılavuzu yönlendirmeleri */
        $viewData->guideDatas = $this->general_model->get_all(
            'guide_table',
            array()
        );

        $viewData->users = $this->general_model->get_all(
            'users_table',
            array('isActivity' => 1)
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function subCategory($uniq_id)
    {
        /**
         * Alt Kategorilerin listelendiği fonksiyon.
         */
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_category_v";
        $viewData->subViewFolder = "stock_sub_categories_list";
        $this->load->model('general_model');

        $viewData->parentData = $this->general_model->get(
            'stock_parent_category',
            array("uniq_id" => $uniq_id)
        );
        $viewData->subCategoryData = $this->general_model->get_all(
            'stock_sub_category',
            array("parent_id" => $uniq_id)
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function getSubCategoryList()
    {
        $uniq_id = $this->input->post('uniq_id');
        $this->load->model('general_model');
        $data = $this->general_model->get_all(
            'stock_sub_category',
            array(
                'parent_id' => $uniq_id
            )
        );

        if ($data){
            echo json_encode($data);
        }

    }

    public function newSubCategoryForm($uniq_id){

        $this->load->model('general_model');
        $this->load->helper('string');

        $selectGuide = $this->input->post("guideTitle");
        $guides = '';
        if (!empty($selectGuide)) {
            $guideString = implode(", ", $selectGuide);
            $guides =  $guideString;
        }

        $newCategoryInsert = $this->general_model->add(
            'stock_sub_category',
            array(
                "uniq_id" => random_string('nozero',5),
                "parent_id" => $uniq_id,
                "category_name" => strip_tags(trim($this->input->post("category_name"))),
            )
        );
        if ($newCategoryInsert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Kategori Başarılı Şekilde Eklendi',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/subCategory/$uniq_id"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/newSubCategory/$uniq_id"));

        }
    }

    public function subCategoryUpdate($uniq_id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "stock_category_v";
        $viewData->subViewFolder = "update_sub_category";
        $this->load->model('general_model');

        $viewData->subCategoryData = $this->general_model->get(
            'stock_sub_category',
            array("uniq_id" => $uniq_id)
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function subCategoryUpdateForm($uniq_id,$parent_id)
    {
        $this->load->model('general_model');

        $newCategoryInsert = $this->general_model->update(
            'stock_sub_category',
            array('uniq_id' => $uniq_id),
            array(
                "category_name" => strip_tags(trim($this->input->post("category_name"))),
            )
        );

        if ($newCategoryInsert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Kategori Başarı ile güncellendi',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/subCategory/$parent_id"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/subCategory/$parent_id"));
        }
    }

    public function stockDeleteCategorys($uniq_id)
    {
        $this->load->model('general_model');
        $parentData = $this->general_model->get(
            'stock_parent_category',
            array(
                "uniq_id" => $uniq_id
            )
        );

        /** Önce alt kategori kontrolü */
        $parentSubData = $this->general_model->get_all(
            'stock_sub_category',
            array(
                "parent_id" => $uniq_id
            )
        );
        /** Alt Kategorilerin silinmesi  */
        if($parentSubData){
            foreach ($parentSubData as $item){
                $parentSubData = $this->general_model->delete(
                    'stock_sub_category',
                    array(
                        "uniq_id" => $item->uniq_id
                    )
                );
            }
        }

        /** Ana Kategorinin Silinmesi */

        $delete = $this->general_model->delete(
            'stock_parent_category',
            array(
                "uniq_id" => $uniq_id
            )
        );

        if ($delete){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Kategori Başarılı Şekilde Silindi',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/categories"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/categories"));
        }
    }

    public function stockDeleteSubCategory($uniq_id,$parent_id)
    {
        $this->load->model('general_model');

        /** Ana Kategorinin Silinmesi */

        $delete = $this->general_model->delete(
            'stock_sub_category',
            array(
                "uniq_id" => $uniq_id
            )
        );

        if ($delete){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Kategori Başarılı Şekilde Silindi',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/subCategory/$parent_id"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("stockCategory/subCategory/$parent_id"));
        }
    }

}
