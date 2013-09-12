<section class="main__content">
	<article class="main__editor">
		<h2><a href="<?php echo DIRECTORY; ?>admin/clients/edit/<?php echo $_GET[ 'id' ]; ?>" class="back-button icon-arrow-left"></a>clients contacts Edit <a href="<?php echo DIRECTORY; ?>admin/clients_contacts/edit" class="add-another">+ add another</a></h2>
		<form class="main__editor--form" method="post" enctype="multipart/form-data">
			<?php echo $feedback; ?>
			<input type="hidden" name="clients_contacts[id]" value="<?php echo $id; ?>" />
			<p><label>Title:</label><input type="text" name="clients_contacts[title]" class="medium_input" value="<?php echo $title; ?>"></p>
			<p><label>Email:</label><input type="text" name="clients_contacts[email]" class="medium_input" value="<?php echo $email; ?>"></p>

			<?php if( !!$password ) : ?>
				<p>Entering a password will change this users password</p>
			<?php endif; ?>

			<p><label>Password:</label><input type="password" name="clients_contacts[password]" class="medium_input" value=""></p>
			<input type="hidden" name="clients_contacts[clients_id]" class="medium_input" value="<?php echo $_GET[ 'id' ]; ?>">
			<p><input type="submit" name="submit" value="Save" class="save-button"/></p>
		</form>
	</article>
</section>
<script>
	var image_count = <?php echo ( !!$image ? '1' : '0' ); ?>;
	var document_count = <?php echo ( !!$uploads_id && !!$upload_name ? '1' : '0' ); ?>
</script>