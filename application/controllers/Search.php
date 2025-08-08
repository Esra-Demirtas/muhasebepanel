<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Search extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('General_model');
    }

    public function index()
    {
        show_404();
    }

    public function global_search()
    {
        if ($this->input->is_ajax_request()) {
            $searchTerm = $this->input->get('term');

            $patients = $this->General_model->search_patients($searchTerm);
            $families = $this->General_model->search_families($searchTerm);
            $doctors = $this->General_model->search_doctors($searchTerm);

            $searchResults = array (
                'patients' => $patients,
                'families' => $families,
                'doctors' => $doctors
            );

            echo json_encode($searchResults);
        } else {
            show_404();
        }
    }
}
