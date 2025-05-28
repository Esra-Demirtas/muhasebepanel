<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

    public function __construct()
    {
        parent::__construct();
        $this->load->helper('root');
    }

    public function index()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "login_v";
        $viewData->subViewFolder = "login_form_v";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function resetpass()
    {
        $viewData = new stdClass();
        $viewData->viewFolder = "login_v";
        $viewData->subViewFolder = "password_reset_v";
        $this->load->view("{$viewData->viewFolder}/{$viewData->subViewFolder}/index", $viewData);
    }

    public function loginform(){
        $userEmail = strip_tags(trim($this->input->post("user_email")));
        $userPass = strip_tags(trim($this->input->post("user_password")));

        //TODO: Giriş İşleminde Kullanıcı Şifre Hatırlatma işlemini yap. user_rememberCheck

        $this->load->model('general_model');
        $userDataCheck = $this->general_model->get(
            'users_table',
            array(
                "user_email" => $userEmail,
                "user_pass" => md5($userPass),
            )
        );
        if ($userDataCheck){
            /**
             * EN: Login Success
             * TR: Giriş Başarılı
             */
            $this->session->set_userdata('users_info',$userDataCheck);
            $loginLog = $this->general_model->add(
                'user_login_logs',
                array(
                    "user_id" => $userDataCheck->uniq_id,
                    'activity_msg' => 'Kullanıcı Başarı İle Giriş Yaptı.',
                    'activity_ip_adress' =>  get_user_ip_address(),
                    'activity_date' => date("Y-m-d H:i:s"),
                    'activity_detail' => 'test'
                )
            );
            $this->session->set_flashdata('userLoginSuccess', true);
            redirect(base_url());

        }else{
            /**
             * EN: If user login failed, return error code and redirect to login page.
             * TR: Kullanıcı Girişi Başarısızsa hata kodu ile birlikte giriş ekranınına geri gönder.
             */
            $this->session->set_flashdata('userLoginError', true);
            redirect(base_url("Login"));
        }
    }

    public function logout(){
        $this->session->unset_userdata('users_info');
        redirect(base_url("login"));
    }





}
