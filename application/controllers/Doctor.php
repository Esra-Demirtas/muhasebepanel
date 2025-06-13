<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Doctor extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');

        if (!$this->session->userdata('users_info')){
            redirect(base_url('login'));
        }

        date_default_timezone_set('Europe/Istanbul');
    }
    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "doctor_v";
        $viewData->subViewFolder = "doctor_list_v";

        $viewData->doctorData = $this->General_model->get_all(
            'doctor_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add(){
        $viewData = new stdClass();
        $viewData->viewFolder = "doctor_v";
        $viewData->subViewFolder = "doctor_add_v";

        $this->load->model('General_model');

        $viewData->doctorData = $this->General_model->get_all(
            'patient_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function addForm(){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->add(
            'doctor_table',
            array(
                "uniq_id"           => random_string('nozero',7),
                "name"              => strip_tags(trim($this->input->post("name"))),
                "surname"              => strip_tags(trim($this->input->post("surname"))),
                "branch"           => strip_tags(trim($this->input->post("branch"))),
                "fixed_salary"           => strip_tags(trim($this->input->post("fixed_salary"))),
                "commission_rate"           => strip_tags(trim($this->input->post("commission_rate"))),
                "isActivity"           => 1,
                "created_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Doktor Kaydı Başarılı Şekilde Eklendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Doctor"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Doctor"));
        }

    }

    public function update($uniq_id){
        $viewData = new stdClass();
        $viewData->viewFolder = "doctor_v";
        $viewData->subViewFolder = "doctor_update_v";

        $this->load->model('General_model');

        $viewData->doctorData = $this->General_model->get(
            'doctor_table',
            array("uniq_id" => $uniq_id)
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function updateForm($uniq_id){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->update(
            'doctor_table',
            array('uniq_id' => $uniq_id),
            array(
                "name"              => strip_tags(trim($this->input->post("name"))),
                "surname"              => strip_tags(trim($this->input->post("surname"))),
                "branch"           => strip_tags(trim($this->input->post("branch"))),
                "fixed_salary"           => strip_tags(trim($this->input->post("fixed_salary"))),
                "commission_rate"           => strip_tags(trim($this->input->post("commission_rate"))),
                "updated_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Doktor Kaydı Başarılı Şekilde Güncellendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Doctor"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Doctor"));
        }
    }

    public function delete($uniq_id){

        $this->load->model('General_model');

        $delete = $this->General_model->delete(
            'doctor_table',
            array("uniq_id" => $uniq_id)
        );

        if ($delete){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Doktor Kaydı Başarılı Şekilde Silindi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Doctor"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Doctor"));
        }

    }

    public function activitySet($uniq_id,$status){

        if ($status === "1"){
            $newStatus = 0;
        }else{
            $newStatus = 1;
        }
        $this->load->model('General_model');
        $update = $this->General_model->update(
            'doctor_table',
            array( "uniq_id" => $uniq_id,),
            array(
                "isActivity" => $newStatus
            )
        );

        if ($update){
            return true;
        }else{
            return false;
        }
    }

}
