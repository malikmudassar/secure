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
<div class="wrapper pathways-page">
        <div class="container">
            <div class="pathwaysContent maincontent-space">
                <div class="pathways">

                   

                    <h2>Please select one of the following online consultations</h2>

                    <div class="pathways-links row">
                        <div class="col-lg-6 col-md-6 col-sm-6">

                                <div class="pathways-list">
                                    <a href="https://app.dr-iq.com/secure/self-care/sick-note">
                                        <img src="<?php echo ASSET_URL?>assets/selfcare_files/sickNote.png" class="img-fluid ">
                                        <span>Request a Sick Note</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                                            <div class="pathways-list">
                                    <a href="https://app.dr-iq.com/secure/self-care/chase-referrer">
                                        <img src="<?php echo ASSET_URL?>assets/selfcare_files/chase-refferal.png" class="img-fluid chase-refferal">
                                        <span>Chase a Referral</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                                            <div class="pathways-list">
                                    <a href="https://app.dr-iq.com/secure/self-care/order-medication">
                                        <img src="<?php echo ASSET_URL?>assets/selfcare_files/orderMedication.png" class="img-fluid order-medication">
                                        <span>Order Medication</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                                                            <div class="pathways-list">
                                    <a href="https://app.dr-iq.com/secure/self-care/sti-male">
                                        <img src="<?php echo ASSET_URL?>assets/selfcare_files/sti.png" class="img-fluid sti">
                                        <span>Request STI Testing</span>
                                        <i class="fa fa-angle-right"></i>
                                    </a>
                                </div>
                            
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">

                                                                    <div class="pathways-list">
                                        <a href="https://app.dr-iq.com/secure/self-care/general-advise">
                                            <img src="<?php echo ASSET_URL?>assets/selfcare_files/general.png" class="img-fluid ">
                                            <span>Request General Advice</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                                                    <div class="pathways-list">
                                        <a href="https://app.dr-iq.com/secure/self-care/allergies">
                                            <img src="<?php echo ASSET_URL?>assets/selfcare_files/allergies.png" class="img-fluid contraception">
                                            <span>Allergies</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                                                    <div class="pathways-list">
                                        <a href="https://app.dr-iq.com/secure/self-care/hipPain">
                                            <img src="<?php echo ASSET_URL?>assets/selfcare_files/hip-pain.png" class="img-fluid hip-pain">
                                            <span>Hip Pain</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                                                    <div class="pathways-list">
                                        <a href="https://app.dr-iq.com/secure/self-care/bloodTestMale">
                                            <img src="<?php echo ASSET_URL?>assets/selfcare_files/bllod-test.png" class="img-fluid rbt">
                                            <span>Request a Blood Test</span>
                                            <i class="fa fa-angle-right"></i>
                                        </a>
                                    </div>
                                
                        </div>
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