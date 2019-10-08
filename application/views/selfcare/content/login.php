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


                    

                    <div class="clearfix"></div>


                    <button type="submit" class="btn btn-default singin-btn">Sign in</button>

                </form>

            </div>
        </div>

        <div class="get-app-title">
            
        </div>
    </div><!--end container-->
    <!-- end login page -->