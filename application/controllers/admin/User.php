<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
        $this->config->load('config_anchietta', FALSE, TRUE);
        $this->load->model('Message_Model', 'message');
        $this->load->model('User_Model', 'user');
    }

    public function index()
    {
        if($this->session->userdata('logged_in'))
            redirect(base_url("admin/Dashboard"));
        else
            redirect(base_url("admin/Login"));
    }

    public function login()
    {
        $email = $this->input->post("email");
        $password = md5($this->input->post("password"));
        $result = $this->user->login($email, $password);

        if($result && $result[0]->access_level > 0)
        {
            $this->session->set_userdata(array(
                'logged_in' => true,
                'id' => $result[0]->id,
                'name' => $result[0]->real_name,
                'email' => $result[0]->email,
                'access_level' => $result[0]->access_level,
                'password' => $result[0]->password,
                'active' => $result[0]->active,
                'cpf' => $result[0]->cpf,
            ));
            redirect(base_url("admin/Dashboard"));
        }
        else
            $this->message->newMessage("danger", "0", "Login:", "Email ou senha incorretos!");

        redirect(base_url("admin/Login"));
    }

    public function loginFacebook()
    {
        redirect(base_url("admin/Login"));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("admin/Login"));
    }
}