<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6">
            <div class="login-body">
                
                <div class="login-form">
                    <?php if(isset($success)){?>
                        <div class="alert alert-success">
                            <?php print_r($success);?>
                        </div>
                    <?php }?>
                        <div class="form-group">
                            <label><b><?php echo $question['statement']?></b></label>
                        </div>
                        <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                                <?php if($form[$i]['type']=='text'){?>
                                    <label><?php echo $form[$i]['caption']?></label>
                                    <input type="text" name="$form[$i]['name']" class="form-control" placeholder="<?php echo $form[$i]['placeholder']?>">
                                <?php }?>
                                <?php if($form[$i]['type']=='radio'){?>
                                <input type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'> <?php echo $form[$i]['caption']?>
                                <?php }?>
                            </div>
                        <?php }?>
                        <?php //echo '<pre>';print_r($pathflow);echo '</pre>';?>
                        <form data-toggle="validator" action="" method="post">
                            <input type="hidden" name="pathway" value="<?php echo $step['pathway']?>">
                            <input type="hidden" name="step" value="<?php echo $step['number']?>">
                            <div class="form-group">
                                <label>Back Step</label>
                                <select class="form-control" name='back' required>
                                    <option value="">Select back step</option>
                                    <option value="0"
                                    <?php 
                                        if($pathflow['back']==0)
                                        {
                                            echo 'selected';
                                        }
                                        ?>
                                    > Initial Step </option>
                                    
                                        <?php
                                        if(count($steps)>0) {
                                            for($i=0;$i<count($steps);$i++)
                                            {?>
                                                <option value="<?php echo $steps[$i]['id']?>"
                                                    <?php 
                                                if($pathflow['back']==$steps[$i]['id'])
                                                {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo $steps[$i]['number']?>
                                                    
                                                </option>
                                            <?php
                                            }}
                                        ?>
                                   
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Next Step</label>
                                <select class="form-control" name='next' required>
                                    <option value="">Select next step</option>
                                    
                                        <?php
                                        if(count($steps)>0) {
                                            for($i=0;$i<count($steps);$i++)
                                            {?>
                                                <option value="<?php echo $steps[$i]['id']?>"
                                                    <?php 
                                                if($pathflow['next']==$steps[$i]['id'])
                                                {
                                                    echo 'selected';
                                                }
                                                ?>><?php echo $steps[$i]['number']?></option>
                                            <?php
                                            }}
                                        ?>
                                    <option value="0" <?php 
                                        if($pathflow['next']==0)
                                        {
                                            echo 'selected';
                                        }
                                        ?>>Last Step</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"> Save </button>
                                <a href="<?php echo base_url().'admin/list_pathflows'?>" class="btn btn-default"> Back </a>
                            </div>
                        </form>

                </div>
            </div>

        </div>
    </div>
</div>
