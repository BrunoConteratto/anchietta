<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Library extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    }

	public function index()
	{
        $this->CheckAcess();
        redirect(base_url("user/home"));
	}

    public function Rented()
    {
        $this->CheckAcess();
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/library_rented_books_view');
        $this->load->view('pages/user/footer_view');
    }

    public function Pending()
    {
        $this->CheckAcess();
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/library_pending_books_view');
        $this->load->view('pages/user/footer_view');
    }

    public function Virtual()
    {
        $this->CheckAcess();
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/library_virtual_books_view');
        $this->load->view('pages/user/footer_view');
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
