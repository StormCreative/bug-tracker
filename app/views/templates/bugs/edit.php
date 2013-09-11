<div class="wrapper">
	<?php include "assets/includes/header.php"; ?>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Report a bug <a href="<?php echo DIRECTORY; ?>admin/candidates/edit" class="add-another"><i class="icon-plus-sign"></i> Add Another</a></h2>
	        <?php if( !!$success ) : ?>
	          <p class="success_message"><?php echo $success; ?></p>
	        <?php endif; ?>
	        <?php if( !!$error ) : ?>
	          <p class="success_message"><?php echo $error; ?></p>
	        <?php endif; ?>
	        <div class="holder">
	        	<form action="#" method="POST" enctype="multipart/form-data">
	        		<input type="hidden" name="bug[id]" value="<?php echo $id; ?>" />
	        		<input type="hidden" name="bug[clients_id]" value="<?php echo $_SESSION[ 'client' ][ 'clients_id' ]; ?>" />
	        		<input type="hidden" name="bug[clients_contacts_id]" value="<?php echo $_SESSION[ 'client' ][ 'id' ]; ?>" />

	        		<p><label for="name" class="form__info--title">Summary</label><input type="text" name="bug[summary]" id="name" value="<?php echo $summary; ?>" /></p>
	        		<p><label for="url" class="form__info--title">URL</label><input type="text" name="bug[url]" id="url" value="<?php echo $url; ?>" /></p>
	        		<p><label for="device" class="form__info--title">Device</label><input type="text" name="bug[device]" id="device" value="<?php echo $device; ?>" /></p>
	        		<p>
	        			<label for="operating-system" class="form__info--title">Operating System</label>
	        			<input type="text" name="bug[operating_system]" id="operating-system" value="<?php echo $operating_system; ?>" />
	        		</p>
	        		<p>
	        			<label for="browser" class="form__info--title">Browser</label>
	        			<input type="text" name="bug[browser]" id="browser" value="<?php echo $browser; ?>" />
	        		</p>
	        		<p>
	        			<label for="severity" class="form__info--title">Severity</label>
	        			<select name="bug[severity]" id="severity">
	        				<option></option>
	        				<option value="Minor" <?php echo( $severity == 'Minor' ? 'selected="selected"' : '' ); ?>>Minor</option>
	        				<option value="Major" <?php echo( $severity == 'Major' ? 'selected="selected"' : '' ); ?>>Major</option>
	        				<option value="Visual" <?php echo( $severity == 'Visual' ? 'selected="selected"' : '' ); ?>>Visual</option>
	        			</select>
	        		</p>

	        		<p>
	        			<label for="screenshot" class="form__info--title">Upload screenshot</label>
	        			<div class="js-upload-container" data-type="image"></div>
						<?php if ( !!$image ) : ?>
							<div class="js-saved-image">
								<input type="hidden" name="image" class="js-hidden-name" value="<?php echo $image; ?>" />
								<img src="<?php echo DIRECTORY; ?>_admin/assets/uploads/images/<?php echo $image; ?>" />
								<button type="button" class="js-delete-image delete-btn" data-imagename="<?php echo $image; ?>">Delete</button>
							</div>
						<?php endif; ?>
	        		</p>

	        		<p>
	        			<label for="reproduce" class="form__info--title">Can you reproduce</label>
	        			<input type="radio" name="bug[reproduce]" value="1" id="yes" <?php echo( $reproduce == 1 ? 'checked="checked"' : '' ); ?> />
	        			<label for="yes">Yes</label>
	        			<input type="radio" name="bug[reproduce]" value="0" id="no" <?php echo( $reproduce == 0 ? 'checked="checked"' : '' ); ?> />
	        			<label for="no">No</label>
	        		</p>

	        		<p>
	        			<label for="desc" class="form__info--title">Description</label>
	        			<textarea id="desc" name="bug[description]"><?php echo $description; ?></textarea>
	        		</p>
	        		<p><label for="save" class="form__info--title save_btn_label">Save button</label><input type="submit" name="submit" value="Save" class="save-button" id="save"/></p>
	        	</form>
	        </div>
		</article>
	</section>
</div>