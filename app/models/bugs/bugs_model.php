<?php

class bugs_model extends activerecord
{
	public function __Construct ()
	{
		parent::__Construct ();

		$this->_has_image = TRUE;
		

		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = "";
        $this->has_many = array();

		$this->validates( "not_empty", "clients_contacts_id" ); $this->validates( "not_empty", "url" ); $this->validates( "not_empty", "browser" ); $this->validates( "not_empty", "operating_system" ); $this->validates( "not_empty", "device" ); $this->validates( "not_empty", "severity" ); $this->validates( "not_empty", "reproduce" ); $this->validates( "not_empty", "description" ); $this->validates( "not_empty", "flagged" ); $this->validates( "not_empty", "fixed" ); 
	}
}

?>