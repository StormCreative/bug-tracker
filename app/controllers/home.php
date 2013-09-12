<?php

class home extends c_controller
{
    public function index ()
    {
        if( !!$_SESSION[ 'client' ] ) {
            header( "Location: " . DIRECTORY . "bugs/listing" );
        }

    	//Login logic
    	if( !!$_POST[ 'login' ] ) {
    		$clients_contacts_model = new Clients_contacts_model();
    		$all = $clients_contacts_model->where( 'email = :email AND password = :password' )->all( array( 'email' => $_POST[ 'login' ][ 'email' ], 'password' => sha1( $_POST[ 'login' ][ 'password' ] ) ) );

    		if( !$all ) {
    			$this->addTag( 'error', 'Your details were not found in the database. Please check your details or contact storm creative for assistance.' );
    		}
    		else {
    			//Set session vars
    			$_SESSION[ 'client' ][ 'id' ] = $all[0][ 'id' ];
    			$_SESSION[ 'client' ][ 'title' ] = $all[0][ 'title' ];
    			$_SESSION[ 'client' ][ 'email' ] = $all[0][ 'email' ];
    			$_SESSION[ 'client' ][ 'clients_id' ] = $all[0][ 'clients_id' ];

    			header( "Location: " . DIRECTORY . "bugs/listing" );
    		}
    	}

        //Forgotten password login
        if( !!$_POST[ 'user' ] ) {
            $clients_contacts_model = new Clients_contacts_model();
            $exists = $clients_contacts_model->where( 'email = :email' )->all( array( 'email' => $_POST[ 'user' ][ 'email' ] ) );
            
            if( !$exists ) {
                $this->addTag( 'forgot_error', 'The email address you entered was not found. Please check your details or contact storm creative for assistance.' );
            }
            else {
                $this->addTag( 'success', TRUE );
                $user = array( 'id' => $exists[0][ 'id' ] );

                $password = random_string( 10 );
                $user[ 'password' ] = sha1( $password );

                if( $clients_contacts_model->save( $user ) ) {
                    $mail = new Mail( 'Your request for a new password has been successful. Your new password is ' . $password );
                    $mail->to = $exists[0][ 'email' ];
                    $mail->subject = 'Forgotten password: Storm Creative bug tracker';
                    $mail->send();

                    $this->addTag( 'forgot_success', 'Your request for a new password has been successful. Please check your email inbox for your new password.' );
                }
                else {
                    $this->addTag( 'forgot_error', 'Your password could not be changed at this time. Please try again or contact storm creative for assistance.' );
                }
            }

            $this->addTag( 'show', TRUE );
        }

    	$this->addStyle( 'login' );
        $this->setView('home/index');
    }
}
