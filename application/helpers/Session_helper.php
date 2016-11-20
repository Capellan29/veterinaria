<?php
	

	session_start();


	if (!isset($_SESSION['mascusuario']) && !defined('NOLOGIN')) {
		redirect('seguridad');
	}