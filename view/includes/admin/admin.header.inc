<?php

require('../../controller/admin/admin.php');
require('../includes/admin/functions.php');

if(isset($_GET['type']) || isset($_GET['q'])) {
  require('../../controller/admin/admin.show.php');
}

if(isset($_GET['q'])) {
  require('../../controller/admin/admin.search.php');
}

?>

<!DOCTYPE html>
<html>
<title>EriParallax - Benhur Ghirmay</title>

<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="../css/4/w3.css">
<link rel="stylesheet" type="text/css" href="../css/admin.css">
<?php
    if(isset($_GET['type']) || isset($_GET['q'])) { 
?>
<link rel="stylesheet" href="../css/admin.show.css"/>
<?php
    }
?>
<script type="text/javascript" src="../../includes/js/jquery-3.5.1.js"></script>

<body class="w3-light-grey">

<!-- Top container -->
<div class="w3-bar w3-top w3-black w3-large" style="z-index:4">
  <button class="w3-bar-item w3-button w3-hide-large w3-hover-none w3-hover-text-light-grey" onclick="w3_open();"><i class="fa fa-bars"></i> &nbsp;Menu</button>
  <a href="home.php"><span class="logo w3-bar-item w3-right">EriParallax</span></a>
</div>

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-collapse w3-white w3-animate-left" style="z-index:3;width:300px;" id="mySidebar"><br>
  <div class="w3-container w3-row">
    <div class="w3-col s4">
      <img src="../img/admin_pics/img_avatar.png" class="w3-circle w3-margin-right" style="width:46px">
    </div>
    <div class="w3-col s8 w3-bar">
      <span>Welcome, <strong>Benhur Ghirmay</strong></span><br/>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Dashboard</h5>
  </div>
  <div class="w3-bar-block">
    <a href="home.php" class="w3-bar-item w3-button w3-padding <?php if(!isset($_GET['type']) && !isset($_GET['q'])){ ?>w3-blue" <?php } ?> ><i class="fa fa-users fa-fw"></i>&nbsp; Overview</a>
    <a href="show.php?type=users" class="w3-bar-item w3-button w3-padding <?php if(isset($_GET['type'])) { if ($_GET['type'] == 'users'){ echo "w3-blue"; }} ?>"><i class="fa fa-eye fa-fw"></i>&nbsp; Users <span class="w3-right"><?php echo $users_num; ?></span></a>
    <a href="show.php?type=posts" class="w3-bar-item w3-button w3-padding <?php if(isset($_GET['type'])) { if ($_GET['type'] == 'posts'){ echo "w3-blue"; }} ?>"><i class="fa fa-users fa-fw"></i>&nbsp; Posts <span class="w3-right"><?php echo $posts_num; ?></span></a>
    <a href="show.php?type=pending_posts" class="w3-bar-item w3-button w3-padding <?php if(isset($_GET['type'])) { if ($_GET['type'] == 'pending_posts'){ echo "w3-blue"; }} ?>"><i class="fa fa-bullseye fa-fw"></i>&nbsp; Pending Posts <span class="w3-right"><?php echo $pending_posts_num; ?></span></a>
    <a href="show.php?type=suggestions" class="w3-bar-item w3-button w3-padding <?php if(isset($_GET['type'])) { if ($_GET['type'] == 'suggestions'){ echo "w3-blue"; }} ?>"><i class="fa fa-diamond fa-fw"></i>&nbsp; Suggestions <span class="w3-right"><?php echo $suggestions_num; ?></span></a>
    <a onclick="openClosePostModal()" class="w3-bar-item w3-button w3-padding"><i class="fa fa-diamond fa-fw"></i>&nbsp; Post</a>
    <a href="logout.php" class="w3-bar-item w3-button w3-text-red w3-padding w3-hover-red w3-text-hover-white"><i class="fa fa-bell fa-fw"></i>&nbsp; <span>Logout</span></a>
  </div>
</nav>


<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px;margin-top:43px;">