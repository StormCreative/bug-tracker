<?php

class error extends C_controller
{
    public function access ()
    {
        die ( 'You need to be logged in to access this page.' );
    }

    public function error_404()
    {
    	$this->addStyle( '404' );
        $this->setView('home/404');
    }
}
