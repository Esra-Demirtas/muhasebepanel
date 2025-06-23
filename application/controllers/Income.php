<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Income extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
        $this->load->helper('income');
        $this->load->helper('treatment');

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

        $viewData->incomeData = $this->General_model->get_all(
            'income_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_folder_v";

        $this->load->model('General_model');

        $viewData->incomeData = $this->General_model->get_all(
            "income_table",
            array()
        );
        $this->load->view('patient_v/patient_folder_v/tabview/income_tab', $viewData);
    }

    public function addForm($patient_id)
    {
        $this->load->helper('string');
        $this->load->model('General_model');

        $insert = $this->General_model->add(
            'income_table',
            array(
                "uniq_id"           => random_string('nozero',7),
                "patient_id"        => $patient_id,
                "treatment_id"              => strip_tags(trim($this->input->post("treatment_id"))),
                "amount"              => strip_tags(trim($this->input->post("amount"))),
                "payment_type"              => strip_tags(trim($this->input->post("payment_type"))),
                "payment_date"              => strip_tags(trim($this->input->post("payment_date"))),
                "description"  => strip_tags(trim($this->input->post("description"))),
                "created_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert) {
           echo "1";
        } else {
            echo "0";
        }

    }

    public function incomePatientRender($patient_id)
    {

        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_folder_v";
        $this->load->model('General_model');
        $this->load->helper('income');
        $viewData->assignedIncome = $this->General_model->get_all(
            'income_table',
            array(
                'patient_id' => $patient_id
            ),'id DESC'
        );
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/render_page_v/income_list_render", $viewData);

    }

    public function update($uniq_id)
    {

        $incomeData = $this->General_model->get(
            'income_table',
            array("uniq_id" => $uniq_id)
        );


        if ($incomeData) {
            echo json_encode(array(
                "status" => "success",
                "data" => $incomeData
            ));
        } else {
            echo json_encode(array(
                "status" => "error",
                "message" => "Ödeme kaydı bulunamadı."
            ));
        }
    }

    public function updateForm()
    {
        $this->load->helper('string');

        $update = $this->General_model->update(
            'income_table',
            array(
                'uniq_id' =>   $this->input->post("uniq_id", true),
            ),
            array(
                "treatment_id"               => $this->input->post("treatment_id", true),
                "amount"               => $this->input->post("amount", true),
                "payment_type"               => $this->input->post("payment_type", true),
                "payment_date"              => $this->input->post("payment_date", true),
                "description"            => $this->input->post("description", true),
                "updated_at"          => date("Y-m-d H:i:s"),
            )
        );

        if($update){
            echo true;
        }else{
            echo false;
        }
    }

    public function getIncomesDetail($uniq_id)
    {
        $this->load->model('General_model');
        $data = $this->General_model->get('income_table', array('uniq_id' => $uniq_id));

        echo json_encode($data);
    }

    public function delete($uniq_id)
    {
        $this->load->model('General_model');

        $delete = $this->General_model->get(
            'income_table',
            array("uniq_id" => $uniq_id)
        );

        if ($delete){
            $delete = $this->General_model->delete(
                'income_table',
                array("uniq_id" => $uniq_id)
            );
            if($delete){
                echo json_encode(array('status' => 'success', 'message' => 'Ödeme kaydı silindi.'));
            } else {
                echo json_encode(array('status' => 'error', 'message' => 'Silme işlemi başarısız.'));
            }
        } else {
            log_message('error', 'Ödeme Bulunamadı: ' . $uniq_id);
            echo json_encode(array('status' => 'error', 'message' => 'Ödeme Bulunamadı.'));
        }
    }

}
