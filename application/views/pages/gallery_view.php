	<div class="row breadcrumb">
        <ul>
            <li><a href="<?php echo base_url("Home"); ?>">Início</a></li>
            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Galeria de fotos e videos.</li>
        </ul>
	</div>

	<br>

	<div class="row">
		<div class="col-xs-1 col-sm-1 col-md-1 col-lg-1"></div>

		<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
			<div class="btn-group gallery-year" role="group">
				<button type="button" class="btn btn-Dark">-</button>
				<input type="text" class="form-control" value="2018" disabled>
				<button type="button" class="btn btn-Dark">+</button>
			</div>
			<div class="sidenav-gallery">
				<button class="dropdown-btn">
					<i class="fa fa-camera"></i> Fotos 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<?php
						foreach ($gallerys_photo as $value)
							echo "<a onclick=\"loadGallery(this, ".$value['id'].");\">".$value['nome']."</a>";
					?>
				</div>

				<button class="dropdown-btn">
					<i class="fa fa-video"></i> Videos 
					<i class="fa fa-caret-down"></i>
				</button>
				<div class="dropdown-container">
					<?php
						foreach ($gallerys_video as $value)
							echo "<a onclick=\"loadGallery(this, ".$value['id'].");\">".$value['nome']."</a>";
					?>
				</div>
			</div>
		</div>

		<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
			<div class="row gallery_header">
				<p>Filtragem de fotos para a galeria: <?php echo $gallerys_photo[0]['nome']; ?>.</p>
				<i><?php echo sizeof($gallerys_midia); ?> registros.</i>
			</div>
			<hr>
			<div class="row gallery">
				<?php
					foreach ($gallerys_midia as $value)
					{
						echo "
							<div class=\"col-xs-2 col-sm-2 col-md-2 col-lg-2\">
								<img src=\"".base_url($value['source'])."\">
							</div>
						";
					}
				?>
			</div>
		</div>
	</div>

<script>

function StartDropdown(element) {
	var dropdown = document.getElementsByClassName(element);
	for (var i = 0; i < dropdown.length; i++) {
	  dropdown[i].addEventListener("click", function() {
	  	var dropdownContent = this.nextElementSibling;
	  	var visibility = dropdownContent.style.display === "block";
	  	DissableDropdown(element);
	  	if (visibility)
	  	{
	  		this.classList.remove("sidenav_gallery_active");
	  		dropdownContent.style.display = "none";
	  	}
	  	else
	  	{
	  		this.classList.toggle("sidenav_gallery_active");
	  		dropdownContent.style.display = "block";
	  	}
	  });
	}
}
StartDropdown("dropdown-btn");
function DissableDropdown(element) {
	var dropdown = document.getElementsByClassName(element);
	for (var i = 0; i < dropdown.length; i++) {
	    dropdown[i].classList.remove("sidenav_gallery_active");
	    var dropdownContent = dropdown[i].nextElementSibling;
	    dropdownContent.style.display = "none";
	}
}
</script>