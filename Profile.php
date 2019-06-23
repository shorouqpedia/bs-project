<?php
session_start();
require_once 'partials/init.php';
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
    exit();
}
$user = $_SESSION['user'];
$title = "profile";
require_once "partials/headers.php";
?>
<div class="container" style="margin-top: 70px;">
    <div class="row profile">
        <div class="col-md-3">
            <div class="profile-sidebar">
                <!-- SIDEBAR USERPIC -->
                <div class="profile-userpic">
                    <img style="width:100%;max-height:300px;" src="<?php echo $user['profile_picture'];?>" class="img-responsive" alt="">
                </div>
                <!-- END SIDEBAR USERPIC -->
                <!-- SIDEBAR USER TITLE -->
                <div class="profile-usertitle">
                    <div class="profile-usertitle-name">
                        <?php echo ucfirst($user["first_name"]) . " " . ucfirst($user["last_name"]);?>
                    </div>
                    <div style="margin: 10px;">
                    <div class="rating">
                        <span class="rating-star" data-value="5"></span>
                        <span class="rating-star" data-value="4"></span>
                        <span class="rating-star" data-value="3"></span>
                        <span class="rating-star" data-value="2"></span>
                        <span class="rating-star" data-value="1"></span>
                    </div>

                    <script>
                    document.body.onload = function () {
                        $('.rating-star').click(function () {
                            $(this).parents('.rating').find('.rating-star').removeClass('checked');
                            $(this).addClass('checked');

                            var submitStars = $(this).attr('data-value');
                        });
                    }
                    </script>
                </div>
                    <div class="profile-usertitle-job">
                        <b >Bio:</b>
                        <div class="well" style="padding: 10px; margin:10px;"><?php echo $user['bio'];?></div>
                    </div>
                </div>
                <!-- END SIDEBAR USER TITLE -->
                <!-- SIDEBAR BUTTONS -->
                <div class="profile-userbuttons">
                    <button type="button" class="btn btn-info" onclick="location.href='edit.php'"><span class="glyphicon glyphicon-edit" ></span> Edit Info</button> <br/>
                    <button type="button" class="btn btn-warning" onclick="location.href='upload.php'" style="margin-right: 6px;"><span class="glyphicon glyphicon-facetime-video"></span> Upload Video</button>
                </div>
                <!-- END SIDEBAR BUTTONS -->
                <!-- END MENU -->
            </div>
        </div>
        <div class="col-md-9">
            <div class="profile-content">
               Some user related content goes here...
            </div>
        </div>
    </div>
</div>
<?php require_once "partials/footer.php";