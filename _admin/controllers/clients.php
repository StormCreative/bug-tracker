<?php

class Clients extends Application_controller
{
	private $_clients;

	public function __Construct ()
	{
		parent::__Construct ();

		$this->_clients = new clients_model();
		
		$this->forms->setActionTable ( 'clients' );
	}

	public function edit ( $id = "" )
	{
		$this->_clients->attributes[ 'id' ] = !!$id ? $id : $_POST['clients']['id'];

		if ( post_set() )
		{
			if ( !$this->_clients->save( $_POST[ 'clients' ] ) ) {
				$feedback = organise_feedback ( $this->_clients->errors, TRUE );
			}
			else
				$feedback = organise_feedback ( $this->forms->getSuccessMessage () );
		}

		$this->_clients->find( $this->_clients->attributes[ 'id' ] );

		// Sets the form values by the properties set through the Find method in active record
		$this->mergeTags ( $this->_clients->attributes );
		$this->addTag( 'feedback', $feedback );

		$this->addStyle( 'edit' );
		$this->addStyle( 'button' );
		$this->addStyle( 'listing' );

		$this->setScript( 'main' );
	}
}

?>