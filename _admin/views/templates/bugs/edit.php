<section class="main__content">
	<article class="main__editor">
		<h2><a href="<?php echo DIRECTORY; ?>admin/bugs/listing/<?php echo $_GET[ 'client_id' ]; ?>" class="back-button icon-arrow-left"></a>bugs Edit</h2>
		<form class="main__editor--form" method="post" enctype="multipart/form-data">
			<?php echo $feedback; ?>
			<input type="hidden" name="bugs[id]" value="<?php echo $id; ?>" />

			<input type="hidden" name="bugs[clients_contacts_id]" class="medium_input" value="<?php echo $clients_contacts_id; ?>">
			<input type="hidden" name="bugs[clients_id]" class="medium_input" value="<?php echo $_GET[ 'client_id' ]; ?>">

			<p>
				<label for="bugs[summary]">Summary</label>
				<input type="text" name="bugs[summary]" class="medium_input" value="<?php echo $summary; ?>">
			</p>

			<p><label>Url:</label><input type="text" name="bugs[url]" class="medium_input" value="<?php echo $url; ?>"></p>
			<p><label>Browser:</label><input type="text" name="bugs[browser]" class="medium_input" value="<?php echo $browser; ?>"></p>
			<p><label>Operating system:</label><input type="text" name="bugs[operating_system]" class="medium_input" value="<?php echo $operating_system; ?>"></p>
			<p><label>Device:</label><input type="text" name="bugs[device]" class="medium_input" value="<?php echo $device; ?>"></p>
			<p>
				<label for="bugs[severity]">Severity:</label>
				<select name="bugs[severity]">
					<option value=""></option>
					<option value="Major">Major</option>
					<option value="Minor">Minor</option>
					<option value="Visual">Visual</option>
				</select>
			</p>

			<p>Upload a screen shot of the error</p>
			<div class="js-upload-container" data-type="image"></div>
			<?php if ( !!$image ) : ?>
				<div class="js-saved-image">
					<input type="hidden" name="image" class="js-hidden-name" value="<?php echo $image; ?>" />
					<img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/<?php echo $image; ?>" />
					<button type="button" class="js-delete-image delete-btn" data-imagename="<?php echo $image; ?>">Delete</button>
				</div>
			<?php endif; ?>

			<p>
				<label>Able to reproduce:</label>
				Yes <input type="radio" name="bugs[reproduce]" <?php echo( !!$reproduce == 1 ? 'checked="checked"' : '' ); ?> value="1">
				No <input type="radio" name="bugs[reproduce]" <?php echo( !!$reproduce == 0 ? 'checked="checked"' : '' ); ?> value="0">
			</p>

			Description <textarea class="js-wysiwyg" name="bugs[description]"><?php echo $description; ?></textarea>

			<p>Assign users to this bug</p>
			<?php foreach( Access_model::all_users() as $user ) : ?>
				<p><?php echo $user[ 'title' ]; ?> <input type="checkbox" name="bugs[assigned][]" <?php echo( in_array( $user[ 'id' ], explode( ',', $assigned ) ) ? 'checked="checked"' : '' ); ?> value="<?php echo $user[ 'id' ]; ?>" /></p>
			<?php endforeach; ?>

			<hr>
			<p>
				<label for="bugs[fixed]">Mark as fixed</label>
				<input type="checkbox" name="bugs[fixed]" <?php echo( !!$fixed ? 'checked="checked"' : '' ); ?> value="1" />
			</p>

			<?php if( cms_admin() ) : ?>
				<p>
					<label for="bugs[closed]">Mark as closed</label>
					<input type="checkbox" name="bugs[closed]" <?php echo( !!$closed ? 'checked="checked"' : '' ); ?> value="1" />
				</p>
			<?php endif; ?>

			<input type="hidden" name="bugs[flagged]" class="medium_input" value="<?php echo $flagged; ?>">

			<p><input type="submit" name="submit" value="Save" class="save-button"/></p>
		</form>
	</article>
</section>
<script>
	var image_count = <?php echo ( !!$image ? '1' : '0' ); ?>;
	var document_count = <?php echo ( !!$uploads_id && !!$upload_name ? '1' : '0' ); ?>
</script>