		<div class="row breadcrumb user-breadcrumb">
	        <ul>
	            <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
	            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Turma <i class="fa fa-angle-right breadcrumb-icon-space"></i> Grade de horários.</li>
	        </ul>
		</div>
		<br>

		<div class="row user-panel">
			<div class="col-md-4 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
				<div class="row btn-group gallery-year" role="group">
					<button type="button" class="btn btn-Dark" onclick="searchClassRooms(-1);"><strong>-</strong></button>
					<input type="text" class="form-control" id="filter-year" value="<?php echo date("Y"); ?>" disabled>
					<button type="button" class="btn btn-Dark" onclick="searchClassRooms(1);"><strong>+</strong></button>
				</div>
				<?php
					$result['data'] = $data;
					$this->load->view('pages/user/pages/class_rooms_struct_view', $result);
				?>