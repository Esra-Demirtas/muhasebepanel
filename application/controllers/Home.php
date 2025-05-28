<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "home_v";

        $this->load->view("{$viewData->viewFolder}/index", $viewData);

    }


}
