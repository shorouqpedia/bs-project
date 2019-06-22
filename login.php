<?php require_once "partials/init.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
        $email = filter_var($_POST['email'],FILTER_SANITIZE_EMAIL);
        $password = sha1(filter_var($_POST['password'], FILTER_SANITIZE_STRING));

        $query = $con->prepare("SELECT * FROM users WHERE email = ?");
        $query->execute(array($email));
        if ($query->rowCount() > 0) 
        {
            $data = $query->fetchAll(PDO::FETCH_ASSOC)[0];
            if ($password === $data['password']) 
            {
                $_SESSION['a'] = 1;  //what shal i do now???
            }
        }
            header('Location: profile.php');

}

?>



<html>
	<head>
 		<title>Log In</title>
 		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<!-- Second Meta is Internet Explorer Compatibility and second is Third Mobile Meta -->
 		<link rel="stylesheet" href="css/bootstrap.css">
 		<link rel="stylesheet" href="css/style.css">
 		
 	</head>
 	<body>
 		<!--Start Navbar-->
        <nav class="navbar navbar-default navbar-inverse navbar-fixed-top" id="index-navbar" style="background-color: transparent;">

			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#"> <img src="images/DS2.png"> </a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

			    	<form class="navbar-form navbar-left" style="padding-top: 8px" action="results/list-LoggedIn.php">
			    		<div class="row">
						    <div class="col-lg-6">
							    <div class="input-group">
								    <span class="input-group-btn">
								    	<button type="button" class="btn btn-default" aria-label="Left Align">
  											<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
										</button>
								    </span>
							    	<input type="text" class="form-control" placeholder="Search for..." name="q">
							    </div><!-- /input-group -->
						    </div><!-- /.col-lg-6 -->
					    </div>

			    	</form>
			    </div><!-- /.navbar-collapse -->

			</div><!-- /.container-fluid -->
			  <!-- End of the Container-->
		</nav>
		<!--End Navbar-->

		<div class="Container">
			<div class="row">
				<div class="col-xs-8">
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

 		<script src="js/jquery-1.11.1.min.js"></script>
 		<script src="js/bootstrap.min.js"></script>
 		<script src="js/plugins.js"></script>
 	</body>
</html>