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
        $this->CheckAcess();
        redirect(base_url("user/home"));
    }

    public function login()
    {
        if($this->session->userdata('logged_in')) 
            redirect(base_url("user/home"));

        $email = $this->input->post("email");
        $password = md5($this->input->post("password"));
        $result = $this->user->login($email, $password);
        if($result && $result[0]->access_level <= 5)
        {
            $this->session->set_userdata(array(
                'logged_in' => true,
                'id' => $result[0]['matricula'],
                'email' => $result[0]['email'],
                'password' => $result[0]['password'],
                'name' => $result[0]['usuario_nome'],
                'date_birth' => $result[0]['data_nascimento'],
                'sex' => $result[0]['sexo'],
                'fone' => $result[0]['telefone'],
                'fone_fix' => $result[0]['telefone_fixo'],
                'address' => $result[0]['endereco'],
                'date_entry' => $result[0]['data_entrada'],
                'access_level' => $result[0]['access_level'],
                'active' => $result[0]['ativo'],
                'shift' => $result[0]['turno'],
                'responsible' => $result[0]['responsavel'],
                'serie_id' => $result[0]['fk_serie'],
                'serie_school' => $result[0]['serie_escolar'],
                'cod_turma' => $result[0]['fk_turma'],
                'name_turma' => $result[0]['nome_turma'],
                'situation' => $result[0]['situacao'],
            ));
            redirect(base_url("user"));
        }
        else
            $this->message->newMessage("danger", "0", "Login:", "Email ou senha incorretos!");
        
        redirect(base_url("user"));
    }

    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url("user"));
    }

    public function CheckAcess()
    {
        if($this->session->userdata('logged_in'))
        {
            if($this->session->userdata('access_level') > 1)
                redirect(base_url("admin"));
        }
        else
            redirect(base_url("user/home"));
    }
}