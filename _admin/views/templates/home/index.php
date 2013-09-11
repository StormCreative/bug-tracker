<div class="login-area">
    <img src="<?php echo DIRECTORY; ?>assets/images/logo.png" class="logo"/>
    <h1>Content Management</h1>
        <form class="js-login-form" method="POST" name="login-form" action="#" enctype="multipart/form-data">
            <p class="js-error error_message" style="display: none;"></p>
                <p class="email"><i class="icon-envelope"></i><input type="text" class="js-username" placeholder="Email"/></p>
                <p class="password"><i class="icon-lock"></i><input type="password" class="js-password" placeholder="Password"/></p>
                <input type="submit" value="Login" class="login-button"/>
                <a href="#" class="forgot-password js-forgot-password">Forgotten Password</a>
                 <p class="email hide"><i class="icon-envelope"></i><input type="email" name="user[email]" class="js-email" value="" placeholder="Email" /></p>
                <input type="submit" name="submit" class="submit-button hide" value="Submit" />
                <!--<ul>
                    <li>Remember me <input type="checkbox" name="remember" value="remember"></li>
                    <li><a href="#" class="js-forgotten-password-button">Forgotten password</a></li>
                </ul>-->
        </form>
    </div>
    <!--<div class="forgotten-form">
        <form method="POST" name="forgotten-password-form" action="#" enctype="multipart/form-data" class="js-forgotten-password">
            <dl>
                <dt>Email</dt>
                <dd><input type="text" class="js-forgot-password-email" class="email_address"/></dd>
            </dl>
            <input type="submit" value="Get new password" class="login-button"/>
        </form>-->
</div>