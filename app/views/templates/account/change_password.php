<div class="wrapper">
	<?php include "assets/includes/header.php"; ?>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Account Settings</h2>
	        <div class="holder">
	        	<form action="#" method="POST" id="js-form" class="js-process-form" enctype="multipart/form-data">

	        		<p class="<?php echo( is_array( $error ) ? 'success_message' : 'error_message' ); ?> <?php echo( !!$error ? '' : 'hide' ); ?>"><?php echo( is_array( $error ) ? $error['msg'] : $error ); ?></p>

	        		<input type="hidden" name="user[clients_id]" value="<?php echo $_SESSION[ 'client' ][ 'clients_id' ]; ?>" />
	        		<input type="hidden" name="user[clients_contacts_id]" value="<?php echo $_SESSION[ 'client' ][ 'id' ]; ?>" />

	        		<p><label for="password" class="form__info--title">Old password</label><input type="password" name="user[password]" class="js-validate" data-type="password" id="password" value="<?php echo $password; ?>" /></p>
	        		<span class="js-error js-error-password error-msg error_message hide">Please provide your current password</span>

	        		<p><label for="new_password" class="form__info--title">New password</label><input type="password" name="user[new_password]" id="new_password" data-type="new-password" class="js-validate" value="<?php echo $new_password; ?>" /></p>
	        		<span class="js-error js-error-new-password error-msg error_message hide">Please provide your new password</span>

	        		<p><label for="confirm_password" class="form__info--title">Confirm New Password</label><input type="password" name="user[confirm_password]" id="confirm_password" class="js-validate" data-type="confirm-new-password" value="<?php echo $confirm_password; ?>" /></p>
	        		<span class="js-error js-error-confirm-new-password error-msg error_message hide">Please provide your confirm new password</span>

	        		<p><label for="save" class="form__info--title save_btn_label">Save button</label><input type="submit" name="submit" value="Save" class="save-button" id="save"/></p>
	        	</form>
	        </div>
		
		</article>
	</section>
</div>