<div class="bg-faded">
  <a href="<?php echo base_url(); ?>"><img class="logo" src="<?php echo base_url("assets/images/logo.png"); ?>"></a>
</div>

<nav class="navbar navbar-expand-lg nav-header navbar-toggleable-md navbar-dark bg-dark bg-faded nav-header-padding">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarColor02" aria-controls="navbarColor02" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#"><strong>Anchiett@</strong></a>

    <div class="collapse navbar-collapse" id="navbarColor02">
      <ul class="navbar-nav mr-auto">
        <li class="nav-item active">
          <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("home"); ?>">Inicio <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
          <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("notice"); ?>">Noticias</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("event"); ?>">Eventos</a>
        </li>
                <li class="nav-item">
          <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("gallery"); ?>">Galeria</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("mec"); ?>">MEC</a>
        </li>
        <li class="nav-item">
          <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("home"); ?>">Corpo Docente</a>
        </li>
      </ul>

	  <ul class="navbar-nav nav-header-right nav-header-right-padding">
	    <li class="nav-item">
	      <?php
	      	if($this->session->userdata('logged_in'))
	      		if($this->session->userdata('access_level') > 0)
	      			echo '<a class="nav-link hvr-shutter-out-horizontal-red nav-header-right-user-loged" href="'.base_url("admin/dashboard").'"><i class="fa fa-user"></i></a>';
	      		else
	      			echo '<a class="nav-link hvr-shutter-out-horizontal-red nav-header-right-user-loged" href="'.base_url("user/login").'"><i class="fa fa-user"></i></a>';
	      	else
	      		echo '<a class="nav-link hvr-shutter-out-horizontal-red" href="'.base_url("user/login").'"><i class="fa fa-user"></i></a>';
	      ?>
	      <a class="nav-link hvr-shutter-out-horizontal" href="<?php echo base_url("contact"); ?>"><i class="fa fa-phone"></i></a>
	      <a class="nav-link hvr-shutter-out-horizontal" href="#" onclick="googleTranslateElementInit();" data-toggle="modal" data-target="#ModalLanguage"><i class="fa fa-language"></i></a>
	    </li>
	  </ul>

      <form class="form-inline">
    		<div class="input-group">
    			<input type="text" class="form-control" placeholder="Pesquisar por...">
    			<span class="input-group-btn">
    				<button class="btn btn-secondary" type="button"><i class="fa fa-search"></i></button>
    			</span>
    		</div>
      </form>
    </div>
</nav>