
// Activate the search button when the search box is not empty
$('#searchQuery').click(function() {
    setInterval(handleSearchButtonEvent, 1000);
});


// Handle the event of the user clicking the search button
function handleSearchButtonEvent() {
    if($('#searchQuery').val() != '') {
        $('#searchBtn').removeAttr('disabled');
    }
    else{
        $('#searchBtn').attr('disabled');
    }
}

$('#searchBtn').click(function() {
    location.href = 'search.php?q=' + $('#searchQuery').val();
});

// hide the user deleted modal
function hideUserDeleted() {
    ('#userDeletedModal').hide();
}
