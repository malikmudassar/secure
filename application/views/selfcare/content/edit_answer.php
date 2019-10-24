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
                    <a class="menu_link_pading nav-link " href="<?php echo base_url().'selfcare'?>"><span style="color:#fff;">Home</span></a>
                </li>
                <li class="nav-item active menu_hide_border">
                    <a class="menu_link_pading nav-link " href="#">
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