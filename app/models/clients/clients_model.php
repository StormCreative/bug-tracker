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
}

?>