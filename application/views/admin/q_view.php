<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-8">
            <div class="login-body">
                
                <div class="login-form">
                    <form data-toggle="validator" action="" method="post">
                        <div class="form-group">
                            <label><b><?php echo $question['statement']?></b></label>
                        </div>
                        <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                                <input type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'> <?php echo $form[$i]['caption']?>
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