<?php

?>
<html>
	<head>
 		<title>Video</title>
 		<meta charset="utf-8">
 		<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    	<meta name="viewport" content="width=device-width">
    	<!-- Second Meta is Internet Explorer Compatibility and second is Third Mobile Meta -->
 		<link rel="stylesheet" href="../css\bootstrap.css">
 		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
 		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
  		<link rel="stylesheet" href="../css\style.css">
 		
 	</head>
 	<body>
 		<!--Start Navbar-->
		<nav class="navbar navbar-default navbar-inverse navbar-fixed-top">
			<div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header">
			      <a class="navbar-brand" href="#"> <img src="../images/DS2.png"> </a>
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
							    	<input type="text" class="form-control" placeholder="Search...">
							    </div><!-- /input-group -->
						    </div><!-- /.col-lg-6 -->
					    </div>
			    	</form>
			    </div><!-- /.navbar-collapse -->
			</div><!-- /.container-fluid -->
			  <!-- End of the Container-->
		</nav>
		<!--End Navbar-->
		<!--Video-->
		<div class="row">
			<div class="col-sm-7" style="padding-top: 110px; padding-left: 40px;">
				<!-- 16:9 aspect ratio -->
				<div class="embed-responsive embed-responsive-16by9">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $_POST['id'];?>?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
				</div>
			</div>
			<div class="col-sm-5" style="padding-top: 120px; padding-right: 50px;">
				<div class="panel panel-warning">
					<div class="panel-footer">
						<b><h4><?php echo $_POST['title'];?></h4></b>
						<div >
							<div class="rating">
					            <span class="rating-star" data-value="5"></span>
					            <span class="rating-star" data-value="4"></span>
					            <span class="rating-star" data-value="3"></span>
					            <span class="rating-star" data-value="2"></span>
					            <span class="rating-star" data-value="1"></span>
					        </div>
					        
					        <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
					        <script>
					        $('.rating-star').click(function() {
					            $(this).parents('.rating').find('.rating-star').removeClass('checked');
					            $(this).addClass('checked');
					                
					            var submitStars = $(this).attr('data-value');
					        });
					        </script>
						</div>
					</div>
					<div class="panel-body" style="/*background-color: rgba(252, 253, 149, 0.3)*/"><?php echo $_POST['description'];?></div>
				</div>

			</div>
		</div>
	

		
		<div class="row" style="padding-top: 50px; padding-left: 100px; padding-bottom: 0px; margin-bottom: 50px;">
			<a href="#">	
				<div class="col-sm-4 col-md-2">
				    <div class="thumbnail">
				    	<img src="../MN24.jpg" alt="...">
				    </div>
				</div>
				<div class="col-sm-6 col-md-6">
					<div class="caption">
					    <h3>Thumbnail label</h3>
					    <p>Lorem ipsum dolor sit amet, eu aperiam luptatum abhorreant mel, ignota pericula deseruisse eos cu.Lorem ipsum dolor sit amet, eu aperiam luptatum abhorreant mel, ignota pericula deseruisse eos cu.Lorem ipsum dolor sit amet, eu aperiam luptatum abhorreant mel, ignota pericula deseruisse eos cu.</p>
					</div>
				</div>
			</a>
		</div>
		<!----------------------------------------------->
		
 		<script src="js\jquery-1.11.1.min.js"></script>
 		<script src="js\bootstrap.min.js"></script>
 	</body>
</html>