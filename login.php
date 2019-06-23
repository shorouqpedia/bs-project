<?php require_once "partials/init.php";
$title = "login";
require_once "partials/headers.php";
session_start();
if (isset($_SESSION['user'])) {
    header('Location: profile.php');
}
if (isset($error)) {unset($error);}

if ($_SERVER['REQUEST_METHOD'] === 'POST')
{
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password = sha1(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

        $query = $con->prepare("SELECT * FROM user WHERE email = ?");
        $query->execute(array($email));
        if ($query->rowCount() > 0) {
            $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            if ($password === $data['password']) {
                $_SESSION['user'] = array(
                    "email" => $email,
                    "first_name" => $data['fname'],
                    "last_name" => $data['lname'],
                    "profile_picture" => $data['img']
                );
                header('Location: profile.php');

            } else {
                $error = "Invalid Email/Password.";
            }
        } else {
            $error = "Email Does Not Exist.";
        }

}
?>

		<div class="Container">
			<div class="row">
				<div class="col-xs-8">
                    <?php if (isset($error)) {?>
                    <div class="alert alert-danger text-center">
                        <?php echo $error;?>
                    </div>
                    <?php } ?>
					<form style="border:5px; margin-top: 120px;" action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">
						<div class="form-group">
							<label for="email">Email address</label>
						    <input type="email" required class="form-control" id="email" name="email" data-check="[^A-Za-z0-9_@\\.\\-]" placeholder="Email">
						</div>
						<div class="form-group">
						    <label for="password">Password</label>
						    <input type="password" class="form-control" required id="password" name="password" placeholder="Password">
						</div>
						<button type="submit" class="btn btn-warning" style="width:150px;">Log in</button>
<!--						<button type="button" class="btn btn-default">Cancel</button>-->
					</form>
				</div>
			</div>
        </div>

<?php require_once "partials/footer.php"; ?>