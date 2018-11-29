<div id="user-students">
<?php
if (empty($data))
{
?>
	<div class="alert alert-warning row" role="alert">
		<strong>Turma!</strong> Não há alunos em sua turma neste ano.
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
				      <th scope="col"># Matricula</th>
				      <th scope="col">Foto</th>
				      <th scope="col">Nome</th>
				      <th scope="col">Email</th>
						<?php
						if($this->session->userdata('access_level') == 1)
							echo "<th scope=\"col\">Opções</th>";
						?>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php
				  		foreach ($data as $value)
				  		{
				  			echo "<tr>";
				  			echo "<th scope=\"row\">".$value['matricula']."</th>";
				  			echo "<td><img class=\"user-photo\" src=\"".base_url("assets/images/user.png")."\"></td>";
				  			echo "<td>".$value['nome']."</td>";
				  			echo "<td>".$value['email']."</td>";
							if($this->session->userdata('access_level') == 1)
								echo "<td>Notas - Faltas</td>";
							echo "</tr>";
				  		}
				  	?>
				  </tbody>
				</table>
			</div>

<?php
}
?>
</div>