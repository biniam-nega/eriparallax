<!-- Footer -->
  <footer class="w3-container w3-padding-32 w3-dark-grey">
  <div class="w3-row-padding">
    <div class="w3-third">
      <h3 class="logo">EriParallax</h3>
      <p>Presenting you Eritrea at its best in a way you've never thought before.</p>
      <p>A Biniam Nega production</p>
    </div>

    <div class="w3-third">
      <h3>POPULAR TAGS</h3>
      <p>
        <span class="w3-tag w3-black w3-margin-bottom">Asmara</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Massawa</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Dekemhare</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Assab</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Harnet Avenue</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Durfo</span>
        <span class="w3-tag w3-grey w3-small w3-margin-bottom">Semenawi Bahri</span> <span class="w3-tag w3-grey w3-small w3-margin-bottom">Cathedral</span> 
      </p>
    </div>

  </div>
  </footer>
  
  <div class="w3-black w3-center w3-padding-24">A Biniam Nega production</div>

  <!-- Post modal -->
  <div class="w3-modal" id="post_pic_modal">
    <div class="w3-modal-content w3-animate-bottom">
      <div class="w3-container w3-white w3-center">
        <span class="w3-display-topright w3-button w3-hover-red w3-hover-text-white w3-text-red w3-xxlarge" onclick="openClosePostModal()"> <strong>X</strong> </span>
        <img id="pic" src="../img/admin_pics/img_avatar.png" style="width: 10%" class="w3-circle w3-left" /> <br/><span class="w3-left w3-xlarge"><strong>Benhur Ghirmay</strong></span>
        <div class="w3-container">
          <div class="w3-bar w3-black">
            <button class="w3-bar-item w3-button w3-large w3-hover-white" onclick="openForm('picture')" id="picturePostOpener" style="background-color: white; color:black">Photography</button>
            <button class="w3-bar-item w3-button w3-large w3-hover-white" onclick="openForm('poem')" id="poemPostOpener">Poem</button>
          </div>
        </div>
        <div class="w3-container" id="postPicForm">
          <form action="" method="post" enctype="multipart/form-data">
            <input type="file" onclick="filenameSelected()" id="picFilename" name="picFilename" class="w3-input w3-margin-bottom w3-margin-top" required />
            <div class="w3-panel w3-red" style="display: none" id="fileNotSupported">
              Unsupported file type (supported - .png, .jpg, .gif)
            </div>
            <div class="w3-panel w3-red" style="display: none" id="fileNotSelected">
              Please select a file
            </div>
            <input type="text" id="picTitle" name="picTitle" class="w3-input w3-margin-bottom" placeholder="Title..." required onclick="titleClicked()" />
            <div class="w3-panel w3-red" style="display: none" id="titleError">
              Title has to be 3 - 100 characters
            </div>
            <input type="text" onclick="placeClicked()" id="picPlace" name="picPlace" class="w3-input w3-margin-bottom" placeholder="Place of photo (Where the photo was taken)..." required />
            <div class="w3-panel w3-red" style="display: none" id="placeError">
              Place has to be 3 - 100 characters
            </div>
            <textarea class="w3-input w3-margin-bottom" onclick="descriptionClicked()" name="picDescription" id="picDescription" placeholder="Description (Describe your photo in a poetic way)..." style="height: 120px" required></textarea>
            <div class="w3-panel w3-red" style="display: none" id="descriptionError">
              Description has to be 20 - 1000 characters
            </div>
            <button type="submit" class="w3-btn w3-ripple w3-teal w3-margin-bottom w3-margin-right w3-large" style="width: 30%" name="postPic" id="postPic">Post</button><button type="reset" class="w3-btn w3-ripple w3-red w3-margin-bottom w3-large" style="width: 30%">Reset</button>
            <div class="w3-panel w3-red" style="display: none" id="invalidForm">
              Please fill a valid form
            </div>
          </form>
        </div>

        <div class="w3-container" id="postPoemForm" style="display:none">
          <form action="" method="post">
            <input type="text" id="poemTitle" name="poemTitle" class="w3-input w3-margin-bottom" placeholder="Title of you poem..." required onclick="poemTitleClicked()" />
            <div class="w3-panel w3-red" style="display: none" id="poemTitleError">
              Title has to be 3 - 100 characters
            </div>
            <textarea class="w3-input w3-margin-bottom" onclick="poemTextClicked()" name="poemText" id="poemText" placeholder="Write your poem..." style="height: 200px" required></textarea>
            <div class="w3-panel w3-red" style="display: none" id="poemTextError">
              Your poem has to be 20 - 1000 characters
            </div>
            
            <button type="submit" class="w3-btn w3-ripple w3-teal w3-margin-bottom w3-margin-right w3-large" style="width: 30%" name="postPoem" id="postPoem">Post</button>
            <button type="reset" class="w3-btn w3-ripple w3-red w3-margin-bottom w3-large" style="width: 30%">Reset</button>
            <div class="w3-panel w3-red" style="display: none" id="invalidPoemForm">
              Please fill a valid form
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>

