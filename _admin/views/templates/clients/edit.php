<section class="main__content">
	<article class="main__editor">
		<h2><a href="<?php echo DIRECTORY; ?>admin/listing/table/clients" class="back-button icon-arrow-left"></a>clients Edit</h2>
		<form class="main__editor--form" method="post" enctype="multipart/form-data">
			<?php echo $feedback; ?>
			<input type="hidden" name="clients[id]" value="<?php echo $id; ?>" />
			<p><label>Title:</label><input type="text" name="clients[title]" class="medium_input" value="<?php echo $title; ?>"></p>
			<p><label>Url:</label><input type="text" name="clients[url]" class="medium_input" value="<?php echo $url; ?>"></p>
			<p><input type="submit" name="submit" value="Save" class="save-button"/></p>
		</form>
			<div class="holder">
				<h2>Users</h2>
				<p class="js-error"></p>
	            <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table_listing js-table">
	            	<input type="hidden" class="js-title-raw" value="clients_contacts" />
	              <thead>
	                <tr>
	                  <th></th>
	                  <th>Name</th>
	                  <th><a href="<?php echo DIRECTORY; ?>admin/clients_contacts/edit/?id=<?php echo $id; ?>" class="add-button"><i class="icon-plus-sign"></i> Add</a></th>
	                </tr>
	              </thead>
	              <tbody class="js-sortable js-body">
	                <?php foreach ( $clients_contacts as $client ) : ?>
	                	<tr class="js-row-<?php echo $client['id']; ?>" id="<?php echo $client['id']; ?>">
	                        <td><input type="checkbox" name="selected" value="yes" class="checkbox js-delete-checkbox"></td>
	                        <td><?php echo $client[ 'title' ]; ?></td>    
	                        <td>
	                            <a href="<?php echo DIRECTORY; ?>admin/clients_contacts/edit/<?php echo $client['id']; ?>/?id=<?php echo $id; ?>" class="edit_icon icon-pencil"></a>
	                            <a href="#" class="remove_icon icon-remove-sign js-delete-popup" data-table="clients_contacts" data-id="<?php echo $client['id']; ?>"></a>
	                        </td>
	                    </tr>
	            	<?php endforeach; ?>
	              </tbody>
	            </table>
	            <input type="button" class="delete-button js-delete-popup" data-table="door_type" value="Delete">
	        </div>
	</article>
</section>
<script>
	var image_count = <?php echo ( !!$image ? '1' : '0' ); ?>;
	var document_count = <?php echo ( !!$uploads_id && !!$upload_name ? '1' : '0' ); ?>
</script>