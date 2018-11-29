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
        if($this->session->userdata('logged_in'))
            redirect(base_url("admin/Dashboard"));
        else
			$this->load->view('admin/pages/login_view');
	}
}
