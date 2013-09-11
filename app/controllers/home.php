<?php

class home extends c_controller
{
    public function index ()
    {
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

    	$this->addStyle( 'login' );
        $this->setView('home/index');
    }
}
