		<div class="row breadcrumb user-breadcrumb">
	        <ul>
	            <li><a href="<?php echo base_url("User"); ?>">Início</a></li>
	            <li><i class="fa fa-angle-right breadcrumb-icon-space"></i> Biblioteca <i class="fa fa-angle-right breadcrumb-icon-space"></i> Livros retirados.</li>
	        </ul>
		</div>
		<br>

		<div class="row user-panel">
			<div class="col-md-4 col-lg-3"></div>
			<div class="col-xs-12 col-sm-12 col-md-7 col-lg-8">
				<div class="row btn-group gallery-year" role="group">
					<button type="button" class="btn btn-Dark"><strong>-</strong></button>
					<input type="text" class="form-control" value="2018" disabled>
					<button type="button" class="btn btn-Dark"><strong>+</strong></button>
				</div>
				<div class="table-responsive">
					<table class="table table-striped">
					  <thead class="thead-dark">
					    <tr>
					      <th scope="col">#</th>
					      <th scope="col">Livro</th>
					      <th scope="col">Retirada</th>
					      <th scope="col">Entrega</th>
					      <th scope="col">Devolvido</th>
					      <th scope="col">Recebedor</th>
					    </tr>
					  </thead>
					  <tbody>
					    <tr>
					      <th scope="row">a320</th>
					      <td>Livro 1</td>
					      <td>20/01/2018</td>
					      <td>20/02/2018</td>
					      <td>SIM</td>
					      <td>Que recebeu</td>
					    </tr>
					    <tr>
					      <th scope="row">ih20</th>
					      <td>Livro 2</td>
					      <td>22/07/2018</td>
					      <td>17/09/2018</td>
					      <td>SIM</td>
					      <td>Que recebeu</td>
					    </tr>
					    <tr>
					      <th scope="row">786s</th>
					      <td>Livro 3</td>
					      <td>10/03/2018</td>
					      <td>10/05/2018</td>
					      <td><strong style="color: red;">NÃO</strong></td>
					      <td></td>
					    </tr>
					  </tbody>
					</table>
					<br>
					<span style="color: red;">Colocar alerta de livros que estão perto da entrega.</span>
					nao prescisa filtrar por mes, mostrar todos os livros do ano.
				</div>		