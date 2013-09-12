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

	public static function get_bugs( $type, $clients_id )
	{
		$bugs_model = new Bugs_model();
		$binds = array( "clients_id" => $clients_id );

		if( $type == 'open' ) {
			$bugs_model->where( DB_SUFFIX . '_bugs.clients_id = :clients_id AND closed = 0 AND fixed = 0 AND flagged = 0' );
		}
		else if( $type == 'fixed' ) {
			$bugs_model->where( DB_SUFFIX . '_bugs.clients_id = :clients_id AND closed = 0 AND fixed = 1 AND flagged = 0' );
		}
		else if( $type == 'closed' ) {
			$bugs_model->where( DB_SUFFIX . '_bugs.clients_id = :clients_id AND closed = 1' );
		}
		else if( $type == 'flagged' ) {
			$bugs_model->where( DB_SUFFIX . '_bugs.clients_id = :clients_id AND flagged = 1' );
		}

		if( !!$_SESSION[ 'bug_filter' ] ) {
			$bugs_model->where( 'clients_contacts_id = :clients_contacts_id' );
			$binds[ 'clients_contacts_id' ] = $_SESSION[ 'bug_filter' ];
		}
		else if( !!$_SESSION[ 'person_filter' ] ) {
			$bugs_model->where( 'FIND_IN_SET( ' . $_SESSION[ 'person_filter' ] . ', assigned )' );
		}

		$all = $bugs_model->all( $binds );

		//We need to grab the users who are assigned to it
		foreach( $all as $key => $item ) {

			if( !!$item[ 'assigned' ] ) {

				$assigned_users = array();

				foreach( explode( ',', $item[ 'assigned' ] ) as $id ) {
					$access_model = new Access_model();
					$access_model->find( $id );

					$assigned_users[] = $access_model->attributes;
				}

				$all[ $key ][ 'assigned' ] = $assigned_users;
			}
		}
		
		return $all;
	}

	public function count_active()
	{
		$bugs_model = new Bugs_model();
		$all = $bugs_model->where( 'fixed = :fixed AND closed = :closed AND flagged = :flagged' )->all( array( 'fixed' => 0, 'closed' => 0, 'flagged' => 0 ) );

		if( !!$all ) {
			$count = count( $all );
		}
		else {
			$count = 0;
		}

		return $count;
	}
}

?>