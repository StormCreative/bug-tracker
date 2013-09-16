<?php

class clients_contacts_model extends activerecord
{
	public function __Construct ()
	{
		parent::__Construct ();
		
		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = "";
        $this->has_many = array();

		$this->validates = array();
	}

	public static function get( $id = "" )
	{
		$clients_contacts_model = new Clients_contacts_model();
		return $clients_contacts_model->where( 'clients_id = :clients_id' )->all( array( 'clients_id' => $id ) );
	}

	public static function check_current_password( $id, $password )
	{
		$clients_contacts_model = new Clients_contacts_model();
		$clients_contacts_model->find( $id );

		if( $clients_contacts_model->attributes[ 'password' ] == sha1( $password ) ) {
			$return = TRUE;
		}
		else {
			$return = FALSE;
		}

		return $return;
	}
}

?>