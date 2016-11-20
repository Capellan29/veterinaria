<?php
	
	defined('BASEPATH') or exit('No direct script access allowed');

	Class Mascota_model extends CI_Model{

		public function __construct()
		{
			parent::__construct();
			$this->load->database();
		}

		function guardar($mascota){
			$id = $mascota['id'];

			if ($id+0 > 0){
				$this->db->where('id=',$id);
				unset($mascota['id']);
				$this->db->update('mascota',$mascota);
			}else{
				$this->db->trans_start();
				$this->db->insert('mascota', $mascota);
				$id = $this->db->insert_id();
				$this->db->escape($_FILES['foto']['tmp_name']);
				if($data = file_get_contents($_FILES['foto']['tmp_name'])){
					$data  = file_get_contents($_FILES['foto']['tmp_name']);
				}else{
					$data = "no image";
				}
				
				$tipo = $_FILES['foto']['type'];
				$foto = array('mascota' => $id, 'foto' => $data, 'tipo' => $tipo);
                $this->db->insert('fotos',$foto);
                $this->db->trans_complete();
			}	
		}

		function listarMascotas(){
			$query = $this->db->get('mascota');
			return $query->result();
		}

		function eliminarMascota($id){
			$this->db->where('id=', $id);
			$this->db->delete('mascota');
		}

		function cargarMascota($id){
			$mascota = new stdClass();
			$mascota->id = 0;
			$mascota->nombre = "";
			$mascota->nacimiento = "";
			$mascota->tipo = "";
			$mascota->raza = "";
			$mascota->peso = "";
			$mascota->color = "";
			$mascota->comentario = "";

			$query = $this->db->where('id=',$id);
			$query = $this->db->get('mascota');
			$rs = $query->result();

			if (count($rs) > 0) {
				$mascota = $rs[0];
			}
			return $mascota;
		}

		public function getInfo($id)
		{
			$this->db->select("comentario");
			$this->db->from('mascota');
			$this->db->where('id=',$id);
			return $this->db->get()->result();
		}
	}
	
?>