<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Boletim extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
        $this->config->load('config_anchietta', FALSE, TRUE);
        $this->load->model('Message_Model', 'message');
        $this->load->model('User_Model', 'user');
    }

	public function index($year = NULL)
	{
        $this->CheckAcess();
        $result['data'] = NULL;
        if(!$year)
            $year = date("Y");
        if($year > 2000 && $year < 2100)
            $result['data'] = $this->user->GetBoletim($this->session->userdata('id'), $year);

        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/boletim_view', $result);
        $this->load->view('pages/user/footer_view');
	}

    public function search()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $result['data'] = NULL;
        if(!$year)
            $year = date("Y");
        if($year > 2000 && $year < 2100)
            $result['data'] = $this->user->GetBoletim($this->session->userdata('id'), $year);

        $this->load->view('pages/user/pages/boletim_struct_view', $result);
    }

    public function CheckAcess()
    {
        if($this->session->userdata('logged_in'))
        {
            if($this->session->userdata('access_level') > 1)
                redirect(base_url("admin"));
        }
        else
            redirect(base_url("user"));
    }
}
