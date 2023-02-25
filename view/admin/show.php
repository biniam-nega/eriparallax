<?php

require('../includes/admin/admin.header.inc');

?>

<div class="w3-container w3-padding-32">
  <form action="" method="post">
    <button type="button" class="w3-bar-item w3-btn w3-margin-right w3-right search" id="searchBtn" disabled></button>
    <span class="w3-twothird w3-right"><input type="text" class="w3-input w3-twothird w3-right" placeholder="Search ..." id="searchQuery" /></span>
  </form>
</div>

<hr>
<div class="w3-container">
  <h5>Users (<?php echo $users_num; ?>)</h5>
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
      for($i = 0; $i < count($users); $i++) {
        show_user($users[$i], $i);
      }
    }
    ?>
  </ul>
</div>
<hr>

<?php

require('../includes/footer.inc');
require('../includes/admin/admin.show.footer.inc');
require('../includes/admin/admin.footer.inc');

?>
