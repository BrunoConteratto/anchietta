		<!-- https://bootsnipp.com/snippets/featured/responsive-navigation-menu -->
		<div class="nav-side-menu">
		    <div class="brand">
		    	<a href="<?php echo base_url("home"); ?>">
		    		<img src="<?php echo base_url("assets/images/logo_blank.png"); ?>">
		    	</a>
		    	<p><?php echo $this->session->userdata('name'); ?></p>
		    </div>
		    <i class="fa fa-bars fa-2x toggle-btn" data-toggle="collapse" data-target="#menu-content"></i>
		  
		        <div class="menu-list">
		  
		            <ul id="menu-content" class="menu-content collapse out">
		                <li class="active">
		                  <a href="<?php echo base_url("user"); ?>">
		                  	<i class="fa fa-home fa-lg"></i> Inicio
		                  </a>
		                </li>

		                <li  data-toggle="collapse" data-target="#products" class="collapsed">
		                  <a href="#"><i class="fa fa-users fa-lg"></i> Turma <span class="arrow"></span></a>
		                </li>
		                <ul class="sub-menu collapse" id="products">
		                    <li class="active"><a href="<?php echo base_url("user/classroom/discipline"); ?>">Disciplinas</a></li>
		                    <li><a href="<?php echo base_url("user/classroom/student"); ?>">Alunos</a></li>
		                    <li><a href="<?php echo base_url("user/classroom/schedule"); ?>">Aulas</a></li>
		                </ul>

		                <li>
		                  <a href="<?php echo base_url("user/note"); ?>"><i class="fa fa-child fa-lg"></i> Notas</a>
		                </li>

		                <li data-toggle="collapse" data-target="#new" class="collapsed">
		                  <a href="#"><i class="fa fa-book fa-lg"></i> Biblioteca <span class="arrow"></span></a>
		                </li>
		                <ul class="sub-menu collapse" id="new">
		                  <li><a href="<?php echo base_url("user/library/rented"); ?>"> Livros Retirados</a></li>
		                  <li><a href="<?php echo base_url("user/library/pending"); ?>"> Pendencias</a></li>
		                  <li><a href="<?php echo base_url("user/library/virtual"); ?>"> Virtual</a></li>
		                </ul>

		                 <li>
		                  <a href="<?php echo base_url("user/registration"); ?>"><i class="fa fa-id-card fa-lg"></i> Matricula</a>
		                 </li>

						<?php
						if($this->session->userdata('access_level') == 0)
						{
						?>
		                 <li>
		                  <a href="<?php echo base_url("user/boletim"); ?>"><i class="fa fa-graduation-cap fa-lg"></i> Boletim</a>
		                 </li>
		                 <?php 
		             	}
						?>
		                  <li>
		                  <a href="<?php echo base_url("user/user/logout"); ?>">
		                  <i class="fa fa-sign-out fa-lg"></i> Sair
		                  </a>
		                 </li>
		            </ul>
		     </div>
		</div>