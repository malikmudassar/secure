<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-6">
            <div class="login-body">
                
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
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
                        <div class="form-group">
                            <a href="<?php echo base_url().'admin/manage_questions'?>" class="btn btn-primary"> Back </a>
                        </div>

                    </form>
                </div>
            </div>

        </div>
    </div>
</div>