<div class="wrapper">
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
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="main-container">
            <p style="margin-top:50px;">
                Welcome to pathways content management. 
                Here you can edit the content of pathways which includes questions, 
                the answers associated to questions and their values.
                <br><br>
                You can also look the preview of pathway iteration, give your feedback on each step in feedback section.
                <br><br>
                <b>Note:</b> This interface is only for preview it does not send any pathway submission to any practice/GP.
            </p>  
            <p>

            </p>          
            <div class="mainContent maincontent-space doc_d_top_space">

                <div class="row">
                    <form action="<?php echo base_url().'selfcare/category'?>" method="post">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label>Please select the application</div>
                                <select class="form-control">
                                    <option value="">Dr-IQ</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary"
                                style="margin-top:16px; margin-left:14px"
                                >Proceed</button>
                            </div>
                        </div>
                    </form>  
                </div><!--end mainContent-->
            </div><!--end maincontainer -->

            
        </div><!--end container -->
    </div><!--end wrapper -->