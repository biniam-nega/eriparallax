<!-- Deleted Modal -->
  <div class="w3-modal" id="disapproveModal">
    <div class="w3-modal-content w3-animate-bottom w3-red">
      <div class="w3-container w3-center">
        <span class="w3-display-topright w3-button w3-hover-text-white w3-text-white w3-xxlarge" onclick="toggleDisapproved()">
         <strong>X</strong> 
        </span>
        <div class="w3-container w3-xxlarge"><p>Post Deleted Successfully!</p></div>
      </div>
    </div>
  </div>
  
  <?php
  if($disapproved) {
    echo '<script>$("#disapproveModal").show();</script>';
    $disapproved = false;
  }
  ?>

  <!-- Added Modal -->
  <div class="w3-modal" id="approveModal">
    <div class="w3-modal-content w3-animate-top w3-green">
      <div class="w3-container w3-center">
        <span class="w3-display-topright w3-button w3-hover-text-white w3-text-white w3-xxlarge" onclick="toggleApproved()">
         <strong>X</strong> 
        </span>
        <div class="w3-container w3-xxlarge"><p>Post Added Successfully!</p></div>
      </div>
    </div>
  </div>
  <?php
  if($approved) {
    echo '<script>$("#approveModal").show();</script>';
    $approved = false;
  }
  ?>