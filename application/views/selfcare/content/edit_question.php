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
                        <div class="form-group">
                            <label><b>Statement</b></label>
                            <textarea class="form-control" name="statement"><?php echo $question['statement']?></textarea>
                        </div>  
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