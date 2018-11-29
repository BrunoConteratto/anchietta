<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
    	$this->config->load('config_anchietta', FALSE, TRUE);
    	$this->load->model('Gallery_Model', 'gallery');
    }

	public function index()
	{
		$result['gallerys_photo'] = $this->gallery->GetGallerys(date("Y"), 1);
		$result['gallerys_video'] = $this->gallery->GetGallerys(date("Y"), 2);
		$result['gallerys_midia'] = array();
		if (!empty($result['gallerys_photo']))
			$result['gallerys_midia'] = $this->gallery->GetGalleryMidia($result['gallerys_photo'][0]['id']);

		$this->load->view('header_view');
		$this->load->view('pages/header_nav_view');
		$this->load->view('pages/gallery_view', $result);
		$this->load->view('footer_view');
	}
}
