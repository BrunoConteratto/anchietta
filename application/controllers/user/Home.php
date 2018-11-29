<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    }

	public function index()
	{
		if($this->session->userdata('logged_in'))
		{
	        $this->load->view('header_view');
	        $this->load->view('pages/user/header_nav_view');
	        $this->load->view('pages/user/pages/user_view');
	        $this->load->view('pages/user/footer_view');
		}
		else
			redirect(base_url("user/login"));
	}
}
