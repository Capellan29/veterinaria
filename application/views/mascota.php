<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<title>Mascotas</title>
</head>
<body >

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
		    	<li class="active"><a href="#">Registrar</a></li>
			    <li ><a href="<?php echo base_url('mascota/registros'); ?>">Registros</a></li>
		    </ul>
		</nav>
		<br>	
		<div class="row">		
			<form method="post" autocomplete="off" action="<?php echo base_url('mascota/guardar'); ?>" enctype="multipart/form-data">	
				<h3>Nueva Mascota</h3>
				<div class="row">
				<div class=" col col-sm-6">
					<div class="form-group input-group">
						<label for="id" class="input-group-addon">ID</label>
						<input type="text" readonly value="<?php echo $mascota->id; ?>" name="id" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="Nombre" class="input-group-addon">Nombre</label>
						<input type="text" value="<?php echo $mascota->nombre; ?>" name="nombre" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="nacimiento" class="input-group-addon">Nacimiento</label>
						<input type="date" value="<?php echo $mascota->nacimiento; ?>" name="nacimiento" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="tipo" class="input-group-addon">Tipo</label>
						<input type="text" value="<?php echo $mascota->tipo; ?>"  name="tipo" class="form-control" />
					</div>
				</div>
				<div class="col col-sm-6">
					<div class="form-group input-group">
						<label for="raza" class="input-group-addon">Raza</label>
						<input type="text" value="<?php echo $mascota->raza; ?>"  name="raza" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="peso" class="input-group-addon">Peso</label>
						<input type="number" min="0" value="<?php echo $mascota->peso; ?>"  name="peso" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="color" class="input-group-addon">Color</label>
						<input type="text" value="<?php echo $mascota->color; ?>"  name="color" class="form-control" />
					</div>
					<div class="form-group input-group">
						<label for="foto" class="input-group-addon">Foto</label>
						<input type="file" name="foto" class="form-control" />
					</div>
				</div>
				</div>
				<div class="row">					
					<div class="col col-sm-12">
						<div class="form-group input-group">
							<label for="comentario" class="input-group-addon">Comentario</label>
							<textarea name="comentario" class="form-control" /><?php echo $mascota->comentario; ?></textarea> 
						</div> 
						<div class="text-center">
							<button type="summit" class="btn btn-primary">Guardar</button>
						</div>
					</div>
				</div>			
			</form>	
		</div>
	</div>
	
</body>
</html>