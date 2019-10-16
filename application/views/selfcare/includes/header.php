<body>

    <nav class="navbar navbar-expand-lg navbar-dark fixed-top border-seprater">

        <div class="container">

            <a class="navbar-brand" href="">
                <span style="color:black">Triage Builder</span>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php if($this->session->userdata['name']){?>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                
            </div>

            <div class="dropdown profile-right">
                <button class="db-dropdown dropdown-toggle" id="menu1" type="button" data-toggle="dropdown" aria-expanded="false"><i class="fa fa-angle-down"></i></button>
                    <ul class="dropdown-menu dropdown-list" role="menu" aria-labelledby="menu1" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 70px, 0px); top: 0px; left: 0px; will-change: transform;">

                        <li role="presentation" style="border-bottom:0px;">
                            <a role="menuitem" tabindex="-1" href="<?php echo base_url().'admin/logout'?>" class="dropedown-logout-icon">
                                <span class="dropedown-list">Logout</span>
                            </a>
                        </li>

                    </ul>
                </div>


                <!--notifications--->

            </div>
<?php }?>


</nav>