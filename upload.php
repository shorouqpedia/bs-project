<?php
session_start();
require_once 'partials/init.php';
if (!isset($_SESSION['user'])) {
    header('Location:login.php');
    exit();
}
$user = $_SESSION['user'];
$title = "upload videos";
require_once "partials/headers.php";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $post = filter_var_array($_POST, FILTER_SANITIZE_STRING);
    $title = $post['title'];
    $description = $post['description'];
    $category = $post['category'];
    $vid = $_FILES['video'];
    var_dump($_POST);
    $file_upload = upload_files($vid, "video");
    $query = $con->prepare("INSERT INTO `videos` (`title`,`description`,`category`,`video_link`,`user_upload_id`) VALUES (?,?,?,?,?)");
    $query->execute(array($title,$description,$category,$file_upload, $user['id']));
    header("Location: profile.php");
}
?>
		<div class="Container">
			<div class="row">
				<div class="col-xs-4">
					<span class="glyphicon glyphicon-expand" style="font-size: 300px; margin-top: 120px; color: #bab8b8; margin-left: 30px;"></span>
					<div class="progress" style="margin-top: 40px;">
						<div class="progress-bar" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="min-width: 2em;">
						    0%
						</div>
					</div>
			
				</div>
				<div class="col-xs-8">
					<form style="border:5px; margin-top: 120px;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post" enctype="multipart/form-data">
                            <div style="display:flex;align-items:flex-end;justify-content:space-between">
                                <div class="form-group" style="flex-grow:1">
                                    <label for="exampleInputName1">Video Title</label>
                                    <input name="title" type="text" class="form-control" id="exampleInputName1" placeholder="Video Title...">
                                </div>
                                <div class="form-group" style="width:165px;margin-left:20px;">
                                    <select name="category" class="form-control">
                                        <option selected disabled>Category</option>
                                        <option value="physics">Physics</option>
                                        <option value="maths">Mathematics</option>
                                        <option value="cs">Computer Science</option>
                                        <option value="philosophy">Philosophy</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                        </div>
						<div class="form-group">
						    <label for="exampleInputName2">Description</label><br/>
						    <textarea class="form-control" name="description" placeholder="Description..." rows="5" style="resize:vertical" id="exampleInputName2"></textarea>
						</div>
						<div class="form-group">
						    <label for="exampleInputFile">Upload</label>
						    <input name="video" type="file" id="exampleInputFile">
						    <p class="help-block">Choose the video you want to upload</p>
						</div>
						<button type="submit" class="btn btn-success" style="width:150px;">Post</button>
						<button type="reset" class="btn btn-default">Cancel</button>
					</form>
				</div>
			</div>
		</div>
<?php
require_once "partials/footer.php";