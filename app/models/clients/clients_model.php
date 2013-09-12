<?php

class Clients_model extends Activerecord
{
	public function __Construct ()
	{
		parent::__Construct ();

		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = "";
        $this->has_many = array( 'clients_contacts' );

		$this->validates = array( array( "not_empty", "title" ) );
	}

	public static function all_clients()
	{
		$clients = new Clients_model();
		return $clients->all();
	}

	public function get_title( $id = "" )
	{
		$clients_model = new Clients_model();
		$clients_model->find( $id );

		return $clients_model->attributes[ 'title' ];
	}
}

?>