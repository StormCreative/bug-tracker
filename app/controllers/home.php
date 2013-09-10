<?php

class home extends c_controller
{
    public function index ()
    {

    	$this->addStyle( 'login' );
        $this->setView('home/index');
    }
}
