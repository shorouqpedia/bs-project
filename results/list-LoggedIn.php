<?php
require_once '../partials/init.php';




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

    /*
     * Set $DEVELOPER_KEY to the "API key" value from the "Access" tab of the
     * {{ Google Cloud Console }} <{{ https://cloud.google.com/console }}>
     * Please ensure that you have enabled the YouTube Data API for your project.
     */
    $DEVELOPER_KEY = 'AIzaSyCU2BfMC9HnMvUMXm2pUhjGUBR8UPNzue8';

    $client = new Google_Client();
    $client->setDeveloperKey($DEVELOPER_KEY);

    // Define an object that will be used to make all API requests.
    $youtube = new Google_Service_YouTube($client);

    $videos = array();
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

        foreach ($searchResponse['items'] as $searchResult) {


            $title = $searchResult['snippet']['title'];
            $img = $searchResult['snippet']['thumbnails']['default']['url'];
            $videoId = $searchResult['id']['videoId'];
            $description = $searchResult['snippet']['description'];

            $video = array(
                'title'=>$title,
                'description'=>$description,
                'img'=>$img,
                'category'=>'Education',
                'id' => $videoId
            );

            array_push($videos, $video);
            if (!checkDB('videos', 'youtube_id', $videoId))
            {
                $query = $con->prepare("INSERT INTO `videos` (`youtube_id`,`title`,`description`,`img`) VALUES (?,?,?,?)");
                $query->execute(array($videoId, $title, $description, $img));

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
                'description'=>$description,
                'img'=>$img,
                'category'=>'Science & Technology',
                'id' => $videoId
            );
            
            array_push($videos,$video);
            if (!checkDB('videos', 'youtube_id', $videoId))
            {
                $query = $con->prepare("INSERT INTO `videos` (`youtube_id`,`title`,`description`,`img`) VALUES (?,?,?,?)");
                $query->execute(array($videoId, $title, $description, $img));
            }
        }

    } catch (Google_Service_Exception $e) {
        echo htmlspecialchars($e->getMessage());
    } catch (Google_Exception $e) {
        echo htmlspecialchars($e->getMessage());
    }


?>
<?php require_once "../partials/headers.php";?>
<?php if (isset($_GET['id'])) { ?>
    <?php
        foreach ($videos as $video) {
            if ($video['id'] == $_GET['id']) {
                $current_video = $video;
                break;
            }
        }
    ?>
    <div class="row">
        <div class="col-sm-7" style="padding-top: 110px; padding-left: 40px;">
            <!-- 16:9 aspect ratio -->
            <div class="embed-responsive embed-responsive-16by9">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/<?php echo $current_video['id'];?>?rel=0" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
        <div class="col-sm-5" style="padding-top: 120px; padding-right: 50px;">
            <div class="panel panel-warning">
                <div class="panel-footer">
                    <b><h4><?php echo $current_video['title'];?></h4></b>
                    <?php if (isset($_SESSION['user'])) { ?>
                    <div>
                        <div class="rating">
                            <span class="rating-star" data-value="5"></span>
                            <span class="rating-star" data-value="4"></span>
                            <span class="rating-star" data-value="3"></span>
                            <span class="rating-star" data-value="2"></span>
                            <span class="rating-star" data-value="1"></span>
                        </div>

                        <script>
                        document.body.onload = function () {
                            $('.rating-star').click(function() {
                                $(this).parents('.rating').find('.rating-star').removeClass('checked');
                                $(this).addClass('checked');

                                var submitStars = $(this).attr('data-value');
                            });
                        };
                        </script>
                    </div>
                    <?php } ?>
                </div>
                <div class="panel-body" style="/*background-color: rgba(252, 253, 149, 0.3)*/"><?php echo $current_video['description'];?></div>
            </div>

        </div>
    </div>


<?php } ?>
    <h2 class="text-center" style="padding:10px 0 15px 0">Results for word: <strong><?php echo $query;?></strong></h2>
    <?php foreach($videos as $video) { ?>
    <!--First Video-->
    <div class="row" style="padding: 100px; padding-left: 200px; padding-bottom: 0px; margin-bottom: 50px;padding-top: 0px;">
        <div>
            <div class="col-sm-4 col-md-2" style="top:20">
                <div class="thumbnail">
                    <img src="<?php echo $video['img'];?>" alt="...">
                </div>
            </div>
            <div class="col-sm-6 col-md-8">
                <div class="caption">
                    <h3><?php echo $video['title'];?></h3>
                    <p><?php echo $video['description'];?></p>

                    <div class="btn btn-primary">
                        <a href="<?php echo $_SERVER['PHP_SELF'].'?id=' . $video['id'];?>">Watch</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php } ?>
    <!--End First Video-->
<?php require_once "../partials/footer.php";?>
