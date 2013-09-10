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
}
