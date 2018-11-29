<div class="table-responsive user-note">
	<table class="table table-striped">
		<?php
		if($this->session->userdata('access_level') == 1 && !empty($data))
		{
		?>
			<div class="row btn-group gallery-year" role="group">
				<button type="button" class="btn btn-primary" onclick="newNote();">Nova Prova</button>
				<button type="button" class="btn btn-warning" onclick="saveNotes();">Atualizar</button>
				<button type="button" class="btn btn-danger" onclick="removeNote();">Excluir</button>
			</div>
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col">Aluno</th>
		      <th scope="col">Maxmimo<br><input type="text" class="form-control" maxlength="3" size="3" value="0" id="notaMaxima"></th>
		      <th scope="col">Nota</th>
		      <th scope="col">Observação</th>
		    </tr>
		  </thead>
		  <tbody id="student-notes-table">
			<?php 
		  		foreach ($data as $value)
		  		{
		  			$note = ($value['nota'] == "" ? 0 : $value['nota']);
		  			echo "<tr id=\"".$value['matricula']."\">";
		  			echo "<th scope=\"row\">".$value['nome']."</th>";
		  			echo "<td><input id=\"noteMax\" type=\"text\" class=\"form-control\" maxlength=\"3\" size=\"3\" value=\"".$value['nota_maxima']."\" disabled></td>";
		  			echo "<td><input id=\"note\" type=\"text\" class=\"form-control\" maxlength=\"3\" size=\"3\" value=\"".$note."\"></td>";
		  			echo "<td><textarea id=\"description\" rows=\"3\" cols=\"50\">".$value['descricao']."</textarea></td>";
		  			echo "</tr>";
		  		}
			 ?>
		  </tbody>
		<?php
		}
		elseif($this->session->userdata('access_level') == 0 && !empty($data))
		{
		?>
		  <thead class="thead-dark">
		    <tr>
		      <th scope="col"># Prova</th>
		      <th scope="col">Bimestre</th>
		      <th scope="col">Maxmimo</th>
		      <th scope="col">Nota</th>
		      <th scope="col">Observação</th>
		    </tr>
		  </thead>
		  <tbody>
		  	<?php
		  		foreach ($data as $value)
		  		{
		  			echo "<tr>";
		  			echo "<th scope=\"row\">".$value['idProva']."</th>";
		  			echo "<td>".$value['bimestre']."</td>";
		  			echo "<td>".$value['nota_maxima']."</td>";
		  			echo "<td>".$value['nota']."</td>";
		  			echo "<td>".$value['descricao']."</td>";
		  			echo "</tr>";
		  		}
			?>
		    <tr>
		  </tbody>
		<?php
		}
		else
		{
		?>
			</table>
			<div class="alert alert-warning" role=\"alert\">
				<strong>Notas!</strong> Não há notas para este ano com esta disciplina / turma.
			</div>
	<?php
		}
	 ?>
</div>