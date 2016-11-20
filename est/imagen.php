<?php

mysql_connect("mysql4.000webhost.com", "a5438652_cal", "Capellan0729") or die(mysql_error()) ;
mysql_select_db("a5438652_cal") or die(mysql_error()) ;

$id = $_GET['id'];

if ($id > 0){
	
        $consulta = "SELECT foto, tipo FROM fotos WHERE mascota = $id";
	$resultado= @mysql_query($consulta) or die(mysql_error());
	$datos = mysql_fetch_assoc($resultado);

	$imagen = $datos['foto'];
	$tipo = $datos['tipo'];

	header("Content-type: $tipo");
	echo $imagen;
}
