<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Family extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        /*$this->load->helper('Patient');*/
        $this->load->model('General_model');

        if (!$this->session->userdata('users_info')){
            redirect(base_url('login'));
        }

        date_default_timezone_set('Europe/Istanbul');
    }
    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "family_v";
        $viewData->subViewFolder = "family_list_v";

        $viewData->familyData = $this->General_model->get_all(
            'family_table',
            array()
        );

        $viewData->patientData = $this->General_model->get_all(
            'patient_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function folder($family_id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "family_v";
        $viewData->subViewFolder = "family_folder_v";

        $this->load->model('General_model');

        $viewData->familyData = $this->General_model->get(
            'family_table',
            array("uniq_id" => $family_id),'id DESC'
        );

        $viewData->patientData = $this->General_model->get_all(
            'patient_table',
            array("family_id" => $family_id)
        );


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add(){
        $viewData = new stdClass();
        $viewData->viewFolder = "family_v";
        $viewData->subViewFolder = "family_add_v";

        $this->load->model('General_model');

        $viewData->patientData = $this->General_model->get_all(
            'patient_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function addForm(){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->add(
            'family_table',
            array(
                "uniq_id"           => random_string('nozero',7),
                "family_name"              => strip_tags(trim($this->input->post("family_name"))),
                "main_contact_id"           => strip_tags(trim($this->input->post("main_contact_id"))),
                "created_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Aile Kaydı Başarılı Şekilde Eklendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Family"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Family"));
        }

    }

    public function update($uniq_id){
        $viewData = new stdClass();
        $viewData->viewFolder = "family_v";
        $viewData->subViewFolder = "family_update_v";

        $this->load->model('General_model');

        $viewData->familyData = $this->General_model->get(
            'family_table',
            array("uniq_id" => $uniq_id)
        );

        $viewData->patientData = $this->General_model->get_all(
            'patient_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function updateForm($uniq_id){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->update(
            'family_table',
            array('uniq_id' => $uniq_id),
            array(
                "family_name"              => strip_tags(trim($this->input->post("family_name"))),
                "main_contact_id"           => strip_tags(trim($this->input->post("main_contact_id"))),
                "updated_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Aile Kaydı Başarılı Şekilde Güncellendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Family"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Family"));
        }
    }

    public function delete($uniq_id){

        $this->load->model('General_model');

        $delete = $this->General_model->delete(
            'family_table',
            array("uniq_id" => $uniq_id)
        );

        if ($delete){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Aile Kaydı Başarılı Şekilde Silindi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Family"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Family"));
        }

    }

}
