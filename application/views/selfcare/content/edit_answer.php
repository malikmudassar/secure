<div class="dashboard-navigation-bar">
    <!--start navigation bar -->


<!--end navigation bar -->
</div>
<div class="container">
    <div class="pathwaysContent maincontent-space" style="padding-top:25px;border:1px solid #ccc; background-color:#f0eded; margin-bottom:0px; padding-left:40px; padding-right:20px; padding-bottom:5em; margin-top:50px;">
        <div class="pathways" >
            
            <div class="login-form" >
                    <form action="" method="post">

                         <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                               
                                <?php if($form[$i]['type']=='radio'){?>
                                
                                <input type="text" name="ans[]" value="<?php echo $form[$i]['caption']?>" class="form-control">
                                <?php }?>
                                <?php if($form[$i]['type']=='checkbox'){?>
                                <input type="text" name="ans[]" value="<?php echo $form[$i]['caption']?>" class="form-control">
                                <?php }?>
                            
                            </div>
                            <?php }
                            // echo 'Question: <pre>';print_r($question);echo '</pre>';
                            ?>
                            <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                                <?php if($form[$i]['type']=='text'){?>
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label><?php echo $form[$i]['caption']?></label>
                                            <input type="text" name="<?php echo $form[$i]['name']?>" class="form-control" placeholder="<?php echo $form[$i]['placeholder']?>" 
                                            value="<?php echo $answer[$i]['value']?>">
                                        </div>
                                    </div>
                                <?php }?>
                            </div>
                            <?php }
                                // echo '<pre>';
                                // echo 'step:'.$step.'<br>';
                                // echo 'back:'.$back.'<br>';
                                // echo 'next:'.$next.'<br>';
                                // echo 'user_id:'.$user_id.'<br>';
                                // echo '</pre>';
                            ?>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary"
                            style=""
                            >
                                Update
                            </button>
                        </div>                   

                    </form>
                   

                </div>
            
        </div><!--end pathways-->
    </div>
</div>