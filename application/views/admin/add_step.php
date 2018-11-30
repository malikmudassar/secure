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
                            <label for="username" class="control-label">Pathway Name</label>
                            <select class="form-control" name="pathway">
                                <?php
                                if(count($pathways)>0) {
                                    for($i=0;$i<count($pathways);$i++)
                                    {?>
                                        <option value="<?php echo $pathways[$i]['id']?>"><?php echo $pathways[$i]['name']?></option>
                                    <?php
                                    }}
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Step #</label>
                            <input type="number" class="form-control" name="number" />
                        </div>
                        <div class="form-group">
                            <label for="username" class="control-label">Type</label>
                            <select class="form-control" name="type">
                                <option value="info"> Info </option>
                                <option value="age"> Age Check </option>
                                <option value="question"> Question </option>
                                <option value="condition"> Condition </option>
                                <option value="calculation"> Calculation </option>
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <button class="btn btn-primary btn-block" type="submit">Add Step</button>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>