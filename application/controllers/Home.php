<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->config->load('config_anchietta', FALSE, TRUE);
    }

	public function index()
	{
		$this->load->view('header_view');
		$this->load->view('pages/header_nav_view');
		$this->load->view('pages/home_view');
		$this->load->view('footer_view');
	}
}
