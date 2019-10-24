<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Visits extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */

	function __construct() {
        parent::__construct();

		// Load url helper
		$this->load->helper('url');
	}

	public function list_process(){

		$this->load->model('visits_model', 'visits_model');
		$result = $this->visits_model->get_visits();

		$arrResult = array();
		foreach( $result as $visit ){

			$edit = "<a href='#' onclick='edit(" . $visit->id . ")'>Editar</a>";
			$remove = "<a href='#' onclick='remove(" . $visit->id . ")'>Eliminar</a>";

			$subject = $visit->subject;
			switch ($subject) {
				case 'buy':
					$subject = "Compra";
					break;
				case 'sell':
					$subject = "Venta";
					break;
				case 'rent':
					$subject = "Alquiler";
					break;		
			}

			$arrResult[] = array( $visit->name, $visit->email, $subject, $edit . " " . $remove );
		}

		echo json_encode( array( "data" => $arrResult ) );

	}

	public function index()
	{
		$this->load->view('visits_list');
	}

	public function add_process(){

		$mode_form = isset( $_POST[ "mode_form" ] ) && $_POST[ "mode_form" ] ? addslashes( $_POST[ "mode_form" ] ) : "";

		$this->load->model('visits_model', 'visits_model');

		if( $mode_form == "insert" ){
			$this->visits_model->save();
		}else if( $mode_form == "edit" ){
			$this->visits_model->edit();
		}

		echo json_encode( array( "result" => "success" ) );
	}

	public function view($page = 'visits_list')
	{

        if ( ! file_exists(APPPATH.'views/visits/'.$page.'.php'))
        {
                // Whoops, we don't have a page for that!
                show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('visits/'.$page, $data);
        $this->load->view('templates/footer', $data);
	}

	public function edit(){

		$id = isset( $_POST[ "id" ] ) && $_POST[ "id" ] ? addslashes( $_POST[ "id" ] ) : "";

		$this->load->model('visits_model', 'visits_model');
		$result = $this->visits_model->get_by_id( $id );

		echo json_encode( $result );

	}

	public function delete_process(){

		$id = isset( $_POST[ "id" ] ) && $_POST[ "id" ] ? addslashes( $_POST[ "id" ] ) : "";

		$this->load->model('visits_model', 'visits_model');
		$result = $this->visits_model->remove( $id );

		echo json_encode( $result );

	}

}
