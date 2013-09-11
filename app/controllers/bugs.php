<?php
    class Bugs extends C_Controller {

        public function listing()
        {
        	$this->addStyle( 'listing' );
        	$this->setView('bugs/listing');
        }

        public function edit()
        {
        	$this->addStyle( 'edit' );
        	$this->setView('bugs/edit');
        }

    }
  ?>
