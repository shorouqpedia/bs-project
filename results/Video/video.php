 <html>
 <head>
    <title>DSheldon</title>
    <meta charset="UTF-8">
    <link href="https://fonts.googleapis.com/css?family=Oswald" rel="stylesheet">
    <link rel="shortcut icon" href="img\DS.png">
    <link href="https://fonts.googleapis.com/css?family=Crimson+Text" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css\style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
 </head>
     
<body>

    <ul class="ul">
  
        <li class="li" >
            <a href="D:\Graduation Project\Project\Sign up\Sign up.html">Sign up</a>
        </li>
  
        <li class="li" >
            <a href="D:\Graduation Project\Project\Log in\Log in.html">Log in</a>
        </li>
  
        <li class="li">
            <a href="#questions">Questions</a>
        </li>
  
        <li style="float:left">
            <a href="/shtube/home/Home.php">
                <img src="img\DSheldon.png" height="70" width="250" style="padding-top: 0px">
            </a>
        </li>
  
        <li style="position:absolute;left:25%;top:2%;">
            <form class="Searching" action="">
                <input name="q" type="text" placeholder="Search" value="" id="ip1"/>
                <button style="color: #919191; position:absolute;left:93%;top:8%;" type="submit">
                    <i class="fa fa-search"></i>
                </button>
            </form>
        </li>
    </ul>
    
<?php 
    $video= $_GET['video'];
    $title= $_GET['title'];
    $desc= $_GET['d'];
   // echo $video
        
    
    ?>
	<div style="background-color: #18222B;background-size: cover;height: 100%;">
    
		<div style="position:absolute;left:20%;top:15%;">
     <iframe width="800" height="400"
             src="<?php echo $video ?>">
            </iframe>
            
         <br>    <?php echo $title ?>
		</div>
    <div class="rate" style="position:absolute;left:22%;top:85%;">
      <font style="font-family: small arial,sans-serif;color: #FCE300;">Relevance:</font>  
          <input type="radio" id="star5" name="rate" value="5" />
          <label for="star5" title="Very Relevent">5 stars</label>
          <input type="radio" id="star4" name="rate" value="4" />
          <label for="star4" >4 stars</label>
          <input type="radio" id="star3" name="rate" value="3" />
          <label for="star3" >3 stars</label>
          <input type="radio" id="star2" name="rate" value="2" />
          <label for="star2" >2 stars</label>
          <input type="radio" id="star1" name="rate" value="1" />
          <label for="star1" title="Not Relevent At All">1 star</label>
    </div>
    <div>
       <font style="color: #FCE300;font-size:11pt ;position:absolute;left:88%;top:93%; font-family: font-family: small arial,sans-serif;">Totally ripped off TØP<br/>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;and Google</font>
    </div>
	
</div>
  <script type="text/javascript" src="js/script.js"></script>
</body>
 </html>