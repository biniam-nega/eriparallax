<!-- User deleted Modal -->
  <div class="w3-modal" id="userDeletedModal">
    <div class="w3-modal-content w3-animate-bottom w3-red">
      <div class="w3-container w3-center">
        <span class="w3-display-topright w3-button w3-hover-text-white w3-text-white w3-xxlarge" onclick="hideUserDeleted()">
         <strong>X</strong> 
        </span>
        <div class="w3-container w3-xxlarge"><p>User Deleted Successfully!</p></div>
      </div>
    </div>
  </div>
  
  <?php
  if($user_deleted) {
    echo '<script>$("#userDeletedModal").show();</script>';
    $user_deleted = false;
  }
  ?>