<?php 

class Visits_model extends CI_Model{

	public $name;
	public $email;
	public $phone;
	public $subject;
	public $comment;

	function __construct() {
        parent::__construct();

		$this->load->database();
	}

	public function save(){

		$this->name = isset( $_POST[ "user_name" ] ) && $_POST[ "user_name" ] ? addslashes( $_POST[ "user_name" ] ) : "";
		$this->email = isset( $_POST[ "user_email" ] ) && $_POST[ "user_email" ] ? addslashes( $_POST[ "user_email" ] ) : "";
		$this->phone = isset( $_POST[ "user_phone" ] ) && $_POST[ "user_phone" ] ? addslashes( $_POST[ "user_phone" ] ) : "";
		$this->subject = isset( $_POST[ "subject" ] ) && $_POST[ "subject" ] ? addslashes( $_POST[ "subject" ] ) : "";
		$this->comment = isset( $_POST[ "comment" ] ) && $_POST[ "comment" ] ? addslashes( $_POST[ "comment" ] ) : "";

		$this->db->insert('visits', $this);
	}

	public function edit(){

		$this->name = isset( $_POST[ "user_name" ] ) && $_POST[ "user_name" ] ? addslashes( $_POST[ "user_name" ] ) : "";
		$this->email = isset( $_POST[ "user_email" ] ) && $_POST[ "user_email" ] ? addslashes( $_POST[ "user_email" ] ) : "";
		$this->phone = isset( $_POST[ "user_phone" ] ) && $_POST[ "user_phone" ] ? addslashes( $_POST[ "user_phone" ] ) : "";
		$this->subject = isset( $_POST[ "subject" ] ) && $_POST[ "subject" ] ? addslashes( $_POST[ "subject" ] ) : "";
		$this->comment = isset( $_POST[ "comment" ] ) && $_POST[ "comment" ] ? addslashes( $_POST[ "comment" ] ) : "";

		$this->db->update('visits', $this, array( "id" => $_POST[ "id" ] ) );
	}

	public function get_visits(){

        $query = $this->db->get('visits');
        return $query->result();

    }

    public function get_by_id( $id ){

    	$query = $this->db->where('id', $id)
             ->get('visits')
             ->result_array();

        return $query;   

    }

    public function remove( $id ){

    	$query = $this->db->where('id', $id)
             ->delete('visits');

    }

}