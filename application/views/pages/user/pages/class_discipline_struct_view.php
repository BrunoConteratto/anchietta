<div id="user-disciplines">
<?php
if (empty($data))
{
?>
	<div class="alert alert-warning row" role=\"alert\">
		<strong>Disciplinas!</strong> Não há disciplinas em sua turma neste ano.
	</div>
<?php
}
else
{
?>
				<div class="table-responsive">
					<table class="table table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col"># Turma</th>
					      <th scope="col">Disciplina</th>
							<?php
							if($this->session->userdata('access_level') == 0)
							{
								echo "
									<th scope=\"col\">Professor</th>
									<th scope=\"col\">Presença</th>
								";
							}
							elseif($this->session->userdata('access_level') == 1)
							{
								echo "
								<th scope=\"col\">AS</th>
								";
							}
							?>
					      <th scope="col">Opções</th>
					    </tr>
					  </thead>
					  <tbody>
					  	<?php
					  		foreach ($data as $value)
					  		{
					  			echo "<tr>";
								if($this->session->userdata('access_level') == 0)
									echo "<th scope=\"row\">".$this->session->userdata('name_turma')."</th>";
								elseif($this->session->userdata('access_level') == 1)
					  				echo "<th scope=\"row\">".$value['nome_turma']."</th>";
					  			echo "<td>".$value['nome_disciplina']."</td>";
								if($this->session->userdata('access_level') == 0)
								{
									echo "
										<td>".$value['nome_professor']."</td>
										<td>100%</td>
									";
								}
								elseif($this->session->userdata('access_level') == 1)
								{
									echo "
									<td>".$value['aulas_semanais']."</td>
									";
								}
								echo "
									<td>
										<!-- meteriais, conteudo programatico, faltas, questionario, trabalhos -->
										<button type=\"button\" class=\"btn btn-info\"><i class=\"fa fa-folder-open\"></i></button>
										<button type=\"button\" class=\"btn btn-info\"><i class=\"fa fa-calendar\"></i></button>
										<button type=\"button\" class=\"btn btn-info\"><i class=\"fa fa-pencil-square-o\"></i></button>
										<button type=\"button\" class=\"btn btn-info\"><i class=\"fa fa-question-circle\"></i></button>
										<button type=\"button\" class=\"btn btn-info\"><i class=\"fa fa-question-circle\"></i></button>
									</td>
								";
					  		}
					  	?>
					  </tbody>
					</table>
				</div>

<?php
}
?>
</div>