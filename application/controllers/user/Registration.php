<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Registration extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    }

	public function index()
	{
        $this->CheckAcess();
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/registration_view');
        $this->load->view('pages/user/footer_view');
	}

    public function UpdateData()
    {
        
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
