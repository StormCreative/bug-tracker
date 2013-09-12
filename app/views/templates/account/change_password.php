<div class="wrapper">
	<?php include "assets/includes/header.php"; ?>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Account Settings</h2>
	        <div class="holder">
	        	<form action="#" method="POST" enctype="multipart/form-data">
	        		<input type="hidden" name="bug[id]" value="<?php echo $id; ?>" />
	        		<input type="hidden" name="bug[clients_id]" value="<?php echo $_SESSION[ 'client' ][ 'clients_id' ]; ?>" />
	        		<input type="hidden" name="bug[clients_contacts_id]" value="<?php echo $_SESSION[ 'client' ][ 'id' ]; ?>" />

	        		<p><label for="name" class="form__info--title">New password</label><input type="text" name="bug[summary]" id="name" value="<?php echo $summary; ?>" /></p>
	        		<p><label for="url" class="form__info--title">Confirm New Password</label><input type="text" name="bug[url]" id="url" value="<?php echo $url; ?>" /></p>
	        		<p><label for="save" class="form__info--title save_btn_label">Save button</label><input type="submit" name="submit" value="Save" class="save-button" id="save"/></p>
	        	</form>
	        </div>
		
		</article>
	</section>
</div>