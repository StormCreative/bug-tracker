<?php

class bugs_model extends activerecord
{
	public function __Construct ()
	{
		parent::__Construct ();

		$this->_has_image = TRUE;
		

		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = array( "clients_contacts" );
        $this->has_many = array();

		$this->validates = array( array( "not_empty", "url" ) );
	}
}

?>