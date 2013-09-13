<?php

class Account extends C_controller
{
	public function change_password()
	{
		if( !!$_POST[ 'user' ] ) {

			if() {

			}
			else if( $_POST[ 'user' ][ 'password' ] != $_POST[ 'user' ][ 'confirm_password' ] ) {
				$this->addTag( 'error', 'Your password and confirm password need to be the same' );
			}
		}
	}
}

?>