<?php

class Clients_contacts extends Application_controller
{
	private $_clients_contacts;

	public function __Construct ()
	{
		parent::__Construct ();

		$this->_clients_contacts = new Clients_contacts_model();
		$this->forms->setActionTable ( 'clients_contacts' );
	}

	public function edit ( $id = "" )
	{
		$this->_clients_contacts->attributes[ 'id' ] = !!$id ? $id : $_POST['clients_contacts']['id'];

		if ( post_set() )
		{
			//If a password is submitted hash it
			//If not unset it so it doesnt update the database with a blank password
			if( !!$_POST[ 'clients_contacts' ][ 'password' ] ) {
				$_POST[ 'clients_contacts' ][ 'password' ] = sha1( $_POST[ 'clients_contacts' ][ 'password' ] );
			}
			else {
				unset( $_POST[ 'clients_contacts' ][ 'password' ] );
			}
			
			if ( !$this->_clients_contacts->save( $_POST[ 'clients_contacts' ] ) ) {
				$feedback = organise_feedback ( $this->_clients_contacts->errors, TRUE );
			}
			else
				$feedback = organise_feedback ( $this->forms->getSuccessMessage () );
		}

		$this->_clients_contacts->find( $this->_clients_contacts->attributes[ 'id' ] );

		// Sets the form values by the properties set through the Find method in active record
		$this->mergeTags ( $this->_clients_contacts->attributes );
		$this->addTag ( 'feedback', $feedback );

		$this->addStyle ( 'edit' );
		$this->addStyle ( 'button' );

		$this->setScript( 'main' );
	}
}

?>