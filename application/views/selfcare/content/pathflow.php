  <!-- Page Content -->
  <div class="container inner-pg ">
    <div class="row" style="background-color:#e9ecef; margin-bottom:10px;">
            <ul class="breadcrumb">
                <li> <a href="<?php echo base_url().'selfcare'?>">Home</a></li>
                <li style="padding-left:10px"> <a href="<?php echo base_url().'selfcare/category'?>">Categories</a></li>
                <li style="padding-left:10px"> <?php echo $p_name;?> </li>
            </ul>
    </div>
    <div class="row">

    <!-- -->
 

    <div class="col-lg-12">

        <?php if($question['type']=='alert'){?>            
            <div style="width:100%; height:100px; padding-top:30px; padding-left:30px; font-size:16pt; background:red">
                <h4 class="quesPath" style="color:white"><?php echo $question['statement']?></h4>
               
            </div>
        <?php } else {?>
            <h4 class="quesPath"><?php echo $question['statement']?></h4>
            <div class="form-group">
                <a id="lnk_eq" href="<?php echo base_url().'selfcare/edit_question/'.$question['pathway'].'/'.$question['id']?>"><i class="fa fa-pencil"></i>Edit Question</a> 
            </div>
        <?php }?>
        <form data-toggle="validator" action="<?php echo base_url().'selfcare/pq_view'?>" method="post">    
            <?php for($i=0;$i<count($form);$i++){?>
                <div class="inputGroup" style="width:50%">
                <?php if($form[$i]['type']=='radio'){?>
                    
                        <input id="option_<?php echo $i+1;?>" name="<?php echo $form[$i]['name']?>" type="radio" value='<?php echo $form[$i]['value']?>'
                            <?php 
                            if(!empty($answer))
                            {
                                // echo 'Answer not empty';exit;
                                if(count($answer[0][0])>0)
                                {
                                    $val=$answer[0][$i]['value'];
                                }
                                else
                                {
                                    $val=$answer[0]['value'];
                                }
                                
                                
                                if($form[$i]['value']==($val))
                                {
                                    echo 'checked';
                                }
                            }
                            ?>
                        required> 
                        <label for="option_<?php echo $i+1;?>">
                            <?php if($question['id']>=421 && $question['id']<=424){?>
                                <img src="<?php echo ASSET_URL.'assets/img/'.$form[$i]['value'].'.svg'?>" style="height:65px; width:65px;">
                            <?php }else{?>
                                <?php echo $form[$i]['caption']?> </input>
                            <?php }
                            // echo '$value :'.$value;exit;
                            ?>
                        </label>
                
                <?php }?>
                </div>
                <?php if($form[$i]['type']=='checkbox'){?>
                    <div class="inputGroup" style="width:50%">
                        <input id="option<?php echo $i+1?>" name="<?php echo $form[$i]['name']?>" type="checkbox" value="<?php echo $form[$i]['value']?>"
                            <?php 
                                if(in_array($form[$i]['value'], explode(',', $answer[0]['value'])))
                                {
                                    echo 'checked';
                                }
                            ?>
                        />
                        <label for="option<?php echo $i+1?>"><?php echo $form[$i]['caption']?></label>
                    </div>
                <?php }?>
            <?php }?> 
            <?php for($i=0;$i<count($form);$i++){?>
                    <div class="form-group">
                        <?php if($form[$i]['type']=='text' || $form[$i]['type']=='decimal' || $form[$i]['type']=='file'){?>
                            <label><?php echo $form[$i]['caption'];?></label>
                            <input type="<?php echo $form[$i]['type']?>" name="<?php echo $form[$i]['name']?>" class="form-control" placeholder="<?php echo $form[$i]['placeholder']?>" 
                            value="<?php echo $answer[0][0]['value']?$answer[0][$i]['value']:$answer[$i]['value'];?>">
                                
                        <?php }?>
                        
                    </div>
            <?php }?>
            
                <?php if($form[0]){?>    
                    <a id="lnk_eq" href="<?php echo base_url().'selfcare/edit_answer/'.$question['id']?>"><i class="fa fa-pencil"></i> Edit Answer</a>
                <?php }?>
                <input type="hidden" name="pathway" value="<?php echo $question['pathway']?>">
                <input type="hidden" name="user_id" value="1546">
                <input type="hidden" name="age" value="29">
                <input type="hidden" name="gender" value="male">
                <input type="hidden" name="step" value="<?php echo $step?>">
                <input type="hidden" name="back" value="<?php echo $back?>">
                <input type="hidden" name="next" value="<?php echo $next?>">
                <div class="form-group" style="margin-bottom:10px;">
                    <div style="margin-bottom:0px; padding-top:50px;">
                        <div class="col-md-6" style="padding-left: 0px;">
                            <?php if($back!=0){?>
                                <a href="<?php echo base_url().'selfcare/pb_view/'.$question['pathway'].'/'.$back.'/'.$step?>" class="btn btn-blue" >Previous</a>
                            <?php }?>
                       
                            <?php if($next!=0){?>
                                <button type="submit" class="btn btn-grey" id="nextMoveButton" >
                                <?php if($back==0){?>
                                Let's start
                                <?php }else{?>
                                    Next 
                                <?php }?>
                            </button>
                            <?php }else{?>
                                <a href="<?php echo base_url().'selfcare/category'?>" class="btn btn-default "> Finish </a>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
            <pre>
            <?php //echo '$value :';print_r($val).'<br>';echo '<br>';print_r($answer); print_r($form); ?>
            </pre>
        </form>
        <div class="clearfix"></div>
        <div class="col-md-12">
                <div class="col-md-6 col-sm-12">
                        <?php if($this->session->flashdata('success')){?>
                                <span style="margin-left:-15px;" class="alert alert-success"> Feedback submitted </span>
                        <?php }?>
                    <form id="feedback" method="post" type="" action="<?php echo base_url().'selfcare/submit_feedback/'.$question['pathway'].'/'.$step?>">
                        <div class="form-group" style="margin-top:50px">
                            <label>Feedback</label>
                            <textarea class="form-control" name="feedback" required></textarea>
                        </div>
                        <div class="form-group">
                            <button type="button" id="btn-feedback" class="btn btn-blue">Submit</button>
                        </div>
                    </form>
                </div>
            
        </div>
<!--           
          <div class="inputGroup">
            <input id="option1" name="options[]" type="checkbox"/>
            <label for="option1">Option One</label>
          </div>
          
          <div class="inputGroup">
            <input id="option2" name="options[]" type="checkbox"/>
            <label for="option2">Option Two</label>
          </div> -->
                
  
        <!-- <div class="col-lg-12"></div>
            <div class="col-lg-5">
                    <form class="form-group">
                        <input type="text" class="form-control imgDate mb-2" name="" placeholder="First date of sickness">
                    <input type="text" class="form-control mb-2" name="" placeholder="Number of sick days required for">
                    <input type="text" class="form-control mb-2" name="" placeholder="What is the reason you can not work?">
                    </form>
            
            </div>

            <div class="col-lg-12">
                <button type="button" class="btn btn-blue">Previous</button>
                <button type="button" class="btn btn-grey">Next</button>
            </div>

            
        </div> col 12 -->
    </div> <!-- row -->
  </div>  
