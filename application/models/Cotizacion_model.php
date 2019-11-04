<?php 

class Cotizacion_model extends CI_Model{

	public $nombre_completo;
	public $email;
	public $phone;

	function __construct() {
        parent::__construct();

		$this->load->database();
	}

	public function save(){

		$this->nombre_completo = isset( $_POST[ "nombre_completo" ] ) && $_POST[ "nombre_completo" ] ? addslashes( $_POST[ "nombre_completo" ] ) : "";
		$this->email = isset( $_POST[ "email" ] ) && $_POST[ "email" ] ? addslashes( $_POST[ "email" ] ) : "";
		$this->phone = isset( $_POST[ "phone" ] ) && $_POST[ "phone" ] ? addslashes( $_POST[ "phone" ] ) : "";

		$this->db->insert('cotizaciones', $this);
	}

}