<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no user-scalable=0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>EZ Triage</title>

  <!-- Bootstrap core CSS -->
  <link href="<?php echo ASSET_URL?>assets/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo ASSET_URL?>assets/font-awesome-4.7.0/css/font-awesome.min.css">
  <link href="<?php echo ASSET_URL?>assets/css/bootstrap.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato&display=swap" rel="stylesheet">

  <link href="<?php echo ASSET_URL?>assets/css/maincss.css" rel="stylesheet">
  <link href="<?php echo ASSET_URL?>assets/css/test.scss" rel="stylesheet">



</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg custom-nav static-top">
    <div class="container px-0">
      <a class="navbar-brand header-logo" href="<?php echo base_url().'selfcare'?>">
    
       <h1 class="h5-style">EZ Triage</h1>
      
        <h5 class="h5-setting"></h5></a>
  
      <div class="mobile-items-block">
        <ul class="navbar-nav ml-auto ie-nav">

          <li class="nav-item dropdown">
            <a class="nav-link profile-pos" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> 
              <span>
                 <img src="<?php echo ASSET_URL?>assets/img/dashboard/user.svg" class="nav-profile-img" alt="image" class="img-fluid"> <?php echo $this->session->userdata['name']?>
                 <img src="<?php echo ASSET_URL?>assets/img/top-header/chevron-down.svg" class="web-only chevron-size" alt="image">
              </span>
            </a>
            <div class="dropdown-menu profile-menu" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="<?php echo base_url().'activity'?>">
            <img src="<?php echo ASSET_URL?>assets/img/dashboard/user.svg" class="nav-profile-img" alt="image" class="img-fluid">
            Activity</a>
            <a class="dropdown-item" href="<?php echo base_url().'selfcare/profile'?>">
            <img src="<?php echo ASSET_URL?>assets/img/dashboard/user.svg" class="nav-profile-img" alt="image" class="img-fluid">
            Profile</a>
                    <a class="dropdown-item" href="<?php echo base_url().'admin/logout'?>"><img src="<?php echo ASSET_URL?>assets/img/top-header/Logout.svg" alt="image" style="padding-right:19px;">Logout</a>
            </div>
          </li>

        </ul>
      </div>
    </div>
  </nav>



 
<div class="container-fluid breadcrumb-practice">
    <div class="container px-0">
   <div class="row">
     <div class="col-8 px-0">
          
     </div>
   </div>
 </div>
</div>

 