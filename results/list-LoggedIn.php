<?php

/**
 * Library Requirements
 *
 * 1. Install composer (https://getcomposer.org)
 * 2. On the command line, change to this directory (api-samples/php)
 * 3. Require the google/apiclient library
 *    $ composer require google/apiclient:~2.0
 */
if (!file_exists(__DIR__ . '/vendor/autoload.php')) {
    throw new \Exception('please run "composer require google/apiclient:~2.0" in "' . __DIR__ .'"');
}
require_once __DIR__ . '/vendor/autoload.php';

$htmlBody = <<<END

<!--
<form method="GET">
  <div>
    Search Term: <input type="search" id="q" name="q" placeholder="Enter Search Term">
  </div>
  <div>
    Max Results: <input type="number" id="maxResults" name="maxResults" min="1" max="50" step="1" value="25">
  </div>
  <div>
    Category: 
    <select name="category">
        <option value="27">Education</option>
        <option value="28">Science & Technology</option>
    </select>
  </div>
  <input type="submit" value="Search">
</form>
-->

END;


$DEVELOPER_KEY = 'AIzaSyCU2BfMC9HnMvUMXm2pUhjGUBR8UPNzue8';


/**/
$categoriesUrl = "https://www.googleapis.com/youtube/v3/videoCategories?part=snippet&regionCode=US&key=" . $DEVELOPER_KEY;
/*
 * Send Request and receive data
 * */
$ch = curl_init();  // prepare the url

//Set the URL that you want to GET by using the CURLOPT_URL option.
curl_setopt($ch, CURLOPT_URL, $categoriesUrl);

//Set CURLOPT_RETURNTRANSFER so that the content is returned as a variable.
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

//Set CURLOPT_FOLLOWLOCATION to true to follow redirects.
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);

//Execute the request.
$data = curl_exec($ch);

//Close the cURL handle.
curl_close($ch);
$dataArray = json_decode($data);
//echo "<pre>";
//print_r($dataArray);
//echo "</pre>";
//Print the data out onto the page.


// This code will execute if the user entered a search query in the form
// and submitted the form. Otherwise, the page displays the form above.

// if (isset($_GET['q']) && isset($_GET['maxResults'])) {
if (true) {
    /*
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
//    $DEVELOPER_KEY = 'AIzaSyB2l9pxHd3duwcmGFUFsRAwL0dL0INwd6Q';
    $DEVELOPER_KEY = 'AIzaSyCU2BfMC9HnMvUMXm2pUhjGUBR8UPNzue8';

    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);

    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);

    $htmlBody = '';
    try {

        // Call the search.list method to retrieve results matching the specified
        // query term.
        $query = isset($_GET['q']) ? $_GET['q'] : 'hole';
        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $query,
            'maxResults' => 5 ,
            'type' => 'video',
            'videoCategoryId' => 27 ,   //education
        ));

        $videos = [];

        $channels = '';
        $playlists = '';




        // Add each result to the appropriate list, and then display the lists of
        // matching videos, channels, and playlists.
        // $videos = [];
        foreach ($searchResponse['items'] as $searchResult) {
            switch ($searchResult['id']['kind']) {
                case 'youtube#video':
                    //$videos .= sprintf('<li>%s (%s)</li>',
                    //    $searchResult['snippet']['title'], $searchResult['id']['videoId']);

                    $title = $searchResult['snippet']['title'];
                    $img = $searchResult['snippet']['thumbnails']['default']['url'];
                    $videoId = $searchResult['id']['videoId'];
                    $description = $searchResult['snippet']['description'];
                    $videoLink = 'https://www.youtube.com/watch?v=' . $videoId;
                    $video = array(
                        'title'=>$title,
                        'video'=>$videoLink,
                        'description'=>$description,
                        'img'=>$img,
                        'category'=>'Education',
                        'id' => $videoId
                    );
                    array_push($videos,$video);


                    break;
                case 'youtube#channel':
                    $channels .= sprintf('<li>%s (%s)</li>',
                        $searchResult['snippet']['title'], $searchResult['id']['channelId']);
                    break;
                case 'youtube#playlist':
                    $playlists .= sprintf('<li>%s (%s)</li>',
                        $searchResult['snippet']['title'], $searchResult['id']['playlistId']);
                    break;
            }
        }

        $searchResponse = $youtube->search->listSearch('id,snippet', array(
            'q' => $query,
            'maxResults' => 5 ,
            'type' => 'video',
            'videoCategoryId' => 28 ,   //education
        ));
        foreach ($searchResponse['items'] as $searchResult) {

            $title = $searchResult['snippet']['title'];
            $img = $searchResult['snippet']['thumbnails']['default']['url'];
            $videoId = $searchResult['id']['videoId'];
            $description = $searchResult['snippet']['description'];
            $videoLink = 'https://www.youtube.com/watch?v=' . $videoId;
            $video = array(
                'title'=>$title,
                'video'=>$videoLink,
                'description'=>$description,
                'img'=>$img,
                'category'=>'Science & Technology',
                'id' => $videoId
            );
            array_push($videos,$video);
        }

//        echo '<pre>';
//        print_r($searchResponse[2]['snippet']['thumbnails']);
//        echo '</pre>';
//
        /*
         * for($videos as $video) {?>
         * <div><?php echo $video['title'];?></div>
         * <video src="<?php echo $video['video'];?>"></video>
         * <?php}
         *
         *


    * */

//        echo '<pre>';
//        print_r($videos);
//        echo '</pre>';

        $htmlBody .= <<<END
<!--    <h3>Videos</h3>
    
    <h3>Channels</h3>
    <ul>$channels</ul>
    <h3>Playlists</h3>
    <ul>$playlists</ul>
    -->
END;
    } catch (Google_Service_Exception $e) {
        $htmlBody .= sprintf('<p>A service error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    } catch (Google_Exception $e) {
        $htmlBody .= sprintf('<p>An client error occurred: <code>%s</code></p>',
            htmlspecialchars($e->getMessage()));
    }
}

?>
<?php require_once "../partials/headers.php";?>
        <?php foreach($videos as $video) { ?>
		<!--First Video-->
        <div class="row" style="padding: 100px; padding-left: 200px; padding-bottom: 0px; margin-bottom: 50px;padding-top: 0px;">
<!--			<a href="--><?php //echo $video['video'] ;?><!--">-->
            <div>
				<div class="col-sm-4 col-md-2">
				    <div class="thumbnail">
				    	<img src="<?php echo $video['img'];?>" alt="...">
				    </div>
				</div>
				<div class="col-sm-6 col-md-8">
					<div class="caption">
					    <h3><?php echo $video['title'];?></h3>
					    <p><?php echo $video['description'];?></p>
                        <form action="./video-LoggedIn.php" method="post">
                            <input type="hidden" name="title" value="<?php echo $video['title'];?>">
                            <input type="hidden" name="description" value="<?php echo $video['description'];?>">
                            <input type="hidden" name="id" value="<?php echo $video['id'];?>">
                            <input type="submit" value="Watch" class="btn btn-primary">
                        </form>
<!--                        <div class="btn btn-primary">-->
<!--                            <a href="video-LoggedIn.php?id=--><?php //echo $video['id'];?><!--">Watch</a>-->
<!--                        </div>-->
					</div>
				</div>
            </div>
<!--			</a>-->
		</div>
<!--
<iframe width="560" height="315" src="https://www.youtube.com/embed/IuFM7A4-FW0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
-->
		<!----------------------------------------------->
        <?php } ?>
		<!--End First Video-->
<?php require_once "../partials/footer.php";?>