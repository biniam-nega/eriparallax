<?php

function show_user($user, $count) {
?>
<li class="w3-padding-16">
    <form method="post" action="">
        <span class="w3-xlarge"><?php echo $user['username']; ?></span>
        <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>"/>
        <span class="w3-right"> <button class="w3-btn w3-blue w3-margin-right" id="viewBtn" name="view_btn" type="button" onclick="openProfileModal(<?php echo $count; ?>)">View Profile</span>
        <span class="w3-right"> <button class="w3-btn w3-red" id="deleteBtn" name="delete_btn" type="submit">Delete</button> </span>
    </form>
</li>
<div class="w3-modal w3-animate-zoom" id="profileModal<?php echo $count; ?>">
    <div class="w3-center">
        <div class="w3-modal-content w3-white">
        <span class="w3-right w3-button w3-hover-red w3-hover-text-white w3-text-red w3-xxlarge" onclick="document.getElementById('profileModal<?php echo $count; ?>').style.display = 'none';"> <strong>&times;</strong> </span>
        <div class="w3-container w3-center w3-text-black">
            <div class="w3-center">
                <img src="../img/profile_pics/<?php echo $user['profile_pic']; ?>" class="w3-center w3-circle w3-margin-right" style="width:50%">            
            </div>
            <p class="w3-xlarge"><b><?php echo $user['username'] ?></b></p><hr/>
            <div class="w3-container w3-xlarge w3-margin-bottom">
                <div class="w3-center w3-brown">Eritrean Adress:</div><div class="w3-center w3-gray"><a href="search.php?q=<?php echo $user['eritrean_adress']; ?>" ><?php echo $user['eritrean_adress']; ?></a></div><br/>
                <div class="w3-center w3-brown">Profession: </div><div class="w3-center w3-gray"><a href="search.php?q=<?php echo $user['profession']; ?>" ><?php echo $user['profession']; ?></a></div><br/>
                <div class="w3-center w3-brown">Join Date:</div><div class="w3-center w3-gray"> <?php echo $user['join_date']; ?></div><br/>
                <div class="w3-center w3-brown">Self description:</div><div class=" w3-center w3-gray"> <?php echo $user['bio']; ?></div><br/>
                <form method="post" action="">
                    <input type="hidden" name="user_id" value="<?php echo $user['user_id']; ?>"/>
                    <span class="w3-right"> <button class="w3-btn w3-red" id="deleteBtn2" name="delete_btn" type="submit">Delete</button> </span>
                </form>
            </div>
        </div>
    </div>
</div>

<?php
}


function show_suggestions($suggestion, $suggester) {
?>
<div class="w3-row">
    <div class="w3-col m2 text-center">
        <img class="w3-circle" src="../img/profile_pics/<?php echo $suggester['profile_pic']; ?>" style="width:96px;height:96px">
    </div>
    <div class="w3-col m10 w3-container">
        <h4><?php echo $suggester['username']; ?> <span class="w3-opacity w3-medium"><?php echo $suggestion['feedback_time']; ?></span></h4>
        <p><?php echo $suggestion['feedback']; ?></p><br>
    </div>
</div>
<?php
}


function show_pending_post($pending_post, $poster, $count) {
?>
<form action="" method="post">
    <div class="w3-twothird w3-margin w3-white w3-middle">
        <div class="container">
            <img class="w3-left w3-circle w3-margin-right" src="../img/profile_pics/<?php echo $poster['profile_pic']; ?>" style="width:80px" /> 
            <span class="w3-large"><?php echo $poster['username'] ?></span> 
            <span class="w3-right w3-margin-right w3-text-gray"> 
                <?php echo $pending_post['post_time']; ?>
            </span>
        </div>
        <?php
        if(!$pending_post['is_poem']){
        ?>
        <img src="../img/posted_pics/<?php echo $pending_post['filename']; ?>" style="width:100%;" class="w3-hover-opacity">
        <?php
        }
        ?>
        <div class="w3-container w3-white">
            <p><b><?php echo $pending_post['title'] ?></b></p>
            <p><?php echo substr($pending_post['description'], 0, 300); ?></p>
            <p>
                <button class="w3-button w3-padding-large w3-white w3-border" type="button" onclick="openPostModal(<?php echo $count; ?>)"><b>READ MORE &raquo;</b></button>
                <span class="w3-right">
                    <input type="hidden" name="postId" value="<?php echo $pending_post['post_id']; ?>"/>
                    <button class="w3-btn w3-green w3-margin-bottom" type="submit" name="approveBtn">Approve</button>
                    <button class="w3-btn w3-red w3-margin-right w3-margin-bottom" type="submit" name="disapproveBtn">Disapprove</button> 
                </span>
            </p>
        </div>
    </div>
</form>
<div class="w3-modal w3-animate-zoom" id="postModal<?php echo $count; ?>">
    <div class="w3-center">
        <div class="container w3-text-white w3-twothird">
            <img class="w3-circle" src="../img/profile_pics/<?php echo $poster['profile_pic']; ?>" style="width:80px" /> 
            <span class="w3-large"><?php echo $poster['username'] ?></span>
            <span class="w3-right w3-margin-right"> 
                <?php echo $pending_post['post_time']; ?> 
            </span>
        </div>
        <span class="w3-right w3-button w3-hover-red w3-hover-text-white w3-text-red w3-xxlarge" onclick="document.getElementById('postModal<?php echo $count; ?>').style.display = 'none';"> <strong>&times;</strong> </span>
        <div class="w3-modal-content" style="background-color: rgba(0, 0, 0, 0);">
        <div class="w3-center">
            <?php
            if($pending_post['filename'] != ''){
            ?>
            <img src="../img/posted_pics/<?php echo $pending_post['filename']; ?>" style="width:100%;" class="w3-hover-opacity">
            <?php
            }
            ?>
        </div>
        <div class="w3-container w3-center w3-text-white">
            <p class="w3-xlarge"><b><?php echo $pending_post['title'] ?></b></p><hr/>
            <p class="w3-xlarge"><?php echo $pending_post['description']; ?></p>
            <p>
                <form action="" method="post">
                    <span class="w3-right">
                        <input type="hidden" name="postId" value="<?php echo $pending_post['post_id']; ?>"/>
                        <button class="w3-btn w3-green w3-margin-bottom" type="submit" name="approveBtn">Approve</button>
                        <button class="w3-btn w3-red w3-margin-right w3-margin-bottom" type="submit" name="disapproveBtn">Disapprove</button> 
                    </span>
                </form>
            </p>
        </div>
    </div>
    </div>
</div>
<?php
}

?>
