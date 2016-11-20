<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Mascotas</title>
</head>
<body>
<nav class="nav navbar-inverse ">
	    <ul class="nav navbar-nav">
	    	<li class="active"><a class="navbar-brand" href="#">Mascota</a></li>
		    <li ><a class="navbar-brand" href="<?php echo base_url('usuario'); ?>">Usuarios</a></li>
	      	<li><a class="navbar-brand" href="<?php echo base_url('seguridad/logOut'); ?>">Salir</a></li>
	    </ul>
	</nav>
	<div class="container">	
		<br>
		<nav class="nav navbar">
		    <ul class="nav navbar-nav">
		    	<li ><a href="<?php echo base_url('mascota'); ?>">Registrar</a></li>
			    <li class="active"><a href="#">Registros</a></li>
		    </ul>
		</nav>	
	<div class="row">
			<h3>Mascotas</h3>
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Nombre</th>
					<th>Nacimiento</th>
					<th>Tipo</th>
					<th>Raza</th>
					<th>Peso</th>
					<th>Color</th>
					<th>---</th>
				</thead>
				<tbody>
					<?php
						foreach ($mascotas as $mascota) {
							
							$linkEdit = base_url("/mascota/?edit={$mascota->id}");
							$linkDel = base_url("/mascota/del/?id={$mascota->id}");
							$linkInfo = base_url("/mascota/info/?id={$mascota->id}");

							echo "<tr>
								<td>{$mascota->id}</td>
								<td>{$mascota->nombre}</td>
								<td>{$mascota->nacimiento}</td>
								<td>{$mascota->tipo}</td>
								<td>{$mascota->raza}</td>
								<td>{$mascota->peso} Lbs</td>
								<td >{$mascota->color}</td>
								<td>
									<a href='{$linkInfo}' class='btn btn-info btn-sm' ><span class=\"glyphicon glyphicon-info\">ver fotos</a>
									<a href='{$linkEdit}' class='btn btn-warning btn-sm'><span class=\"glyphicon glyphicon-edit\"></span></a>
	      </a>  
									<a href='{$linkDel}' onclick='return validarBorrar();' class='btn btn-danger btn-sm'><span class=\"glyphicon glyphicon-trash\"> </span></a>
								</td>
							</tr>";
						}
					?>
				</tbody>
			</table>
		</div>
	</div>
		<script>
			function validarBorrar(){	
				return confirm('Seguro que desea eliminar? esta operacion no puede revertirse.')
			}
		</script>
</body>
</html>