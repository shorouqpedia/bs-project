<?php require_once 'partials/init.php';?>
    <html>
    <head>
        <title>Sign Up</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Second Meta is Internet Explorer Compatibility and second is Third Mobile Meta -->
        <link rel="stylesheet" href="css/bootstrap.css">
        <link rel="stylesheet" href="css/style.css">

    </head>
<body>
    <style>
        .profile-userpic img {
            float: none;
            margin: 0 auto;
            width: 200px;
            height: 200px;
            -webkit-border-radius: 50% !important;
            -moz-border-radius: 50% !important;
            border-radius: 50% !important;
        }
    </style>
    <!--Start Navbar-->
    <nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="		#bs-example-navbar-collapse-1" aria-expanded="false">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

            </div>

            <div class="navbar-header">
                <a class="navbar-brand" href="#"> <img src="images/DS2.png"> </a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <form class="navbar-form navbar-left" style="padding-top: 8px">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="input-group">
								    <span class="input-group-btn">
								    	<button type="button" class="btn btn-default" aria-label="Left Align">
  											<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
										</button>
								    </span>
                                <input type="text" class="form-control" placeholder="Search for...">
                            </div><!-- /input-group -->
                        </div><!-- /.col-lg-6 -->
                    </div>
                </form>
                <ul class="nav navbar-nav navbar-right"> <!--It took navbar right so it went right-->
                    <p>
                        <button type="button" class="btn btn-default" onclick="location.href='login.html'" style="margin-top: 2px;width: 120px">Log In</button> <!--Edit-->
                    </p>
                </ul>
            </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
        <!-- End of the Container-->
        </div>
    </nav>
    <!--End Navbar-->

<?php  
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{   
    
        $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    
        if (!checkDB('user', 'email', $email)) 
        {   

            $fname = filter_var($_POST['fname'], FILTER_SANITIZE_STRING);
            $lname = filter_var($_POST['lname'], FILTER_SANITIZE_STRING);
            $password = sha1(filter_var($_POST['pass2'], FILTER_SANITIZE_STRING));
            $img=0;
            $query = $con->prepare("INSERT INTO `user` (`fname`,`lname`, `email`, `password`, `img`) VALUES (?,?,?,?,?)");
            $query->execute(array($fname, $lname, $email, $password, $img));
            if ($query->rowCount() > 0) 
            {
                header('Location:bs/index.php');
                exit();
            }
        }
        else 
            ?>
        <h2 style="margin-top: 80px; text-align: center">Already Exists</h2>
<?php } else { ?>
        <div class="Container">
            <div class="row">
                <div class="col-xs-6 col-md-3">
                    <div class="profile-userpic" style="margin-top: 150px;margin-left: 50px;">
                        <img src="images/Anon.png" alt="..." id="item">
                    </div>
                </div>
                <div class="col-xs-8">
                    <form style="border:5px; margin-top: 120px;" method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">
                        <div class="form-group">
                            <label for="exampleInputName1">First name</label>
                            <input type="text" name="fname" class="form-control" id="exampleInputName1" placeholder="First Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputName1">Last name</label>
                            <input type="text" name="lname" class="form-control" id="exampleInputName2" placeholder="Last Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Email address</label>
                            <input type="email" name="email" class="form-control" id="exampleInputEmail1" placeholder="Email">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Password</label>
                            <input type="password" name="pass2" class="form-control" id="exampleInputPassword1" placeholder="Password">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputFile">Profile photo</label>
                            <input type="file" id="exampleInputFile">
                            <p class="help-block">Upload profile picture</p>
                        </div>
                        <div class="checkbox">
                            <label>
                                <input type="checkbox"> DELETE IF NOT NEEDED
                            </label>
                        </div>
                        <button type="submit" class="btn btn-warning" style="width:150px;">Submit</button>
                        <button type="reset" class="btn btn-default">Cancel</button>
                    </form>
                </div>
            </div>
        </div>

        <script src="js/jquery-1.11.1.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/plugins.js"></script>
    </body>
</html>
<?php } ?>