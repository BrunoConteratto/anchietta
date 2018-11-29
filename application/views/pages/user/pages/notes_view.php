		<div class="row breadcrumb user-breadcrumb">
	        <ul>
	            <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
	            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Minhas provas.</li>
	        </ul>
		</div>
		<br>

		<div class="row user-panel">
			<div class="col-md-4 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
				<div class="row btn-group gallery-year" role="group">
					<button type="button" class="btn btn-Dark" onclick="searchNote(-1);"><strong>-</strong></button>
					<input type="text" id="filter-year" class="form-control" value="<?php echo date("Y"); ?>" disabled>
					<button type="button" class="btn btn-Dark" onclick="searchNote(+1);"><strong>+</strong></button>
					<select class="form-control" id="DisciplinaList" onchange="searchNote(0);">
						<?php
							echo "<option value=\"-1\">SELECIONE</option>";
							foreach ($disciplines as $value)
								echo "<option value=\"".$value['cod_disciplina']."\">".$value['nome']."</option>";
						?>
					</select>
					<?php
					if($this->session->userdata('access_level') == 1)
					{
						echo "<select id=\"TurmaList\" class=\"form-control\" onchange=\"searchNote(0);\">";
						echo "<option value=\"-1\">SELECIONE</option>";
						foreach ($turmas as $value)
							echo "<option value=\"".$value['fk_turma']."\">".$value['nome']."</option>";

						echo "</select>";
						echo "<select id=\"ProvaList\" class=\"form-control\" onchange=\"searchNote(0);\">";
						echo "<option value=\"-1\">SELECIONE</option>";
						echo "</select>";
					}
					?>
					<select class="form-control" id="bimestreList" onchange="searchNote(0);">
						<option value="1">Bimestre 1</option>
						<option value="2">Bimestre 2</option>
						<option value="3">Bimestre 3</option>
						<option value="4">Bimestre 4</option>
					</select>
				</div>
				<?php
					$result['data'] = $data;
					$this->load->view('pages/user/pages/note_struct_view', $result);
				?>
			</div>