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
            </ul>
        </div>
    </div>
</nav>

<!--end navigation bar -->
</div>
<div class="wrapper pathways-page">
        <div class="container">
            <div class="pathwaysContent maincontent-space">
                <div class="pathways">

                   

                    <h2>Please select one of the following life style to preview the flow</h2>

                    <div class="pathways-links row">
                        
                        <?php for($i=0;$i<count($pathways);$i++){?>
                        <div class="col-lg-6 col-md-6 col-sm-12">
                            <div class="pathways-list">
                                <a href="<?php echo base_url().'selfcare/p_view/'.$pathways[$i]['id']?>">
                                    <img src="<?php echo ASSET_URL?>assets/selfcare_files/sickNote.png" class="img-fluid ">
                                        <span><?php echo $pathways[$i]['name']?></span>
                                        <i class="fa fa-angle-right"></i>
                                </a>
                            </div>
                        </div>
                    <?php }?>
                        <div class="clearfix"></div>

                    </div>

                </div><!--end pathways-->
            </div>
        </div><!--end container -->
    </div>