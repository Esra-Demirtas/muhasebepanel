<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Treatment extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
        $this->load->helper('treatment');
        $this->load->helper('doctor');

        if (!$this->session->userdata('users_info')){
            redirect(base_url('login'));
        }

        date_default_timezone_set('Europe/Istanbul');
    }
    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_folder_v";

        $viewData->treatmentData = $this->General_model->get_all(
            'treatment_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add(){
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_folder_v";

        $this->load->model('General_model');

        $viewData->treatmentData = $this->General_model->get_all(
            'treatment_table',
            array()
        );
        $this->load->view('patient_v/patient_folder_v/tabview/treatment_tab', $viewData);
    }

    public function addForm($patient_id){
        $this->load->helper('string');
        $this->load->model('General_model');

        $insert = $this->General_model->add(
            'treatment_table',
            array(
                "uniq_id"           => random_string('nozero',7),
                "patient_id"              => $patient_id,
                "doctor_id"              => strip_tags(trim($this->input->post("doctor_id"))),
                "treatment_name"              => strip_tags(trim($this->input->post("treatment_name"))),
                "tooth_number"              => strip_tags(trim($this->input->post("tooth_number"))),
                "treatment_price"              => strip_tags(trim($this->input->post("treatment_price"))),
                "payment_status"              => strip_tags(trim($this->input->post("payment_status"))),
                "treatment_date"           => strip_tags(trim($this->input->post("treatment_date"))),
                "note"           => strip_tags(trim($this->input->post("note"))),
                "created_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert) {
            echo "1";
        } else {
            echo "0";
        }

    }

    public function treatmentPatientRender($patient_id)
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_folder_v";
        $this->load->model('General_model');
        $this->load->helper('treatment');
        $viewData->assignedTreatment = $this->General_model->get_all(
            'treatment_table',
            array(
                'patient_id' => $patient_id
            ),'id DESC'
        );
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_page_v/treatment_list_render", $viewData);

    }

    public function update($uniq_id){

        $treatmentData = $this->General_model->get(
            'treatment_table',
            array("uniq_id" => $uniq_id)
        );

        if ($treatmentData) {
            echo json_encode(array(
                "status" => "success",
                "data" => $treatmentData
            ));
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => "Tedavi Planı Bulunamadı."
            ));
        }
    }

    public function updateForm(){
        $this->load->helper('string');

        $update = $this->General_model->update(
            'treatment_table',
            array(
                'uniq_id' =>   $this->input->post("uniq_id", true),
            ),
            array(
                "treatment_name"              => $this->input->post("treatment_name", true),
                "doctor_id"              => $this->input->post("doctor_id", true),
                "tooth_number"              => $this->input->post("tooth_number", true),
                "treatment_price"              => $this->input->post("treatment_price", true),
                "payment_status"              => $this->input->post("payment_status", true),
                "treatment_date"            => $this->input->post("treatment_date", true),
                "note"          => $this->input->post("note", true),
                "updated_at"     => date("Y-m-d H::s"),
            )
        );

        if($update){
            echo true;
        }else{
            echo false;
        }
    }

    public function getTreatmentsDetail($uniq_id)
    {
        $this->load->model('General_model');
        $data = $this->General_model->get('treatment_table', array('uniq_id' => $uniq_id));

        echo json_encode($data);
    }

    public function delete($uniq_id){
        $this->load->model('General_model');

        $delete = $this->General_model->get(
            'treatment_table',
            array("uniq_id" => $uniq_id)
        );

        if ($delete){
            $delete = $this->General_model->delete(
                'treatment_table',
                array("uniq_id" => $uniq_id)
            );
            if($delete){
                echo json_encode(array('status' => 'success', 'message' => 'Tedavi kaydı silindi.'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Silme işlemi başarısız.'));
            }
        } else {
            log_message('error', 'Tedavi Bulunamadı: ' . $uniq_id);
            echo json_encode(array('status' => 'error', 'message' => 'Tedavi Bulunamadı.'));
        }
    }



}
