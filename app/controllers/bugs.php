<?php
    class Bugs extends C_Controller {

        public function listing()
        {
        	$this->addStyle( 'listing' );
        	$this->setView('bugs/listing');
        }

    }
  ?>
