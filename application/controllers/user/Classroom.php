<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Classroom extends CI_Controller
{
    public function __construct()
    {
    	parent::__construct();
        $this->load->model('Message_Model', 'message');
        $this->load->model('User_Model', 'user');
    }

	public function index()
	{
        $this->CheckAcess();
        redirect(base_url("user/home"));
	}

    public function Schedule()
    {
        $this->CheckAcess();
        $result['data'] = NULL;
        if($this->session->userdata('access_level') == 0)
            $result['data'] = $this->user->GetShedule($this->session->userdata('id'), date("Y"));
        elseif($this->session->userdata('access_level') == 1)
            $result['data'] = $this->user->GetShedule2($this->session->userdata('id'), date("Y"));
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/class_rooms_view', $result);
        $this->load->view('pages/user/footer_view');
    }

    public function Student()
    {
        $this->CheckAcess();
        $result['data'] = NULL;
        if($this->session->userdata('access_level') == 0)
            $result['data'] = $this->user->GetStudents($this->session->userdata('id'), date("Y"));
        elseif($this->session->userdata('access_level') == 1)
            $result['turmas'] = $this->user->GetTeacherTurmas($this->session->userdata('id'), date("Y"));
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/class_student_view', $result);
        $this->load->view('pages/user/footer_view');
    }

    public function Discipline()
    {
        $this->CheckAcess();
        $result['data'] = NULL;
        if($this->session->userdata('access_level') == 0)
            $result['data'] = $this->user->GetDisciplinesClassRoom($this->session->userdata('id'), date("Y"));
        elseif($this->session->userdata('access_level') == 1)
            $result['data'] = $this->user->GetDisciplinesClassRoom2($this->session->userdata('id'), date("Y"));
        $this->load->view('header_view');
        $this->load->view('pages/user/header_nav_view');
        $this->load->view('pages/user/pages/class_discipline_view', $result);
        $this->load->view('pages/user/footer_view');
    }

    public function FilterStudent()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $turma = $this->input->post('turma');
        $result['data'] = NULL;
        if($year > 2000 && $year < 2100)
        {
            if($this->session->userdata('access_level') == 0)
                $result['data'] = $this->user->GetStudents($this->session->userdata('id'), $year);
            if($this->session->userdata('access_level') == 1)
                $result['data'] = $this->user->GetStudents2($turma);
        }

        $this->load->view('pages/user/pages/class_student_struct_view', $result);
    }

    public function FilterSchedule()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $result['data'] = NULL;
        if($year > 2000 && $year < 2100)
        {
            if($this->session->userdata('access_level') == 0)
                $result['data'] = $this->user->GetShedule($this->session->userdata('id'), $year);
            if($this->session->userdata('access_level') == 1)
                $result['data'] = $this->user->GetShedule2($this->session->userdata('id'), $year);
        }

        $this->load->view('pages/user/pages/class_rooms_struct_view', $result);
    }

    public function FilterDiscipline()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $result['data'] = NULL;
        if($year > 2000 && $year < 2100)
        {
            if($this->session->userdata('access_level') == 0)
                $result['data'] = $this->user->GetDisciplinesClassRoom($this->session->userdata('id'), $year);
            elseif($this->session->userdata('access_level') == 1)
                $result['data'] = $this->user->GetDisciplinesClassRoom2($this->session->userdata('id'), $year);
        }

        $this->load->view('pages/user/pages/class_discipline_struct_view', $result);
    }

    public function GetTeacherTurmas()
    {
        $this->CheckAcess();
        $year = $this->input->post('year');
        $result['turmas'] = NULL;
        if($year > 2000 && $year < 2100)
            $result['turmas'] = $this->user->GetTeacherTurmas($this->session->userdata('id'), $year);

        echo json_encode($result);
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
