<div class="dashboard-navigation-bar">
    <!--start navigation bar -->

<nav class="navbar navbar-expand-lg navbar-dark fixed-top dashboard-top-fix">
    <div class="container">

        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive_d" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
            <!-- <span class="navbar-toggler-icon"></span> -->
        </button>
        <div class="navbar-collapse doc_dashboard_m_hide" id="navbarResponsive_d">
            <ul class="navbar-nav dashboard-menu doc_menu_ul_list">
                                    <li class="nav-item active menu_hide_border">
                        <a class="menu_link_pading nav-link book-appointment-icon" href="https://app.dr-iq.com/secure/appointment/options"><span>Book Appointment</span></a>
                    </li>
                                    <li class="nav-item active menu_hide_border">
                        <a class="menu_link_pading nav-link online-consultation-icon" href="https://app.dr-iq.com/secure/self-care/"><span>Online Consultation</span></a>
                    </li>
                                    <li class="nav-item active menu_hide_border">
                        <a class="menu_link_pading nav-link medications-icon" href="https://app.dr-iq.com/secure/medication/"><span>Medications</span></a>
                    </li>
                                    <li class="nav-item active menu_hide_border">
                        <a class="menu_link_pading nav-link my-surgery-icon" href="https://app.dr-iq.com/secure/my-surgery"><span>My Surgery</span></a>
                    </li>
                            </ul>

        </div>
    </div>
</nav>

<!--end navigation bar -->
</div>
<div class="container">
    <div class="pathwaysContent maincontent-space">
        <div class="pathways">
            <div style="padding-bottom: 20px;">
            	<b><?php echo $this->session->userdata['name']?></b> | <?php echo $this->session->userdata['gender']?>, <?php echo $this->session->userdata['age']?> yrs <?php if($this->session->userdata['flag']=='red'){?><span style="background:<?php echo $this->session->userdata['flag']?>"> ____ </span><?php }?>
            	
            	
            </div>
            <div class="login-form">
                    <form data-toggle="validator" action="<?php echo base_url().'selfcare/pq_view'?>" method="post">
                        <div class="form-group">
                            <label><b><?php echo $question['question']['statement']?></b></label>
                        </div>
                        <?php for($i=0;$i<count($form);$i++){?>
                            <div class="form-group">
                                
                                <?php if($form[$i]['type']=='radio'){?>
                                <input type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'
                                <?php 
                                if(!empty($answer))
                                {
                                    if($form[$i]['value']==$answer['value'])
                                    {
                                        echo 'checked';
                                    }
                                }
                                ?>
                                required> <?php echo $form[$i]['caption']?>
                                <?php }?>
                                <?php if($form[$i]['type']=='checkbox'){?>
                                <input type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" value='<?php echo $form[$i]['value']?>'
                                    <?php 
                                    if(in_array($form[$i]['value'], explode(',', $answer['value'])))
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
                            //echo 'Question: <pre>';print_r($question);echo '</pre>';
                            ?>
                        <input type="hidden" name="pathway" value="<?php echo $question['pathway']?>">
                        <input type="hidden" name="step" value="<?php echo $question['step']?>">
                        <input type="hidden" name="back" value="<?php echo $question['back']?>">
                        <input type="hidden" name="next" value="<?php echo $question['next']?>">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-6" style="padding-left: 0px;">
                                    <?php if($question['back']!=0){?>
                                    <a href="<?php echo base_url().'selfcare/pb_view/'.$question['pathway'].'/'.$question['back'].'/'.$question['step']?>" class="btn btn-default preview-btn"   >Previous</a>

                                    <?php }?>
                                </div>
                                <div class="col-md-6" >
                                	<?php if($question['next']!=0){?>
	                                    <button type="submit" class="btn btn-default submit-btn pull-right" id="nextMoveButton">
	                                    <?php if($question['back']==0){?>
	                                    Let's start
	                                	<?php }else{?>
	                                		Next 
	                                	<?php }?>
                                	</button>
                                	<?php }else{?>
                                		<a href="<?php echo base_url().'selfcare/online'?>" class="btn btn-default submit-btn pull-right"> Finish </a>
                            		<?php }?>
                                    
                                </div>
                            </div>
                        </div>

                    </form>

                </div>
            
        </div><!--end pathways-->
    </div>
</div>