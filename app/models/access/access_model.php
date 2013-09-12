<?php

class Access_model extends Activerecord
{
	public function __Construct ()
	{
		parent::__Construct ();

		$this->_has_image = FALSE;
		

		//Set the validation from the fields, at the moment they will all be not_empty so we have something to test
		$this->has_one = array();
        $this->has_many = array();
	}

	public static function all_users()
	{
		$access_model = new Access_model();
		return $access_model->all();
	}

	public static function get_emails()
	{
		$access_model = new Access_model();
		$all = $access_model->all();

		$emails = array();

		foreach( $all as $person ) {
			$emails[] = $person[ 'email' ];
		}

		return implode( ', ', $emails );
	}
}
