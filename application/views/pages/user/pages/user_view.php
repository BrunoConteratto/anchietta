		<div class="row breadcrumb user-breadcrumb">
	        <ul>
	            <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
	            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Pagina inicial.</li>
	        </ul>
		</div>
		<br>

		<div class="row user-panel">
			<div class="col-md-4 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
				<h4>Bem-Vindo, <strong><?php echo $this->session->userdata('name'); ?></strong></h4>
				<h6>Ano: <?php echo date("Y"); ?></h6>
				<h6>Bimestre: 1º</h6>
				<?php
					if($this->session->userdata('access_level') == 0)
					{
						echo "<h6>".$this->session->userdata('serie_school')." escolar.</h6>";
						echo "<h6>Turma: ".$this->session->userdata('name_turma')."</h6>";
						switch ($this->session->userdata('situation')) {
							case '':
								echo "<h6>Situação: Esperando fechamento de notas.</h6>";
								break;
							case 'REPROVADO':
							    echo "<h6>Situação: Reprovado.</h6>";
							    break;
							case 'APROVADO':
							    echo "<h6>Situação: Aprovado.</h6>";
							    break;
							case 'APROVADO2':
							    echo "<h6>Situação: Aprovado em dependência.</h6>";
							    break;
							default:
							    echo "<h6>Situação: Esperando fechamento de notas.</h6>";
						}
					}
				?>
				<h6>Email: <?php echo $this->session->userdata('email'); ?></h6>
				<h6>Matricula: <?php echo $this->session->userdata('id'); ?></h6>
				<h6>Data de entrada: <?php echo $this->session->userdata('date_entry'); ?></h6>