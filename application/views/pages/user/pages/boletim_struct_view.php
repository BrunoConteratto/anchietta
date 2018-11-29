<?php
	if(!$data)
	{
?>
		<div class="alert alert-warning" role=\"alert\">
			<strong>Boletim!</strong> Não há boletim para este ano.
		</div>
<?php
 	}
 	else
	{
?>
		<div class="row user-boletim" id="user-boletim">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 user-boletim-header-left">
					<img src="<?php echo base_url("assets/images/logo.png"); ?>">
				</div>
				<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8">
					<span><strong>ESCOLA ESTADUA DE ENSINO MEDIO ANCHIETTA</strong></span>
					<br>
					<span><strong>SISTEMA INTEGRADO DE GESTÃO DE ENSINO</strong></span>
					<br>
					<p>Emitido em <?php echo date("d/m/Y"); ?> ás <?php echo date('H:i'); ?> Hrs</p>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-2 col-lg-2 user-boletim-header-right">
					<img src="<?php echo base_url("assets/images/logo_mec.png"); ?>">
				</div>
			</div>
			<hr>
			<h3><strong>Boletim Escolar - <?php echo $data[0]['ano']; ?></strong></h3>
			<br>
			<div class="row user-boletim-separator">
				<p>Dados do Aluno</p>
			</div>
			<div class="row user-boletim-data">
				<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8 table-responsive">
					<table class="table">
					  <tbody>
							<tr>
							  <th>Aluno (a): </th>
							  <td><?php echo $this->session->userdata('name'); ?></td>
							</tr>
							<tr>
							  <th>Turma: </th>
							  <td><?php echo $data[0]['turma_nome']; ?></td>
							</tr>
							<tr>
							  <th>Situação Final: </th>
							  <td>
							  	<?php 
									switch ($data[0]['aluno_turma_situacao']) {
										case '':
											echo "Esperando fechamento de notas.";
											break;
									    case 'REPROVADO':
									        echo "Reprovado.";
									        break;
									    case 'APROVADO':
									        echo "Aprovado.";
									        break;
									    case 'APROVADO2':
									        echo "Aprovado em dependência.";
									        break;
									    default:
									        echo "Esperando fechamento de notas.";
									}
								?>
								</td>
							</tr>
					  </tbody>
					</table>
				</div>

				<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4 table-responsive">
					<table class="table">
					  <tbody>
							<tr>
							  <th>Matricula: </th>
							  <td><?php echo $this->session->userdata('id'); ?></td>
							</tr>
							<tr>
							  <th>Ano - Série: </th>
							  <td><?php echo $data[0]['ano']; ?> - <?php echo $data[0]['serie_escolar']; ?></td>
							</tr>
							<tr>
							  <th>Frequencia Final: </th>
							  <td>100%</td>
							</tr>
					  </tbody>
					</table>
				</div>
			</div>
			<div class="row user-boletim-separator">
				<p>Dados dos componentes curriculares</p>
			</div>
			<div class="row table-responsive user-boletim-table">
				<table class="table table-striped">
				  <thead>
				    <tr>
				      <th>Disciplina</th>
				      <th>1º Bimestre</th>
				      <th>2º Bimestre</th>
				      <th>3º Bimestre</th>
				      <th>4º Bimestre</th>
				      <th>Nota</th>
				      <th>Recuperação</th>
				      <th>Nota Final</th>
				      <th>Faltas</th>
				      <th>Situação</th>
				    </tr>
				  </thead>
				  <tbody>
				  		<?php
				  			foreach ($data as $value)
				  			{
				  				echo "
						<tr>
						  <th>".$value['nome_disciplina']."</th>
						  <td>".$value['nota1']."</td>
						  <td>".$value['nota2']."</td>
						  <td>".$value['nota3']."</td>
						  <td>".$value['nota4']."</td>
						  <td>".$value['nota_parcial']."</td>
						  <td>".$value['nota_recuperacao']."</td>
						  <td>".$value['nota_final']."</td>
						  <td>".$value['num_faltas']."</td>";
								switch ($value['situacao']) {
									case 'APROVADO':
										echo "<td>A</td>";
										break;
								    case 'APROVADO2':
								        echo "<td>AD</td>";
								        break;
								    case 'REPROVADO':
								        echo "<td>R</td>";
								        break;
								    default:
								        echo "<td>?";
								}

				  			}
				  			echo "</tr>";
				  		?>
				  </tbody>
				</table>
			</div>
		</div>
<?php
	}
?>