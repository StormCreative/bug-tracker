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

                    //If a ID is not sent through the POST array send a email to everyone about the new bug
                    if( !$_POST[ 'bug' ][ 'id' ] ) {
                        $mail = new Mail( '<p>A new bug has been posted from ' . Clients_model::get_title( $bugs_model->attributes[ 'clients_id' ] ) . '</p><p>URL: ' . $_POST[ 'bug' ][ 'url' ] . '</p><p>Browser: ' . $_POST[ 'bug' ][ 'browser' ] . '</p><p>Summary: ' . $_POST[ 'bug' ][ 'summary' ] . '</p><p>Device: ' . $_POST[ 'bug' ][ 'device' ] . '</p><p>' . $_POST[ 'bug' ][ 'description' ] . '</p>' );
                        $mail->to = Access_model::get_emails();
                        $mail->subject = 'A new bug has been posted';
                        $mail->send();
                    }
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
