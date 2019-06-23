<?php
function checkDB($table,$col,$item) {
    global $con;
    $query = $con->prepare("SELECT * FROM $table WHERE $col=?");
    $query->execute(array($item));
    return $query->rowCount() > 0;
}
function onVideoUpload($id, $user_rating) {

    global $con;
    //Get Current Video Data
    $query = $con->prepare("SELECT * FROM `videos` WHERE id=?");
    $query->execute(array($id));
    $video_data = $query->fetch(PDO::FETCH_ASSOC)[0];
    //Calculate New Values
    $total_rating_count = $video_data['total_rating_count'] + 1;
    $total_rating = $video_data['total_rating'] + $user_rating;
    $new_average_rating = $total_rating / $total_rating_count;
    //Update Video Data
    $query = $con->prepare("UPDATE `videos` SET `total_rating_count`=?, `total_rating`=?, `average_rating`=? WHERE `id`=?");
    $query->execute(array($total_rating_count, $total_rating, $new_average_rating, $id));

    return $query->rowCount() > 0;
}
function upload_files($file) {
    $target_dir = substr(__DIR__, 0, -8). "images/uploads/profile/";
    echo $target_dir;
    $target_file = $target_dir . basename($file["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($file["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    // Check file size
    if ($file["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
        && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }
    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($file["tmp_name"], $target_file)) {
            echo "The file ". basename( $file["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    return $uploadOk ? $target_file : false;
}