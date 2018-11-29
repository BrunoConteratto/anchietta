<div id="user-classroom">
<?php
if (empty($data))
{
?>
	<div class="alert alert-warning row" role="alert">
		<strong>Agenda!</strong> Não há aulas em sua turma neste ano.
	</div>
<?php
}
else
{
?>
				<div class="table-responsive">
					<?php
						$week[0] = array();
						$week[1] = array();
						$week[2] = array();
						$week[3] = array();
						$week[4] = array();
						$week[5] = array();
						$week[6] = array();
						foreach ($data as $value)
						{
							if($value['dia_semana'] == "SEGUNDA")
								array_push($week[0], $value);
							elseif($value['dia_semana'] == "TERÇA")
								array_push($week[1], $value);
							elseif($value['dia_semana'] == "QUARTA")
								array_push($week[2], $value);
							elseif($value['dia_semana'] == "QUINTA")
								array_push($week[3], $value);
							elseif($value['dia_semana'] == "SEXTA")
								array_push($week[4], $value);
							elseif($value['dia_semana'] == "SÁBADO")
								array_push($week[5], $value);
							elseif($value['dia_semana'] == "DOMINGO")
								array_push($week[6], $value);
						}

						for ($i=0; $i < sizeof($week); $i++)
						{
							if(!empty($week[$i])){
						?>
							<table class="table table-striped">
								<thead class="thead-dark">
									<tr>
										<th>
											<?php echo $week[$i][0]['dia_semana']; ?>
										</th>
									</tr>
								</thead>
							  <thead class="thead-dark">
							    <tr>
							      <th scope="col">Hora</th>
							      <th scope="col">Turno</th>
							      <th scope="col">Nome</th>
							      <th scope="col">Turma</th>
							      <th scope="col">Sala</th>
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
										<th scope=\"col\">Opções</th>
										";
									}
									?>
							    </tr>
							  </thead>
								  <tbody>

									<?php
										foreach ($week[$i] as $value)
										{
											echo "<tr>";
									?>
								      		<th scope="row"><?php echo $value['hora']; ?></th>
								      		<td><?php echo $value['turno']; ?></td>
								      		<td><?php echo $value['nome_disciplina']; ?></td>
								      		<?php
												if($this->session->userdata('access_level') == 0)
													echo "<td>".$this->session->userdata('name_turma')."</td>";
												elseif($this->session->userdata('access_level') == 1)
									  				echo "<td>".$value['nome_turma']."</td>";
								      		?>
								      		
								      		<td><?php echo $value['sala']; ?></td>
										<?php
										if($this->session->userdata('access_level') == 0)
										{
											echo "
												<td>".$value['nome_professor']."</td>
												<td>100%</td>
											";
										}
										elseif($this->session->userdata('access_level') == 1)
											echo "<td>Fazer Chamada</td>";
										?>

						<?php
											echo "</tr>";
										}
								echo "</tbody></table>";
							}
						}
						?>
				</div>
<?php
}
?>
</div>