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
            <div class="d-logo"></div>
            <div class="login-form">
                    
                <div class="col-md-12 col-md-offset-4 alert alert-warning">
                    <?php echo $error;?>
                </div>
            </div>
            <a href="<?php echo base_url().'selfcare/online'?>" class="btn btn-default submit-btn pull-right"> Go Back </a>
            
        </div><!--end pathways-->
    </div>
</div>