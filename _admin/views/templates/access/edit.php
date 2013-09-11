<section class="main__content">
	<article class="main__editor">
		<h2><a href="<?php echo DIRECTORY; ?>admin/listing/table/access" class="back-button icon-arrow-left"></a>access Edit <a href="<?php echo DIRECTORY; ?>admin/access/edit" class="add-another">add another +</a></h2>
		<form class="main__editor--form" method="post" enctype="multipart/form-data">
			<?php echo $feedback; ?>
			<input type="hidden" name="access[id]" value="<?php echo $id; ?>" />

			<p><label>Name:</label><input type="text" name="access[title]" class="medium_input" value="<?php echo $title; ?>"></p>
			<p><label>Email:</label><input type="text" name="access[email]" class="medium_input" value="<?php echo $email; ?>"></p>

			<?php if( !!$password ) : ?>
				<p>Entering a password will overwrite the existing</p>
			<?php endif; ?>

			<p><label>Password:</label><input type="password" name="access[password]" class="medium_input" value=""></p>
			<p><label>Gravatar:</label><input type="text" name="access[gravatar]" class="medium_input" value="<?php echo $gravatar; ?>"></p>

			<p>
				<label for="access[level]">Access level:</label>
				<select name="access[level]">
					<option value=""></option>
					<option value="1" <?php echo( $level == 1 ? 'selected="selected"' : '' ); ?>>Super admin</option>
					<option value="0" <?php echo( $level == 0 ? 'selected="selected"' : '' ); ?>>Normal</option>
				</select>
			</p>

			<p><input type="submit" name="submit" value="Save" /></p>
		</form>
	</article>
</section>
<script>
	var image_count = <?php echo ( !!$image ? '1' : '0' ); ?>;
	var document_count = <?php echo ( !!$uploads_id && !!$upload_name ? '1' : '0' ); ?>
</script>