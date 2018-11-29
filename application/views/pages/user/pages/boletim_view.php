			<div class="row breadcrumb user-breadcrumb">
		        <ul>
		            <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
		            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Boletim escolar.</li>
		        </ul>
			</div>
			<br>

			<div class="row user-panel">
				<div class="col-md-4 col-lg-3"></div>
				<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
					<div class="row btn-group gallery-year" role="group">
						<button type="button" class="btn btn-Dark" onclick="searchBoletim(-1);"><strong>-</strong></button>
						<input id="boletimDate" type="text" class="form-control" value="<?php echo date("Y"); ?>" disabled>
						<button type="button" class="btn btn-Dark" onclick="searchBoletim(1);"><strong>+</strong></button>
						<button type="button" class="btn btn-primary" onclick="printDiv('user-boletim');"><i class="fa fa-print"></i> Imprimir</button>
						<button type="button" class="btn btn-info" onclick="savePDF('user-boletim', this, 1.2, 4, 1);"><i class="fa fa-file-pdf-o"></i> Salvar PDF</button>
					</div>
					<?php
						$result['data'] = $data;
						$this->load->view('pages/user/pages/boletim_struct_view', $result);
					?>
			<br><br><br>