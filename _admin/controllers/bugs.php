<?php

class Bugs extends Application_controller
{
	private $_bugs;

	public function __Construct ()
	{
		parent::__Construct ();

		$this->_bugs = new bugs_model();
		$this->forms->setActionTable ( 'bugs' );
	}

	public function edit ( $id = "" )
	{
		$this->_bugs->attributes[ 'id' ] = !!$id ? $id : $_POST['bugs']['id'];
		$this->_bugs->find( $this->_bugs->attributes[ 'id' ] );

		if ( post_set() )
		{
			//Send emails informing users they have been assigned to bugs
            foreach( $_POST[ 'bugs' ][ 'assigned' ] as $person ) {
            	if( !in_array( $person, explode( ',', $this->_bugs->attributes[ 'assigned' ] ) ) ) {
            		$access_model = new access_model();
            		$access_model->find( $person );

            		$mail = new Mail( "You have been assigned a new bug to fix on the storm digital bug tracker. For " . Clients_model::get_title( $this->_bugs->attributes[ 'clients_id' ] ) );
            		$mail->to = $access_model->attributes[ 'email' ];
            		$mail->subject = 'You have a bug to fix!';
            		$mail->send();
            	}
            }

			$_POST[ 'bugs' ][ 'assigned' ] = implode( ',', $_POST[ 'bugs' ][ 'assigned' ] );

			//Handle the image
            if ( !!$_POST["image"] || !!$_FILES ) {
                $_POST[ "bugs" ][ "image_id" ] = Image_helper::save_one( $_POST[ "image" ] );
            } 
            else {
                $_POST[ "bugs" ][ "image_id" ] = NULL;
            }
			
			if ( !$this->_bugs->save( $_POST[ 'bugs' ] ) ) {
				$feedback = organise_feedback( $this->_bugs->errors, TRUE );
			}
			else {
				$feedback = organise_feedback( $this->forms->getSuccessMessage() );
			}
		}

		$this->_bugs->find( $this->_bugs->attributes[ 'id' ] );

		// Sets the form values by the properties set through the Find method in active record
		$this->mergeTags ( $this->_bugs->attributes );
		$this->addTag ( 'image', $this->_bugs->image );
		$this->addTag ( 'feedback', $feedback );

		$this->addStyle ( 'edit' );
		$this->addStyle ( 'button' );

		$this->setScript( 'main' );
	}

	public function listing( $id = "" )
	{
		$clients_model = new Clients_model();
		$clients_model->find( $id );
		$this->addTag( 'client_info', $clients_model->attributes );

		//If the user filters save the selection in a session
		if( !!$_POST ) {
			if( !!$_POST[ 'person_filter' ] ) {
				$_SESSION[ 'person_filter' ] = $_POST[ 'person_filter' ];
			}
			else {
				unset( $_SESSION[ 'person_filter' ] );
			}
		}

		$this->addStyle( 'listing' );
	}

	public function change( $type = "" )
	{
		$attr = array( 'id' => $_GET[ 'id' ] );

		//For some reasone type has a comma at the beginning
		$type = str_replace( ',', '', $type );

		switch( $type ) {
			case 'open' :
				$attr[ 'closed' ] = 0;
				$attr[ 'fixed' ] = 0;
				$attr[ 'flagged' ] = 0;
				break;

			case 'fixed' :
				$attr[ 'closed' ] = 0;
				$attr[ 'fixed' ] = 1; 
				$attr[ 'flagged' ] = 0;
				break;

			case 'closed' :
				$attr[ 'closed' ] = 1;
				$attr[ 'flagged' ] = 0;
				break;

			case 'flagged' :
				$attr[ 'closed' ] = 0;
				$attr[ 'fixed' ] = 0; 
				$attr[ 'flagged' ] = 1;
				break;
		}

		$bugs_model = new Bugs_model();
		$bugs_model->save( $attr, FALSE );

		header( "Location: " . DIRECTORY . "admin/bugs/listing/" . $_GET[ 'client_id' ] );
	}
}

?>