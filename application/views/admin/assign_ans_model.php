<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6">
            <div class="login-body">
                <?php if(isset($errors)){?>
                    <div class="alert alert-danger">
                        <?php print_r($errors);?>
                    </div>
                <?php }?>
                <?php if(isset($success)){?>
                    <div class="alert alert-success">
                        <?php print_r($success);?>
                    </div>
                <?php }?>
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        
                        <div class="form-group">
                            <label for="username" class="control-label">Name</label>
                            <input id="username" class="form-control" type="text" name="name" data-msg-required="Please enter your Pathway Name." required value="<?php echo $question['statement']?>">
                        </div>
                        <div class="form-group">
                            <label>Select Model </label>
                            <select class="form-control" name="ans_model">
                            <?php foreach($models as $model){?>
                                <option value="<?php echo $model['id']?>"><?php echo $model['label']?></option>
                            <?php }?>
                            </select>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Assign</button>
                            <a href="<?php echo base_url().'admin/manage_questions'?>" class="btn btn-warning">Cancel</a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>