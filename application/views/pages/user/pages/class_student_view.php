		<div class="row breadcrumb user-breadcrumb">
	        <ul>
	            <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
	            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Turma <i class="fa fa-angle-right breadcrumb-icon-space"></i> Meus colegas.</li>
	        </ul>
		</div>
		<br>

		<div class="row user-panel">
			<div class="col-md-4 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
				<div class="row btn-group gallery-year" role="group">
					<button type="button" class="btn btn-Dark" onclick="searchClassStudent(-1);"><strong>-</strong></button>
					<input type="text" class="form-control" id="filter-year" value="<?php echo date("Y"); ?>" disabled>
					<button type="button" class="btn btn-Dark" onclick="searchClassStudent(1);"><strong>+</strong></button>
					<?php
					if($this->session->userdata('access_level') == 1)
					{
						echo "<select id=\"TurmaList\" class=\"form-control\" onchange=\"searchClassStudent(0);\">";
						echo "<option value=\"-1\">SELECIONE</option>";
						foreach ($turmas as $value)
							echo "<option value=\"".$value['fk_turma']."\">".$value['nome']."</option>";

						echo "</select>";
					}
					?>
				</div>
				<?php
					$result['data'] = $data;
					$this->load->view('pages/user/pages/class_student_struct_view', $result);
				?>
