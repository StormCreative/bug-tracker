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

		if ( post_set() )
		{
			//Handle the image
            if ( !!$_POST["image"] || !!$_FILES ) {
                $_POST[ "bugs" ][ "image_id" ] = Image_helper::save_one( $_POST[ "image" ] );
            } 
            else {
                $_POST[ "bugs" ][ "image_id" ] = NULL;
            }
			
			if ( !$this->_bugs->save( $_POST[ 'bugs' ] ) ) {
				$feedback = organise_feedback ( $this->_bugs->errors, TRUE );
			}
			else {
				$feedback = organise_feedback ( $this->forms->getSuccessMessage () );
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
}

?>