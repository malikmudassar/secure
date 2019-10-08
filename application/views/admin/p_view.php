<div class="layout-content">
    <div class="layout-content-body">
        <div class="col-md-8">
            <div class="login-body">
                
                <div class="login-form">
                    <form data-toggle="validator" action="<?php echo base_url().'admin/pq_view'?>" method="post">
                        <div class="form-group">
                            <label><b><?php echo $question['question']['statement']?></b></label>
                        </div>
                        <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                                <input type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'> <?php echo $form[$i]['caption']?>
                            </div>
                        <?php }?>
                        <input type="hidden" name="pathway" value="<?php echo $question['pathway']?>">
                        <input type="hidden" name="step" value="<?php echo $question['step']?>">
                        <input type="hidden" name="back" value="<?php echo $question['back']?>">
                        <input type="hidden" name="next" value="<?php echo $question['next']?>">
                        <div class="form-group">
                            <div class="row">
                                <pre>
                                <?php print_r($question);?>
                            </pre>
                                <div class="col-md-6" style="padding-left: 0px;">
                                    
                                    <a href="<?php echo base_url().'admin/pb_view/'.$question['pathway'].'/'.$question['back'].'/'.$question['step']?>" class="btn btn-primary" <?php if($question['back']==0){?> disabled <?php }?>>Back</a>
                                    
                                </div>
                                <div class="col-md-6">
                                    <button type="submit" class="btn btn-primary"> Next </button>
                                    
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
