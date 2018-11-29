<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->config->load('config_anchietta', FALSE, TRUE);
    }

	public function index()
	{
		if ($this->session->userdata('logged_in'))
		{
            if($this->session->userdata('access_level') > 0)
                redirect(base_url("admin"));

            redirect(base_url("user"));            
		}
		else
		{
			$this->load->view('header_view');
			$this->load->view('pages/login_view');
		}
	}
}
