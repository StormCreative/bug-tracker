<?php

class Access extends Application_controller
{
	public function __Construct ()
	{
		parent::__Construct ();

		$this->_access = new Access_model();
		$this->forms->setActionTable ( 'access' );
	}

	public function edit ( $id = "" )
	{
		$this->_access->attributes[ 'id' ] = !!$id ? $id : $_POST['access']['id'];

		if ( post_set() )
		{
			if( !!$_POST[ 'access' ][ 'password' ] ) {
				$_POST[ 'access' ][ 'password' ] = sha1( $_POST[ 'access' ][ 'password' ] );
			}
			else {
				unset( $_POST[ 'access' ][ 'password' ] );
			}

			if ( !$this->_access->save( $_POST[ 'access' ] ) ) {
				$feedback = organise_feedback ( $this->_access->errors, TRUE );
			}
			else {
				$feedback = organise_feedback ( $this->forms->getSuccessMessage () );
			}
		}

		$this->_access->find( $this->_access->attributes[ 'id' ] );

		// Sets the form values by the properties set through the Find method in active record
		$this->mergeTags ( $this->_access->attributes );
		$this->addTag ( 'feedback', $feedback );

		$this->addStyle ( 'edit' );
		$this->addStyle ( 'button' );

		$this->setScript( 'main' );
	}
}

?>