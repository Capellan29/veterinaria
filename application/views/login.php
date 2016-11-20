<!DOCTYPE html>
<html>
<head>
	<title>Login</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<form method="post" autocomplete="off" action="<?= base_url('seguridad/login') ?>">	
		<div class="col col-sm-4">
		</div>
		<div class="col col-sm-4">
			<h3 class="text-center">Login</h3>
			<div class="form-group input-group">
				<label for="usuario" class="input-group-addon"><span class="glyphicon">&#xe008;</span></label>
				<input type="text" placeholder="Usuario" autofocus name="usuario" class="form-control" />
			</div>
			<div class="form-group input-group">
				<label for="clave" class="input-group-addon"><span class="glyphicon">&#xe033;</span></label>
				<input placeholder="Clave" type="password" name="clave" class="form-control" />
			</div>
			<div class="text-center">
				<button class="btn btn-primary" type="submit">Entrar</button>
			</div>
		</div>	
		<div class="col col-sm-4">
		</div>			
	</form>
</div>

</body>
</html>