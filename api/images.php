
<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once $_SERVER['DOCUMENT_ROOT'] . '/SRPhotography/model/clsImages.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SRPhotography/model/clsImage.php';
 
if(array_key_exists("City", $_GET)){
    $cityName = htmlspecialchars($_GET["City"]);
    $images = clsImages::GetImagesByCity($cityName); 
    echo json_encode($images);
}elseif(array_key_exists("StatePark", $_GET)){
    $statePark = htmlspecialchars($_GET["StatePark"]);
    $images = clsImages::GetImagesByStatePark($statePark);  
    echo json_encode($images);
}elseif(array_key_exists("ImageID", $_GET)){
    $imageID = htmlspecialchars($_GET["ImageID"]);
    $image = clsImage::GetImageByID($imageID);
    $images = clsImages::GetImagesByID($imageID); 
    echo json_encode($image);
}
