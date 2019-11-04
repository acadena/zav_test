<?php

class Cotizacion extends CI_Controller {

	function __construct() {
        parent::__construct();

		// Load url helper
		$this->load->helper('url');
	}

	public function init(){

		$data = array();
		$data['title'] = "Sonria"; // Capitalize the first letter

        $this->load->view('templates_cot/header', $data);
        $this->load->view('cotizacion/form');
        $this->load->view('templates_cot/footer', $data);

	}
	public function saveCotizacion(){

		$this->load->model('cotizacion_model', 'cotizacion_model');
		$this->cotizacion_model->save();

		echo json_encode( array( "success" => "true" ) );

	}

}