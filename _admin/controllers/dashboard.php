<?php

class dashboard extends application_controller
{
    public function index ()
    {
    	$clients_model = new Clients_model();
    	$this->addTag( 'all_clients', $clients_model->all() );

        $this->setView ( 'dashboard/index' );
        $this->addStyle ( 'dashboard' );
    }
}
