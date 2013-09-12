<?php

class login extends c_controller
{
    public function index ()
    {
        $this->setView('login/index');
        $this->addStyle ( 'login' );
        $this->setScript ( 'login' );
    }

    public function logout()
    {
    	session_destroy();
    	header( "Location: " . DIRECTORY . "admin" );
    }
}
