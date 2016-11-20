<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Usuarios</title>
</head>
<body >

	<nav class="nav navbar-inverse  ">
	    <ul class="nav navbar-nav">
		    <li ><a href="<?php echo base_url('mascota'); ?>">Mascotas</a></li>
	    	<li class="active"><a href="#">usuarios</a></li>
	      <li><a class="navbar-brand" href="<?php echo base_url('seguridad/logOut'); ?>"><span class="glyphicon glyphicon-log-in"></span> Salir_</a></li>
	    </ul>
	</nav>

	<br>
	<br>
	<div class="container panel">
		<div class="row">
			<div class=" col col-sm-5">
				<h3>Nuevo Usuario</h3>
				<form method="post" autocomplete="off" action="<?php echo base_url('usuario/guardar'); ?>">
					<div class="form-group input-group">
						<label for="ID" class="input-group-addon">ID</label>
						<input type="text" readonly value="<?php echo $usuario->id; ?>" name="id" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="usuario" class="input-group-addon">Usuario</label>
						<input type="text" value="<?php echo $usuario->usuario; ?>" name="usuario" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="clave" class="input-group-addon">Clave</label>
						<input type="text" value="<?php echo $usuario->clave; ?>" name="clave" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="correo" class="input-group-addon">Correo</label>
						<input type="text" value="<?php echo $usuario->correo; ?>" name="correo" class="form-control" />
					</div>
					<div class="text-center">
						<button type="submit" class="btn btn-primary">Guardar</button>
					</div>
				</form>
			</div>
			<div class="col col-sm-3">
			<br>
			<br>
			<br>
				<?php
					if(isset($error)){
						echo "
							<div class=\"panel panel-danger\">
							  <div class=\"panel-heading\">Algo no esta bien</div>
							  <div class=\"panel-body\">{$error}</div>
							</div>
						";
					}
				?>
			</div>
		</div>
		<div class="row">
			<h3>_usuarios</h3>
			<table class="table table-hover">
				<thead>
					<th>ID</th>
					<th>Usuario</th>
					<th>Correo</th>
					<th>---</th>
				</thead>
				<tbody>
					<?php
						foreach ($usuarios as $usuario) {

							$linkEdit = base_url("/usuario/?edit={$usuario->id}");
							$linkDel = base_url("/usuario/del/?id={$usuario->id}");
							
							echo "<tr>
								<td>{$usuario->id}</td>
								<td>{$usuario->usuario}</td>
								<td>{$usuario->correo}</td>
								<td>
									<a href='{$linkEdit}' class='btn btn-warning btn-sm'><span class=\"glyphicon glyphicon-edit\"></span></a>
									<a href='{$linkDel}' onclick='return validarBorrar();' class='btn btn-danger btn-sm'><span class=\"glyphicon glyphicon-trash\"> </span></a>
								</td>

							</tr>";

						}
					?>
				</tbody>
			</table>
		</div>

		<script>
			function validarBorrar(){
				confim('Esta operacion no se puede cancelar. Seguro que desea eliminar este usuario?.');
				return confirmar();
			}

		</script>
	</div>

</body>
</html>
