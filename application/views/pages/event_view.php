	<div class="row breadcrumb">
        <ul>
            <li><a href="<?php echo base_url("Home"); ?>">Início</a></li>
            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Agenda de eventos</li>
        </ul>
	</div>

	<br>

	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<div class="row icon_event">
				<i class="fa fa-2x fa-calendar-alt"></i>
				<h3>Eventos</h3>
			</div>
			<div id="datetimepickerhome"></div>
		</div>

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="row event_header">
				<p>Filtragem de eventos para o mês de novembro.</p>
				<i>1 registros.</i>
			</div>
			<hr>
			<div class="row event">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img src="<?php echo base_url("assets/images/150x150.png"); ?>">
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<h3><u>Desfile Civico</u></h3>
					<p><i class="fa fa-clendar"></i> Data de realização:</p>
					<p>de 21/11/2018 13:00</p>
					<p>Até 21/11/2018 13:00</p>
					<p><i class="fa fa-map-marker-alt"></i> Local: <strong>Praça Chiapetta</strong></p>
					<button class="btn btn-primary"><i class="fa fa-plus"></i> Saiba mais</button>
				</div>
			</div>

			<hr>

			<div class="row event">
				<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
					<img src="<?php echo base_url("assets/images/150x150.png"); ?>">
				</div>
				<div class="col-xs-9 col-sm-9 col-md-9 col-lg-9">
					<h3><u>Desfile Civico</u></h3>
					<p><i class="fa fa-clendar"></i> Data de realização:</p>
					<p>de 21/11/2018 13:00</p>
					<p>Até 21/11/2018 13:00</p>
					<p><i class="fa fa-map-marker-alt"></i> Local: <strong>Praça Chiapetta</strong></p>
					<button class="btn btn-primary"><i class="fa fa-plus"></i> Saiba mais</button>
				</div>
			</div>
		</div>
	</div>


<script type="text/javascript">
    $(function () {

    	// https://uxsolutions.github.io/bootstrap-datepicker/?markup=embedded&format=&weekStart=&startDate=&endDate=&startView=0&minViewMode=0&maxViewMode=4&todayBtn=false&clearBtn=false&language=pt-BR&orientation=auto&multidate=&multidateSeparator=&keyboardNavigation=on&forceParse=on#sandbox
    	$('#datetimepickerhome').datepicker({
		    format: 'dd/mm/yyyy',                
		    language: 'pt-BR',
		    daysOfWeekHighlighted: "0,6",
		    todayHighlight: true,
		    clearBtn: true,
		    beforeShowDay: function(date){
		                  if (date.getMonth() == (new Date()).getMonth())
		                    switch (date.getDate()){
		                      case 4:
		                        return {
		                          tooltip: 'Evento aleatorio',
		                          classes: 'active'
		                        };
		                      case 8:
		                        return false;
		                      case 12:
		                        return "green";
		                  }
		                },
		}).on('changeDate', function(ev){
			if (ev.date != null)
				alert(ev.date.toLocaleDateString());
		});
    });
</script>