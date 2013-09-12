<?php

class Account extends C_controller
{
	public function change_password()
	{
		$this->addStyle( 'account' );
        $this->setView('account/change_password');
	}
}

?>