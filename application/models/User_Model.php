<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_Model extends CI_Model
{
	// Logar-se
	public function login($email, $password)
	{
		$this->db->select('*, p.nome as usuario_nome, t.nome as nome_turma');
		$this->db->from('Pessoa p');
		$this->db->where('email', $email);
		$this->db->where('password', $password);
		$this->db->limit(1);
		$this->db->join('Aluno a', 'a.fk_matricula=p.matricula', 'left');
		$this->db->join('Serie_Escolar se', 'se.cod_serie_escolar=a.fk_serie', 'left');
		$this->db->join('Aluno_Turma at', 'at.fk_aluno=p.matricula AND fk_ano_turma='.date("Y"), 'left');
		$this->db->join('Turma t', 't.cod_turma=at.fk_turma', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Boletim do aluno
	public function GetBoletim($userId, $year)
	{
		$this->db->select('*, COUNT(b.fk_aluno) as num_boletins, b.situacao as boletim_situacao, t.nome as turma_nome, d.nome as nome_disciplina, at.situacao as aluno_turma_situacao, COUNT(f.idFalta) as num_faltas');
		$this->db->from('Boletim b');
		$this->db->where('b.fk_aluno', $userId);
		$this->db->where('b.ano', $year);
		$this->db->limit(1);
		$this->db->join('Turma t', 't.cod_turma=b.fk_turma', 'left');
		$this->db->join('Aluno_Turma at', 'at.fk_turma=b.fk_turma', 'left');
		$this->db->join('Disciplina d', 'd.cod_disciplina=b.fk_disciplina', 'left');
		$this->db->join('Serie_Escolar se', 'se.cod_serie_escolar=t.fk_serie_escolar', 'left');
		$this->db->join('Falta f', 'f.fk_aluno='.$userId.' AND f.fk_turma=b.fk_turma', 'left');
		$query = $this->db->get();
		$result = $query->result_array();
		if($result[0]['num_boletins'])
			return $result;
		else
			return false;
	}

	// Notas do aluno
	public function GetNota($userId, $year, $disciplineId, $bimestre)
	{
		$this->db->select('*');
		$this->db->from('Prova p');
		$this->db->where('fk_aluno', $userId);
		$this->db->where('fk_disciplina', $disciplineId);
		$this->db->where('ano', $year);
		$this->db->where('bimestre', $bimestre);
		$this->db->join('Professor pr', 'pr.fk_matricula=p.fk_professor', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Lista de provas aplicadas a turma.
	public function GetListProvas($userId, $disciplineId, $turmaId, $year)
	{
		$this->db->select('*');
		$this->db->from('Prova p');
		$this->db->where('fk_professor', $userId);
		$this->db->where('fk_disciplina', $disciplineId);
		$this->db->where('fk_turma', $turmaId);
		$this->db->where('ano', $year);
		$this->db->group_by('prova'); 
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Prova aplicada a estudantes de uma turma.
	public function GetListStudentNotes($userId, $disciplineId, $turmaId, $year, $note, $bimestre)
	{
		$this->db->select('*');
		$this->db->from('Aluno_Turma at');
		$this->db->where('at.fk_turma', $turmaId);
		$this->db->where('at.fk_ano_turma', $year);
		$this->db->where('bimestre', $bimestre);
		$this->db->join('Pessoa pa', 'pa.matricula=at.fk_aluno', 'left');
		$this->db->join('Prova p', 'p.fk_aluno=at.fk_aluno AND p.fk_turma=at.fk_turma AND p.fk_disciplina='.$disciplineId.' AND fk_ano_turma=at.fk_ano_turma AND prova='.$note, 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Todas as disciplinas
	public function GetDisciplines()
	{
		$this->db->select('*');
		$this->db->from('Disciplina d');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Turma do aluno
	public function GetStudentClassRoom($userId, $year)
	{
		$this->db->select('*');
		$this->db->from('Aluno_Turma at');
		$this->db->where('fk_aluno', $userId);
		$this->db->where('fk_ano_turma', $year);
		$this->db->limit(1);
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array()[0]['fk_turma'];

		return NULL;
	}

	// Disciplinas do aluno
	public function GetStudentDisciplines($userId, $year)
	{
		$this->db->select('*');
		$this->db->from('Aluno_Turma at');
		$this->db->where('at.fk_aluno', $userId);
		$this->db->where('at.fk_ano_turma', $year);
		$this->db->join('Turma_Disciplina td', 'td.fk_turma=at.fk_turma AND td.fk_ano_turma=at.fk_ano_turma', 'left');
		$this->db->join('Disciplina d', 'd.cod_disciplina=td.fk_disciplina', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Disciplinas do professor
	public function GetTeacherDisciplines($userId, $year)
	{
		$this->db->select('*');
		$this->db->from('Turma_Disciplina td');
		$this->db->where('fk_professor', $userId);
		$this->db->where('fk_ano_turma', $year);
		$this->db->group_by('fk_disciplina'); 
		$this->db->join('Disciplina d', 'd.cod_disciplina=td.fk_disciplina', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();

		return NULL;
	}

	// Turmas do professor
	public function GetTeacherTurmas($userId, $year)
	{
		$this->db->select('*');
		$this->db->from('Turma_Disciplina td');
		$this->db->where('fk_professor', $userId);
		$this->db->where('fk_ano_turma', $year);
		$this->db->group_by('fk_turma'); 
		$this->db->join('Turma t', 't.cod_turma=td.fk_turma', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();

		return NULL;
	}

	// Estudantes da turma do aluno
	public function GetStudents($userId, $year)
	{
		$fk_turma = $this->GetStudentClassRoom($userId, $year);
		if($fk_turma)
		{
			$this->db->select('*');
			$this->db->from('Aluno_Turma at');
			$this->db->where('fk_turma', $fk_turma);
			$this->db->join('Pessoa p', 'p.matricula=at.fk_aluno', 'left');
			$query = $this->db->get();
			if($query->num_rows() != 0)
				return $query->result_array();
		}
		return false;
	}

	// Estudantes da turma
	public function GetStudents2($turmaId)
	{
		$this->db->select('*');
		$this->db->from('Aluno_Turma at');
		$this->db->where('fk_turma', $turmaId);
		$this->db->join('Pessoa p', 'p.matricula=at.fk_aluno', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
	}

	// Agenda do aluno
	public function GetShedule($userId, $year)
	{
		$fk_turma = $this->GetStudentClassRoom($userId, $year);
		$this->db->select('*, p.nome as nome_professor, d.nome as nome_disciplina');
		$this->db->from('Turma_Disciplina td');
		$this->db->where('fk_turma', $fk_turma);
		$this->db->where('fk_ano_turma', $year);
		$this->db->join('Disciplina d', 'd.cod_disciplina=td.fk_disciplina', 'left');
		$this->db->join('Pessoa p', 'p.matricula=td.fk_professor', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Agenda professor
	public function GetShedule2($userId, $year)
	{
		$this->db->select('*, d.nome as nome_disciplina, t.nome as nome_turma');
		$this->db->from('Turma_Disciplina td');
		$this->db->where('fk_professor', $userId);
		$this->db->where('fk_ano_turma', $year);
		$this->db->join('Disciplina d', 'd.cod_disciplina=td.fk_disciplina', 'left');
		$this->db->join('Turma t', 't.cod_turma=td.fk_turma', 'left');
		$this->db->order_by("hora", "asc");
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Disciplinas do aluno
	public function GetDisciplinesClassRoom($userId, $year)
	{
		$fk_turma = $this->GetStudentClassRoom($userId, $year);
		$this->db->select('*, p.nome as nome_professor, d.nome as nome_disciplina');
		$this->db->from('Turma_Disciplina td');
		$this->db->where('fk_turma', $fk_turma);
		$this->db->where('fk_ano_turma', $year);
		$this->db->join('Disciplina d', 'd.cod_disciplina=td.fk_disciplina', 'left');
		$this->db->join('Pessoa p', 'p.matricula=td.fk_professor', 'left');
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	// Disciplinas do professor
	public function GetDisciplinesClassRoom2($userId, $year)
	{
		$this->db->select('*, t.nome as nome_turma, d.nome as nome_disciplina');
		$this->db->from('Turma_Disciplina td');
		$this->db->where('td.fk_professor', $userId);
		$this->db->where('fk_ano_turma', $year);
		$this->db->join('Disciplina d', 'd.cod_disciplina=td.fk_disciplina', 'left');
		$this->db->join('Turma t', 't.cod_turma=td.fk_turma', 'left');
		$this->db->join('Professor_Disciplina pd', 'pd.fk_disciplina=td.fk_disciplina AND pd.fk_professor=td.fk_professor', 'left');
		$this->db->order_by("nome_turma", "asc");
		$query = $this->db->get();
		if($query->num_rows() != 0)
			return $query->result_array();
		else
			return false;
	}

	public function SaveNotes($userId, $turmaId, $disciplineId, $prova, $noteMax, $bimestre, $year, $users, $notes, $descriptions)
	{
		for ($i=0; $i < sizeof($users); $i++)
		{ 
			$this->db->select('idProva');
			$this->db->from('Prova p');
			$this->db->where('fk_aluno', $users[$i]);
			$this->db->where('fk_professor', $userId);
			$this->db->where('fk_turma', $turmaId);
			$this->db->where('fk_disciplina', $disciplineId);
			$this->db->where('prova', $prova);
			$this->db->where('ano', $year);
			$this->db->where('bimestre', $bimestre);
			$query = $this->db->get();
			$data = array(
				'fk_aluno' => $users[$i],
				'fk_turma' => $turmaId,
				'fk_professor' => $userId,
				'fk_disciplina' => $disciplineId,
				'prova' => $prova,
				'bimestre' => $bimestre,
				'nota_maxima' => $noteMax,
				'nota' => $notes[$i],
				'descricao' => $descriptions[$i],
				'ano' => $year,
			);
			if($query->num_rows() != 0)
			{
				$this->db->where('idProva', $query->result_array()[0]['idProva']);
				$this->db->update('Prova', $data);
			}
			else
				$this->db->insert('Prova', $data);
		}
	}
}