<div class="login-area">
    <img src="<?php echo DIRECTORY; ?>assets/images/logo.png" class="logo"/>
    <h1>Content Management</h1>
        <form class="js-login-form" method="POST" name="login-form" action="#" enctype="multipart/form-data">
            <p class="js-error error_message" style="display: none;"></p>
                <p class="email"><i class="icon-envelope"></i><input type="text" class="js-username" /></p>
                <p class="password"><i class="icon-lock"></i><input type="password" class="js-password"/></p>
                <input type="submit" value="Login" class="login-button"/>
                <a href="#" class="forgot-password js-forgot-password">Forgotten Password</a>
                 <p class="email hide"><i class="icon-envelope"></i><input type="email" name="user[email]" class="js-email" value="" placeholder="Email" /></p>
                <input type="submit" name="submit" class="submit-button hide" value="Submit" />
        </form>
    </div>
</div>