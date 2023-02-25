// Get the Sidebar
var mySidebar = document.getElementById("mySidebar");

// Get the DIV with overlay effect
var overlayBg = document.getElementById("myOverlay");

var validFilename;
var validTitle;
var validPlace;
var validDescription;
var fileSelected;

var validPoemTitle;
var validPoemText;

// Toggle between showing and hiding the sidebar, and add overlay effect
function w3_open() {
  if (mySidebar.style.display === 'block') {
    mySidebar.style.display = 'none';
    overlayBg.style.display = "none";
  } else {
    mySidebar.style.display = 'block';
    overlayBg.style.display = "block";
  }
}

// Close the sidebar with the close button
function w3_close() {
  mySidebar.style.display = "none";
  overlayBg.style.display = "none";
}

// Open or close the post modal based on the current state
function openClosePostModal() {
	$('#post_pic_modal').toggle();
}


// Opens the post form that the user selected
function openForm(type) {
  if(type == 'picture') {
    $('#postPicForm').show();
    $('#postPoemForm').hide();
    $('#picturePostOpener').css({'background-color': 'white', 'color': 'black'});
    $('#poemPostOpener').css({'background-color': 'black', 'color': 'white'});
  }
  else {
    $('#postPicForm').hide();
    $('#postPoemForm').show();
    $('#poemPostOpener').css({'background-color': 'white', 'color': 'black'});
    $('#picturePostOpener').css({'background-color': 'black', 'color': 'white'});
  }
  
}


/* 
  Validate the post form
*/
// check the filename
function filenameSelected() {
  setInterval(validateFilename, 1000);
}

function validateFilename() {
  var picFilename = $('#picFilename').val();
  if(picFilename != '') {
    var picFileType = picFilename.slice(picFilename.length - 3, picFilename.length);
    picFileType = picFileType.toLowerCase();
    if(picFileType != 'png' && picFileType != 'jpg' && picFileType != 'peg' && picFileType != 'gif') {
      $('#fileNotSupported').show();
    }
    else {
      $('#fileNotSupported').hide();
      validFilename = true;
    }
  }
  else {
    fileSelected = false;
    $('#fileNotSupported').hide();
  }
}

// check the title
function titleClicked() {
  setInterval(validateTitle, 1000);
}

function validateTitle() {
  var picTitle = $('#picTitle').val();
  if(!checkText(picTitle, 3, 100)) {
    $('#titleError').show();
  }
  else{
    $('#titleError').hide();
    validTitle = true;
  }
}

// check the palce
function placeClicked() {
  setInterval(validatePlace, 1000);
}

function validatePlace() {
  var picPlace = $('#picPlace').val();
  if(!checkText(picPlace, 3, 100)) {
    $('#placeError').show();
  }
  else{
    $('#placeError').hide();
    validPlace = true;
  }
}

// check the description
function descriptionClicked() {
  setInterval(validateDescription, 1000);
}

function validateDescription() {
  var picTitle = $('#picDescription').val();
  if(!checkText(picTitle, 20, 1000)) {
    $('#descriptionError').show();
  }
  else{
    $('#descriptionError').hide();
    validDescription = true;
  }
}

// Handle the event of user clicking the post picture button
$('#postPic').click(function($e) {
  if(validFilename && validTitle && validPlace && validDescription) {}  // there is no error so we can proceed to saving the post
  else {  // There is something wrong with the form
    $e.preventDefault();
    if(!fileSelected) {
      $('#fileNotSelected').show();
    }

    if(!validTitle) {
      $('#titleError').show();
    }

    if(!validPlace) {
      $('#placeError').show();
    }

    if(!validDescription) {
      $('#descriptionError').show();
    }

    $('#invalidForm').show();
  }
});


/*
Check the post poem form
*/

// check the poem title
function poemTitleClicked() {
  setInterval(validatePoemTitle, 1000);
}

function validatePoemTitle() {
  var poemTitle = $('#poemTitle').val();
  if(!checkText(poemTitle, 3, 100)) {
    $('#poemTitleError').show();
  }
  else {
    $('#poemTitleError').hide();
    validPoemTitle = true;
  }
}

// check the poem text
function poemTextClicked() {
  setInterval(validatePoemText, 1000);
}

function validatePoemText() {
  var poemText = $('#poemText').val();
  if(!checkText(poemText, 20, 1000)) {
    $('#poemTextError').show();
  }
  else {
    $('#poemTextError').hide();
    validPoemText = true;
  }
}

// handle the event of the user clicking the post poem button
$('#postPoem').click(function($e) {
  if(validPoemTitle && validPoemText) {}  // we are good to go
  else {  // there is something wrong with the form
    $e.preventDefault();
    $('invalidPoemForm').show();
    if(!validPoemTitle) {
      $('#poemTitleError').show();
    }
    if(!validPoemText) {
      $('#poemTextError').show();
    }
  }
});

function openProfileModal(profileNum) {
  $('#profileModal' + profileNum).show();
}


function checkText(text, min, max) {
  if(text.length < min || text.length > max) {
    return false;
  }
  return true;
}

// Handle the event of the user clicking the delete button
$('#deleteBtn').click(function($e) {
  choice = confirm('Are you sure you want to delete the user?');
  if(!choice) {
      $e.preventDefault();
  }
});

$('#deleteBtn2').click(function($e) {
  choice = confirm('Are you sure you want to delete the user?');
  if(!choice) {
      $e.preventDefault();
  }
});
