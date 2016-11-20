<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo; ?></title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	
</head>
<body>
	<div class="container text-center">
		<h3><?php echo $mensaje; ?></h3>
		<a class="btn btn-<?php echo $bt; ?>" href="<?php echo base_url($link); ?>" >continuar</a>
	</div>
</body>
</html>
 