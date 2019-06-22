<html>
<head>
    <title>Navbar-NoLogIn</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Second Meta is Internet Explorer Compatibility and second is Third Mobile Meta -->
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<!--Start Navbar-->
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
            <form class="navbar-form navbar-left" style="padding-top: 8px" method="get" action="results/list-loggedIn.php">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="input-group">
								    <span class="input-group-btn">
								    	<button type="button" class="btn btn-default" aria-label="Left Align">
  											<span class="glyphicon glyphicon-search" aria-hidden="true"></span>
										</button>
								    </span>
                            <input type="text" name="q" class="form-control" placeholder="Search for...">
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

