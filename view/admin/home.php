<?php

require('../includes/admin/admin.header.inc');

?>

  <!-- Header -->
  <header class="w3-container" style="padding-top:22px">
    <h5><b><i class="fa fa-dashboard"></i> Dashboard</b></h5>
  </header>

  <div class="w3-row-padding w3-margin-bottom">
    <div class="w3-quarter">
      <div class="w3-container w3-red w3-padding-16">
        <div class="w3-left"><i class="fa fa-comment w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $users_num; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Users</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-blue w3-padding-16">
        <div class="w3-left"><i class="fa fa-eye w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $posts_num; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Posts</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-teal w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $pending_posts_num; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Pending Posts</h4>
      </div>
    </div>
    <div class="w3-quarter">
      <div class="w3-container w3-green w3-padding-16">
        <div class="w3-left"><i class="fa fa-share-alt w3-xxxlarge"></i></div>
        <div class="w3-right">
          <h3><?php echo $suggestions_num; ?></h3>
        </div>
        <div class="w3-clear"></div>
        <h4>Suggestions</h4>
      </div>
    </div>
  </div>
  <hr>
  <div class="w3-container">
    <h5>Recent Users</h5>
    <ul class="w3-ul w3-card-4 w3-white">

      <?php
      if($users_num == 0) {
      ?>
      <li class="w3-padding-16">
        <span class="w3-xlarge w3-text-gray">No user has signed up yet! </span><br>
      </li>
      <?php
      }
      else {
        for($i = 0; $i < 10; $i++) {
          if($i == $users_num) {
            break;
          }
          show_user($users[$i], $i);
        }
      }
      ?>
    </ul>
  </div>
  <hr>

  <div class="w3-container">
    <h5>Recent Suggestions</h5>
    <?php if($suggestions_num == 0) {
    ?>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <span class="w3-xlarge w3-text-gray">No user has suggested yet! </span><br>
      </li>
    </ul>
    <?php
    } else{
      for($i = 0; $i < 10; $i++) {
        if($suggestions_num == $i) {
          break;
        }
        show_suggestions($suggestions[$i], $suggesters[$i]);
      }
    } 
    ?>
  <br>
</div>

  <div class="w3-container">
    <h5>Recent Pending Posts</h5>
    <?php if($pending_posts_num == 0) {
    ?>
    <ul class="w3-ul w3-card-4 w3-white">
      <li class="w3-padding-16">
        <span class="w3-xlarge w3-text-gray">No pending posts! </span><br>
      </li>
    </ul>
    
    <?php
    } 
    else{
      for($i = 0; $i < 5; $i++) {
        if($pending_posts_num == $i) {
          break;
        }
        show_pending_post($pending_posts[$i], $posters[$i], $i);
      }
    } 
    ?>
  </div>
  <br/>

  <!-- Footer -->
  <?php 
  
  require('../includes/footer.inc'); 
  require('../includes/admin/admin.home.footer.inc');
  require('../includes/admin/admin.footer.inc');
  
  ?>
  