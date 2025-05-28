<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('root');
        $this->load->model('general_model');

        if (!$this->session->userdata('users_info')){
            redirect(base_url('login'));
        }

        date_default_timezone_set('Europe/Istanbul');
    }
    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "home_v";

        $this->load->view("{$viewData->viewFolder}/index", $viewData);

    }


}
