<?php

class Account extends C_controller
{
	public function change_password()
	{
		if( !!$_POST[ 'user' ] ) {

			if( $_POST[ 'user' ][ 'new_password' ] != $_POST[ 'user' ][ 'confirm_password' ] ) {
				$error = 'Your password and confirm password need to be the same';
			}
			else if( Clients_contacts_model::check_current_password( $_POST[ 'user' ][ 'clients_contacts_id' ], $_POST[ 'user' ][ 'password' ] ) == FALSE ) {
				$error = 'Your current password is incorrect';
			}
			else {
				$clients_model = new Clients_contacts_model();

				if( $clients_model->save( array( 'id' => $_POST[ 'user' ][ 'clients_contacts_id' ], 'password' => sha1( $_POST[ 'user' ][ 'new_password' ] ) ) ) ) {
					$error = array( 'class' => 'success_message',
									'msg' => 'Your password has been changed successfully' );
				}
				else {
					$error = 'Your password could not be saved at this time';
				}
			}

			$this->addTag( 'error', $error );
		}

		$this->addStyle( 'account' );
        $this->setView('account/change_password');
	}
}

?>