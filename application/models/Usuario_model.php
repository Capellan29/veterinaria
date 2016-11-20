<?php

	defined('BASEPATH') or exit('No direct script access allowed');

	Class Usuario_model extends CI_Model{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function guardar($usuario){
			$id = $usuario['id'];

			if ($id+0 > 0){
				$this->db->where('id=',$id);
				unset($usuario['id']);
				$this->db->update('mmascusuario',$usuario);
			}else{
				$this->db->insert('mascusuario', $usuario);
			}

		}

		function listarUsuarios(){
			$query = $this->db->get('mascusuario');
			return $query->result();
		}

		function cargarUsuario($id){
			$usuario = new stdClass();
			$usuario->id = 0;
			$usuario->usuario = "";
			$usuario->clave = "";
			$usuario->correo = "";

			$query = $this->db->where('id=',$id);
			$query = $this->db->get('mascusuario');
			$rs = $query->result();
			
			if (count($rs) > 0) {
				$usuario = $rs[0];
			}
			return $usuario;
		}

		function eliminarUsuario($id){
			$this->db->where('id=', $id);
			$this->db->delete('mascusuario');
		}

		function iniciarSesion($usr, $clv)
		{
			$this->db->where('usuario=',$usr);
			$this->db->where('clave=',$clv);

			$query = $this->db->get('mascusuario');
			$rs = $query->result();

			if (count($rs) > 0) {
				$usuario = $rs[0];
				return $usuario->id;
			}

			$us = $this->db->query('select count(*) as cont from mascusuario')->result();

			if($us[0]->cont < 1 && $usr == "admin" && $clv == "1tl4w3b")
			{
				return 99;
			}

			return false;

		}

	}



?>
