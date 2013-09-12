<div class="login-area">
	<img src="<?php echo DIRECTORY; ?>assets/images/logo.png" class="logo"/>
	<h1>Bug Tracker</h1>
	<p class="error_message hide"><?php echo $error; ?></p>
	<form action="#" id="js-form" method="POST" class="js-process-form">

		<p class="email">
			<i class="icon-envelope"></i>
			<input type="email" name="login[email]" class="js-validate" data-type="email" value="" placeholder="Email" />
			<span class="js-error js-error-email error-msg error_message hide">Please provide your email</span>
		</p>

		<p class="password">
			<i class="icon-lock"></i>
			<input type="password" name="login[password]" class="js-validate" data-type="password" value="" placeholder="Password"/>
			<span class="js-error js-error-password error-msg error_message hide">Please provide your password</span>
		</p>

		<input type="submit" name="submit" class="login-button" value="Login" />
	</form>

	<a href="#" class="forgot-password js-forgot-password" data-area="forgot-password-area">Forgotten Password</a>
	<div class="js-forgot-password-area <?php echo !!$show ? '' : 'hide'; ?>">
		<p><?php echo $forgot_error; ?></p>
		<?php if( $success == FALSE ) : ?>
			<form action="#" method="POST" class="js-process-form">
				<p class="email">
					<i class="icon-envelope"></i>
					<input type="email" name="user[email]" class="js-validate" data-type="email-forgot" value="" placeholder="Email" />
					<span class="js-error js-error-email-forgot error-msg hide">Please provide your email</span>
				</p>
				<input type="submit" name="submit" class="submit-button" value="Submit" />
			</form>
		<?php else : ?>
			<p><?php echo $forgot_success; ?></p>
		<?php endif; ?>
	</div>
</div>