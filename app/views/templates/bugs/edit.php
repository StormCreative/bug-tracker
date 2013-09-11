<div class="wrapper">
	<header class="header">
		<img src="<?php echo DIRECTORY; ?>assets/images/logo.png" class="logo"/>
		<h1>Bug Tracker</h1>
		<a href="#" class="signout"><i class="icon-signout"></i> Log out</a>
	</header>
	<section class="main_list">
		<aside class="filter">
		</aside>
		<article class="listing">
			<h2>Report a bug <a href="<?php echo DIRECTORY; ?>admin/candidates/edit" class="add-another"><i class="icon-plus-sign"></i> Add Another</a></h2>
	        <?php if( !!$success_message ) : ?>
	          <p class="success_message"><?php echo $success_message; ?></p>
	        <?php endif; ?>
	        <div class="holder">
	        	<form>
	        		<p><label for="name" class="form__info--title">Summary</label><input type="text" name="name" id="name"></input></p>
	        		<p><label for="device" class="form__info--title">Device</label><input type="text" name="device" id="device"></input></p>
	        		<p><label for="operating-system" class="form__info--title">Operating System</label><input type="text" name="operating-system" id="operating-system"></input></p>
	        		<p><label for="browser" class="form__info--title">Browser</label><input type="text" name="browser" id="browser"></input></p>
	        		<p><label for="severity" class="form__info--title">Severity</label><input type="text" name="severity" id="severity"></input><small> eg. Minor, Major and Visual</small></p>
	        		<p><label for="screenshot" class="form__info--title">Upload screenshot</label><input type="text" name="screenshot" id="screenshot"></input></p>
	        		<p><label for="reproduce" class="form__info--title">Can you reproduce</label><input type="radio" name="yes" value="yes" id="yes"><label for="yes">Yes</label><input type="radio" name="no" value="no" id="yes"><label for="no">No</label></p>
	        		<p><label for="desc" class="form__info--title">Description</label><textarea id="desc"></textarea></p>
	        		<p><label for="save" class="form__info--title save_btn_label">Save button</label><input type="submit" name="submit" value="Save" class="save-button" id="save"/></p>
	        	</form>
	        </div>
		</article>
	</section>
</div>