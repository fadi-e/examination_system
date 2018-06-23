<?php
session_start();
ob_start();
?>
<?php
if (isset($_SESSION['user_type'])) {
    Include_once( 'model/db.php' );
} else {
    logout();
    die();
}

if (!($_SESSION['user_type'] == 'student')) {
    header('location: ' . $_SESSION['user_type'] . '_area.php');
}

function logout() {
    header('location:index.php');
    ob_end_flush();
    die();
}

 $_SESSION['student_ID'];

?>
<?php
include "header.php";
?>
<?php
include "menuforstudent.php";
?>
<?php 
include "control/select_student_info.php";
$profileName = '';
foreach($staticresult as $row){
    $profileName = $row['profile_image'];
}


?>






<style>
    .help-block
    {
        text-align: left !important;
        color: red !important;
    }
</style>



    <form method="POST" id="StudentProfile" enctype="multipart/form-data" action="control/student_images.php">
<legend>Update Profile Photo</legend>
<div class="row">
    <div class="col-lg-5">
        <div class="col-lg-12" style="padding: 0px;">
            <div class="media" style="padding-left: 0px;margin: 0px;">
                <a class="pull-left" href="#">
                    <?php
                    if(!empty($profileName))
                    { ?>
                        <img class="media-object dp img-circle" src="pics/student_pics/<?=$profileName?>" style="width: 100px;height:100px;">
                   <?php }
                    else
                    { ?>
                        <img class="media-object dp img-circle" src="https://www.vccircle.com/wp-content/uploads/2017/03/default-profile.png" style="width: 100px;height:100px;">
                   <?php }
                    ?>
                    
                </a>
                <div class="media-body">
                </div>
            </div>
        </div>
        <div class="col-lg-12" style="display:flex"; justify-content: center;>
            <input type="file" required="" name="profile_image">
            <input type="hidden" value="<?=!empty($profileName)?$profileName:''?>" name="old_file_name">

            <button type="submit" class="btn btn-primary">Save</button>
        </div>


</div>
</div>
</form>




<?php
include "footer.php";
?>