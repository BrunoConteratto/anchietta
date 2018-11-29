<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Gallery_Model extends CI_Model
{
	public function GetGallerys($year, $type)
	{
		$this->db->select('*');
		$this->db->from('Galeria');
		$this->db->where('ano', $year);
		$this->db->where('tipo', $type);
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	public function GetGalleryMidia($galleryId)
	{
		$this->db->select('*');
		$this->db->from('Galeria_Midia');
		$this->db->where('fk_galeria', $galleryId);
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return array();
	}
}