<section class="main__content">
	<article class="main__editor">
		<h1 class="main__editor--heading"><a href="<?php echo DIRECTORY; ?>admin/listing/table/bugs" class="back-button icon-arrow-left"></a>bugs Edit</h1>
		<form class="main__editor--form" method="post" enctype="multipart/form-data">
			<?php echo $feedback; ?>
			<input type="hidden" name="bugs[id]" value="<?php echo $id; ?>" />
			<p><label>clients_contacts_id:</label><input type="text" name="bugs[clients_contacts_id]" class="medium_input" value="<?php echo $clients_contacts_id; ?>"></p><p><label>url:</label><input type="text" name="bugs[url]" class="medium_input" value="<?php echo $url; ?>"></p><p><label>browser:</label><input type="text" name="bugs[browser]" class="medium_input" value="<?php echo $browser; ?>"></p><p><label>operating_system:</label><input type="text" name="bugs[operating_system]" class="medium_input" value="<?php echo $operating_system; ?>"></p><p><label>device:</label><input type="text" name="bugs[device]" class="medium_input" value="<?php echo $device; ?>"></p><p><label>severity:</label><input type="text" name="bugs[severity]" class="medium_input" value="<?php echo $severity; ?>"></p><div class="js-upload-container" data-type="image"></div>
<?php if ( !!$gallery_items ) : ?>
    <?php foreach ( $gallery_items as $item ) : ?>
        <div id="<?php echo $item['imgname'] ?>" class="image_<?php echo $item[ 'id' ]; ?>">
            <span class="images_holder"><img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/<?php echo $item[ 'imgname' ]; ?>" /></span>
            <ol class="hoz btns">
                <input type="hidden" name="multi-image[<?php echo $item[ 'imgname' ]; ?>][id]" value="<?php echo $item[ 'id' ]; ?>" />
                <input type="hidden" name="multi-image[<?php echo $item[ 'imgname' ]; ?>][imgname]" value="<?php echo $item[ 'imgname' ]; ?>" />
                <input type="button" class="del-image js-delete-image delete-btn" data-id="<?php echo $item[ 'id' ]; ?>" data-imagename="<?php echo $item[ 'imgname' ]; ?>"  data-type="<?php echo $item[ 'imgname' ]; ?>" value="Delete" /></li>
            </ol>
        </div>
    <?php endforeach; ?>
<?php endif; ?><p><label>reproduce:</label><input type="text" name="bugs[reproduce]" class="medium_input" value="<?php echo $reproduce; ?>"></p>description <textarea class="js-wysiwyg" name="bugs[description]"><?php echo $description; ?></textarea><p><label>flagged:</label><input type="text" name="bugs[flagged]" class="medium_input" value="<?php echo $flagged; ?>"></p><p><label>fixed:</label><input type="text" name="bugs[fixed]" class="medium_input" value="<?php echo $fixed; ?>"></p>
			<p><input type="submit" name="submit" value="Save" /></p>
		</form>
	</article>
</section>
<script>
	var image_count = <?php echo ( !!$image ? '1' : '0' ); ?>;
	var document_count = <?php echo ( !!$uploads_id && !!$upload_name ? '1' : '0' ); ?>
</script>