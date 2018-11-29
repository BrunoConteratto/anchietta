<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Note extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
        $this->config->load('config_anchietta', FALSE, TRUE);
        $this->load->model('Message_Model', 'message');
        $this->load->model('User_Model', 'user');
    }

	public function index()
	{
        $this->CheckAcess();
        $result['disciplines'] = NULL;
        $result['data'] = NULL;
        if($this->session->userdata('access_level') == 0)
        {
            $result['disciplines'] = $this->user->GetStudentDisciplines($this->session->userdata('id'), date("Y"));
            if(!empty($result['disciplines']))
                $result['data'] = $this->user->GetNota($this->session->userdata('id'), date("Y"), $result['disciplines'][0]['cod_disciplina'], 1);
        }
        elseif($this->session->userdata('access_level') == 1)
        {
            $result['disciplines'] = $this->user->GetTeacherDisciplines($this->session->userdata('id'), date("Y"));
            $result['turmas'] = $this->user->GetTeacherTurmas($this->session->userdata('id'), date("Y"));
        }

        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/notes_view', $result);
        $this->load->view('pages/user/footer_view');
	}

    public function search()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $discipline = $this->input->post('disciplineId');
        $turma = $this->input->post('turmaId');
        $prova = $this->input->post('note');
        $bimestre = $this->input->post('bimestre');
        $result['data'] = NULL;
        if($year > 2000 && $year < 2100)
        {
            if($this->session->userdata('access_level') == 0)
                $result['data'] = $this->user->GetNota($this->session->userdata('id'), $year, $discipline, $bimestre);
            elseif($this->session->userdata('access_level') == 1)
                $result['data'] = $this->user->GetListStudentNotes($this->session->userdata('id'), $discipline, $turma, $year, $prova, $bimestre);
        }

        $this->load->view('pages/user/pages/note_struct_view', $result);
    }

    public function GetDisciplines()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $result['disciplines'] = NULL;
        if($year > 2000 && $year < 2100)
        {
            if ($this->session->userdata('access_level') == 0)
                $result['disciplines'] = $this->user->GetStudentDisciplines($this->session->userdata('id'), $year);
            elseif ($this->session->userdata('access_level') == 1)
                $result['disciplines'] = $this->user->GetTeacherDisciplines($this->session->userdata('id'), $year);
        }

        echo json_encode($result);
    }

    public function GetListProvas()
    {
        $this->CheckAcess();
        $disciplineId = $this->input->post('disciplineId');
        $turmaId = $this->input->post('turmaId');
        $year = $this->input->post('year');
        $result['provas'] = NULL;
        if($year > 2000 && $year < 2100)
        {
            if ($this->session->userdata('access_level') == 1)
                $result['provas'] = $this->user->GetListProvas($this->session->userdata('id'), $disciplineId, $turmaId, $year);
        }
        echo json_encode($result);
    }

    public function SaveNotes()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $turmaId = $this->input->post('turmaId');
        $disciplineId = $this->input->post('disciplineId');
        $prova = $this->input->post('prova');
        $bimestre = $this->input->post('bimestre');
        $noteMax = $this->input->post('noteMax');
        $users = json_decode($this->input->post('users'));
        $notes = json_decode($this->input->post('notes'));
        $descriptions = json_decode($this->input->post('descriptions'));
        $this->user->SaveNotes($this->session->userdata('id'), $turmaId, $disciplineId, $prova, $noteMax, $bimestre, $year, $users, $notes, $descriptions);
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
