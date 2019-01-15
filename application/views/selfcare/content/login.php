    <!-- start login page -->
    <div class="container">
        <div class="login">
             <div class="login-logo text-center">
                <a href="#"><img src="<?php echo ASSET_URL?>assets/img/sign-in.svg" alt="login logo" class="img-fluid"></a>
            </div>

            <div class="card-login mx-auto mt-5">
                    <form action="" method="post" id="singin_form" novalidate="novalidate">
                    <div class="form-group first-field singin-field">
                        <input type="email" name="email" autocomplete="off" class="form-control form-border" id="email" placeholder="Type your email address" title="* Please enter email address">
                    </div>
                    <div class="form-group singin-field">
                        <input type="password" name="password" class="form-control form-border" autocomplete="off" id="pwd" placeholder="Type your password" title="* Please enter password">
                    </div>


                    <div class="checkbox inline-checkbox">
                    <label class="remember-me"><input type="checkbox" id="remember_me" name="_remember_me" checked="checked">
                       <span>Remember me</span></label>
                    </div>

                    <div class="forgot-password">
                      <a href="http://dr-iq-web.local/forgot-password">Forgot password?</a>
                    </div>

                    <div class="clearfix"></div>


                    <button type="submit" class="btn btn-default singin-btn">Sign in</button>

                </form>

            </div>
        </div>

        <div class="register-btn">
             <span>Don't have an account?</span>
            <a href="http://dr-iq-web.local/signup"> <strong>Sign up</strong></a>
        </div>

        <div class="get-app-title">
            <h3>Get the App</h3>

            <div class="app-icons text-center">
                <ul>

                    <li><a href="https://itunes.apple.com/us/app/dr-iq/id1345802108?ls=1&amp;mt=8" target="_blank"><img src="<?php echo ASSET_URL?>assets/img/app.svg" alt="app store" class="img-fluid"></a></li>
                    <li><a href="https://play.google.com/store/apps/details?id=com.attech.attech_android_1.driq" target="_blank"><img src="<?php echo ASSET_URL?>assets/img/google-play-color.svg" alt="google play" class="img-fluid"></a></li>

                </ul>
            </div>
        </div>
    </div><!--end container-->
    <!-- end login page -->