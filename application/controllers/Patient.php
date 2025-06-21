<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Patient extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
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
        $viewData->subViewFolder = "patient_list_v";

        $viewData->patientsData = $this->General_model->get_all(
            'patient_table',
            array()
        );
        $viewData->familyData = $this->General_model->get_all(
            'family_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);

    }

    public function folder($patient_id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_folder_v";

        $this->load->model('General_model');

        $viewData->patientData = $this->General_model->get(
            'patient_table',
            array("uniq_id" => $patient_id),'id DESC'
        );

        $viewData->treatmentData = $this->General_model->get_all(
            'treatment_table',
            array(
                'patient_id' => $patient_id
            ),'id DESC'
        );

        $viewData->assignedTreatment= $this->General_model->get_all(
            'treatment_table',
            array(
                'patient_id' => $patient_id
            ),'id DESC'
        );

        $viewData->doctorData= $this->General_model->get_all(
            'doctor_table',
            array(),'name DESC'
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function add(){
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_add_v";

        $this->load->model('General_model');

        $viewData->familyData = $this->General_model->get_all(
            'family_table',
            array()
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function addForm(){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->add(
            'patient_table',
            array(
                "uniq_id"           => random_string('nozero',7),
                "family_id"           => strip_tags(trim($this->input->post("family_id"))),
                "name"              => strip_tags(trim($this->input->post("name"))),
                "surname"           => strip_tags(trim($this->input->post("surname"))),
                "identity_no"           => strip_tags(trim($this->input->post("identity_no"))),
                "gender"              => (int) $this->input->post("gender"),
                "birth_date"     => strip_tags(trim($this->input->post("birth_date"))),
                'phone'    => strip_tags(trim($this->input->post("phone"))),
                "email"                => strip_tags(trim($this->input->post("email"))),
                "reason_for_visit"         => strip_tags(trim($this->input->post("reason_for_visit"))),
                "notes"        => strip_tags(trim($this->input->post("notes"))),
                "created_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Hasta Kaydı Başarılı Şekilde Eklendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Patient"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Patient"));
        }

    }

    public function update($uniq_id){
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_update_v";

        $this->load->model('General_model');

        $viewData->patientData = $this->General_model->get(
            'patient_table',
            array("uniq_id" => $uniq_id)
        );

        $viewData->familyData = $this->General_model->get_all(
            'family_table',
            array()
        );


        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function updateForm($uniq_id){
        $this->load->helper('string');

        $this->load->model('General_model');
        $insert = $this->General_model->update(
            'patient_table',
            array('uniq_id' => $uniq_id),
            array(
                "family_id"           => strip_tags(trim($this->input->post("family_id"))),
                "name"              => strip_tags(trim($this->input->post("name"))),
                "surname"           => strip_tags(trim($this->input->post("surname"))),
                "identity_no"           => strip_tags(trim($this->input->post("identity_no"))),
                "gender"              => (int) $this->input->post("gender"),
                "birth_date"     => strip_tags(trim($this->input->post("birth_date"))),
                'phone'    => strip_tags(trim($this->input->post("phone"))),
                "email"                => strip_tags(trim($this->input->post("email"))),
                "reason_for_visit"         => strip_tags(trim($this->input->post("reason_for_visit"))),
                "notes"        => strip_tags(trim($this->input->post("notes"))),
                "updated_at"     => date("Y-m-d H:i:s"),
            )
        );

        if ($insert){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Hasta Kaydı Başarılı Şekilde Güncellendi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Patient"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Patient"));
        }
    }

    public function delete($uniq_id){

        $this->load->model('General_model');

        $delete = $this->General_model->delete(
            'patient_table',
            array("uniq_id" => $uniq_id)
        );

        if ($delete){
            $alert = array(
                "title" => "Başarılı",
                "text" => 'Hasta Kaydı Başarılı Şekilde Silindi.',
                "type"  => "success"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Patient"));
        }else{
            $alert = array(
                "title" => "Hata ile karşılaşıldı",
                "text" => $this->upload->display_errors(),
                "type"  => "error"
            );
            $this->session->set_flashdata("alert", $alert);
            redirect(base_url("Patient"));
        }

    }
    public function getPatients()
    {
        $limit = $this->input->post("length");
        $start = $this->input->post("start");
        $search = $this->input->post("search[value]");

        $this->load->model("General_model");

        $totalData = $this->General_model->count_all("patient_table");

        $columns = $this->General_model->get_table_columns("patient_table");

        $where = "";
        if (!empty($search) && !empty($columns)) {
            $searchConditions = [];
            foreach ($columns as $column) {
                $searchConditions[] = "$column LIKE '%" . $this->db->escape_like_str($search) . "%'";
            }
            $where = "(" . implode(" OR ", $searchConditions) . ")";
        }

        if (!empty($where)) {
            $totalFiltered = $this->General_model->count_filtered("patient_table", $where);
        } else {
            $totalFiltered = $totalData;
        }
        
        if ($limit == -1) {
            $limit = null;
            $start = null; 
        }

        $data = $this->General_model->get_patients($where, "uniq_id DESC", $limit, $start);


        $result = array();
        foreach ($data as $item) {
            $result[] = array(
                $item->id, 
                $item->uniq_id,
                $item->name . ' ' . $item->surname,
                $item->identity_no,
                $item->gender,
                date('d-m-Y', strtotime($item->birth_date)),
                isset($item->phone) ? $item->phone : '---',
                '<a href="' . base_url("patient/folder/" . $item->uniq_id) . '" class="btn btn-sm btn-primary btn-label rounded-pill">
                <i class="ri-folder-2-fill label-icon align-middle rounded-pill fs-16 me-2"></i>Dosyası
            </a>',
                '<div class="dropdown d-inline-block">
                <button class="btn btn-soft-primary btn-sm dropdown" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="ri-more-fill align-middle"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end">
                    <li><a href="' . base_url("patient/update/" . $item->uniq_id) . '" class="dropdown-item edit-item-btn">
                        <i class="ri-pencil-fill align-bottom me-2 text-muted"></i> Düzenle</a></li>
                    <li class="text-danger">
                        <button data-deleteurl="' . base_url("patient/delete/" . $item->uniq_id) . '"
                            class="dropdown-item remove-item-btn deletebtn">
                            <i class="ri-delete-bin-fill align-bottom me-2 text-muted"></i> Sil
                        </button>
                    </li>
                </ul>
            </div>'
            );
        }

        echo json_encode(array(
            "draw" => intval($this->input->post("draw")),
            "recordsTotal" => $totalData,
            "recordsFiltered" => $totalFiltered,
            "data" => $result
        ));
    }

    public function debitForm($patient_id)
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "patient_v";
        $viewData->subViewFolder = "patient_debit_page_v";
        $this->load->model('General_model');

        $viewData->patientData = $this->General_model->get(
            'patient_table',
            array("uniq_id" => $patient_id),'id DESC'
        );

        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

}
