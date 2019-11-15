  <!-- Page Content -->
  <div class="container inner-pg ">
    <div class="row">
    <div class="col-md-4 offset-md-4">
        <?php if($success){?>
            <div class="alert alert-success">
                <?php echo $success;?>
            </div>
        <?php }?>
        <p style="">
            Update Password
        </p>
    </div>
    <div class="col-md-12"></div>
    
        <div class="col-lg-4 offset-md-4">
        <?php if($errors){?>
            <div class="alert alert-danger">
                <?php print_r($errors);?>
            </div>
        <?php }?>
            <form data-toggle="validator" action="" method="post">    
                <div class="form-group">
                    <label>New password</label>
                    <input type="password" name="password"  class='form-control' required>
                </div>
                <div class="form-group">
                    <label>Confirm password</label>
                    <input type="password" name="conf_password"  class='form-control' required>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Update </button>
                    <a href="<?php echo base_url().'selfcare/profile'?>" class="btn btn-danger">Cancel</a>
                </div>
            </form>
            <div class="clearfix"></div>
            
        </div> <!-- row -->
    </div>  
</div>
