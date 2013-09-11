<?php
    class Bugs extends C_Controller {

        public function listing()
        {
            if( !!$_POST ) {
                $_SESSION[ 'bug_filter' ] = $_POST[ 'bug_filter' ];
            }

        	$this->addStyle( 'listing' );
        	$this->setView('bugs/listing');
        }

        public function edit( $id = "" )
        {
            $bugs_model = new Bugs_model();

            if( !!$_POST ) {

                //Handle the image
                if ( !!$_POST[ "image" ] || !!$_FILES ) {
                    $_POST[ "bug" ][ "image_id" ] = Image_helper::save_one( $_POST[ "image" ] );
                } 
                else {
                    $_POST[ "bug" ][ "image_id" ] = NULL;
                }

                if( $bugs_model->save( $_POST[ 'bug' ] ) ) {
                    $this->addTag( 'success', 'Bug report has been saved successfully' );
                }
                else {
                    $this->addTag( 'error', 'Bug report could not be saved at this time' );
                }
            }

            $bugs_model->find( $id );
            $this->mergeTags( $bugs_model->attributes );

        	$this->addStyle( 'edit' );
        	$this->setView('bugs/edit');
        }

        public function logout()
        {
            session_destroy();
            header( 'Location: ' . DIRECTORY );
        }
    }
  ?>
