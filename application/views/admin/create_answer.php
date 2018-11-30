<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6">
            <h3>Create Answer Model</h3>
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
                            <label for="username" class="control-label">Label</label>
                            <input type="text" class="form-control" name="label" />
                        </div>
                        <div class="form-group">
                            <label>Text Boxes</label>
                            <input type="number" name="textboxes" class="form-control" value="0" />
                        </div>
                        <div class="form-group">
                            <label>Radio Boxes</label>
                            <input type="number" name="radioboxes" class="form-control" value="0" />
                        </div>
                        <div class="form-group">
                            <label>Check Boxes</label>
                            <input type="number" name="checkboxes" class="form-control" value="0" />
                        </div>
                        <div class="form-group">
                            <label>Text Area</label>
                            <input type="number" name="textarea" class="form-control" value="0" />
                        </div>
                        <div class="form-group">
                            <label>Drop Down Select</label>
                            <input type="number" name="dropdown" class="form-control" value="0" />
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Create</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>