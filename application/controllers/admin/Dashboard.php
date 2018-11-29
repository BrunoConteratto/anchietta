<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->config->load('config_anchietta', FALSE, TRUE);
    }

	public function index()
	{
		if(!$this->session->userdata('logged_in'))
			redirect(base_url("admin/Login"));

		$this->load->view('admin/header_view');
		$this->load->view('admin/pages/dashboard_view');
		$this->load->view('admin/footer_view');
	}
}
