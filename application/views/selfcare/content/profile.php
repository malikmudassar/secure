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
        This profile will only be used in EZ Triage environment and has no association with your account on apps associated to it. 
        </p>
    </div>
    <div class="col-md-12"></div>
    
        <div class="col-lg-4 offset-md-4">
            <form data-toggle="validator" action="" method="post">    
                <div class="form-group">
                    <label>Email</label>
                    <input type="text" name="email" disabled class='form-control' value="<?php echo $user['email']?>">
                </div>
                <div class="form-group">
                    <label>Name</label>
                    <input type="text" name="name" class='form-control' value="<?php echo $user['name']?>">
                </div>
                <div class="form-group">
                    <label>Age</label>
                    <input type="number" name="age" class='form-control' value="<?php echo $user['age']?>">
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        <option value="Male"
                        <?php if($user['gender']=='Male'){ echo 'selected';}?>
                        >Male</option>
                        <option value="Female"
                        <?php if($user['gender']=='Female'){ echo 'selected';}?>
                        >Female</option>
                    </select>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-blue"> Update </button>
                </div>
            </form>
            <div class="clearfix"></div>
            
        </div> <!-- row -->
    </div>  
</div>
