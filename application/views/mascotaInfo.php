<!DOCTYPE html>
<html>
<head>
	<title>Informacion</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>

	<div class="container">
		<div class="row text-center">
			<br>
			<br>
			<br>
			<div class="col col-sm-4">
			</div>
			<div class="col col-sm-4">
				<div class="panel panel-default">
			        <div class="panel-heading">
						<h4 class="panel-title">Fotografia</h4>
			        </div>
			        	<br>
			        	<br>
						<img  class="img-rounded" alt="Cinque Terre" width="304" height="236" src="<?php echo base_url('est/imagen.php?id=').$id; ?>">
						<br>	
						<br>	
	  				<div class="panel-footer">
	  					
	  					<?php
	  						echo $comentario;
	  					?>
	  					<br>
	  					<h5><a href="<?php echo base_url('mascota/registros'); ?>" class="btn btn-default">Volver</a></h5>
	  				</div>
	  			</div>	
			</div>
			<div class="col col-sm-4">
			</div>
		</div>
	</div>

</body>
</html>