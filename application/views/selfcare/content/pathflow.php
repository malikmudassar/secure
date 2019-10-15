<div class="dashboard-navigation-bar">
    <!--start navigation bar -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top dashboard-top-fix" style="background-color:#1556e8 !important">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive_d" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="navbar-collapse doc_dashboard_m_hide" id="navbarResponsive_d">
            <ul class="navbar-nav dashboard-menu doc_menu_ul_list">
                <li class="nav-item active menu_hide_border">
                    <a class="menu_link_pading nav-link book-appointment-icon" href="<?php echo base_url().'selfcare'?>"><span style="color:#fff;">Home</span></a>
                </li>
                <li class="nav-item active menu_hide_border">
                    <a class="menu_link_pading nav-link book-appointment-icon" href="#">
                        <span style="color:#fff;"><?php echo $p_name?></span></a>
                </li>               
            </ul>

        </div>
    </div>
</nav>

<!--end navigation bar -->
</div>
<div class="container">
    <div class="pathwaysContent maincontent-space" style="border:1px solid #ccc; background-color:#f0eded; margin-bottom:0px; padding-left:40px; padding-right:20px; margin-top:50px;">
        <div class="pathways" >
            
            <div class="login-form" >
                    <form data-toggle="validator" action="<?php echo base_url().'selfcare/pq_view'?>" method="post">
                        <div class="form-group">
                            <label><b><?php echo $question['statement']?></b></label><br>
                            <a href="<?php base_url().''?>"><i class="fa fa-pencil"></i> Edit Question</a>
                        </div>
                        <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                                
                                <?php if($form[$i]['type']=='radio'){?>
                                <input class="w3-radio" type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'
                                <?php 
                                if(!empty($answer))
                                {
                                    if($form[$i]['value']==$answer[0]['value'])
                                    {
                                        echo 'checked';
                                    }
                                }
                                ?>
                                required> <?php echo $form[$i]['caption']?> </input>
                                <?php }?>
                                <?php if($form[$i]['type']=='checkbox'){?>
                                <input class="w3-radio" type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'
                                    <?php 
                                    if(in_array($form[$i]['value'], explode(',', $answer[0]['value'])))
                                    {
                                        echo 'checked';
                                    }
                                    ?>
                                > <?php echo $form[$i]['caption']?>
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
                        
                        <a href="<?php base_url().''?>"><i class="fa fa-pencil"></i> Edit Answer</a>
                        <input type="hidden" name="pathway" value="<?php echo $question['pathway']?>">
                        <input type="hidden" name="user_id" value="1546">
                        <input type="hidden" name="age" value="29">
                        <input type="hidden" name="gender" value="male">
                        <input type="hidden" name="step" value="<?php echo $step?>">
                        <input type="hidden" name="back" value="<?php echo $back?>">
                        <input type="hidden" name="next" value="<?php echo $next?>">
                        <input type="hidden" name="user_id" value="1546">
                        <div class="form-group" style="margin-bottom:10px;">
                            <div class="row" style="margin-bottom:0px; padding-top:50px;">
                                <div class="col-md-6" style="padding-left: 0px;">
                                    <?php if($back!=0){?>
                                    <a href="<?php echo base_url().'selfcare/pb_view/'.$question['pathway'].'/'.$back.'/'.$step?>" class="btn btn-default preview-btn"   >Previous</a>

                                    <?php }?>
                                </div>
                                <div class="col-md-6 bt-next" >
                                	<?php if($next!=0){?>
	                                    <button type="submit" class="btn btn-default preview-btn pull-right" id="nextMoveButton" style="margin-top:0px;">
	                                    <?php if($back==0){?>
	                                    Let's start
	                                	<?php }else{?>
	                                		Next 
	                                	<?php }?>
                                	</button>
                                	<?php }else{?>
                                		<a href="<?php echo base_url().'selfcare/online'?>" class="btn btn-default preview-btn pull-right"> Finish </a>
                            		<?php }?>
                                    
                                </div>
                            </div>
                        </div>

                    </form>
                    <div class="col-md-12">
                        <form id="feedback" method="post" type="">
                            <div class="form-group">
                                <label>Feedback</label>
                                <textarea class="form-control" name="feedback"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Screenshot or Image</label>
                                <input type="file" name="file" />
                            </div>
                        </form>
                    </div>

                </div>
            
        </div><!--end pathways-->
    </div>
</div>