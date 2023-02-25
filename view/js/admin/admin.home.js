// Toggle between showing and hiding the approve modal
function toggleApproved() {
  $('#approveModal').toggle();
}
 
// Toggle between showing and hiding the disapprove modal
function toggleDisapproved() {
  $('#disapproveModal').hide();
}

// handle the event of the user clicking the see more button
function openPostModal(postNum) {
  $('#postModal' + postNum).show();
}
