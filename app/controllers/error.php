<?php

class error extends C_controller
{
    public function access ()
    {
        die ( 'You need to be logged in to access this page.' );
    }

    public function error_404()
    {
    	die( 'This will be where the 404 page will appear' );
    }
}
