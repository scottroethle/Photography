<?php
require_once 'myDatabaseConnector.php';
require_once 'clsImage.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsImages
 *
 * @author sroethle
 */
class clsImages extends ArrayObject{
    //put your code here
    
    public static function GetImagesByCity($cityName) {
        $objdb = new myDatabaseConnector();
        $objImages = new clsImages();

        $result = $objdb->GetImagesByCity($cityName);

        if ($result) {

            while ($row = mysqli_fetch_array($result)) {

                $theImageID = $row{"ImageID"};
                $theImageName = $row{"ImageName"};
                $theCity = $row{"City"};
                $theState = $row{"State"};
                $thePark = $row{"Park"};
                $thePrice = $row{"Price"};
                $theDescription = $row{"ImageDescription"};
                $objImage = new clsImage($theImageID, $theImageName, $theDescription, $thePrice, $theCity, $theState, $thePark);

                $objImages[] = $objImage;
            }
        }

        return $objImages;
    }
    
        public static function GetImagesByStatePark($statePark) {
        $objdb = new myDatabaseConnector();
        $objImages = new clsImages();

        $result = $objdb->GetImagesByStatePark($statePark);

        if ($result) {

            while ($row = mysqli_fetch_array($result)) {

                $theImageID = $row{"ImageID"};
                $theImageName = $row{"ImageName"};
                $theCity = $row{"City"};
                $theState = $row{"State"};
                $thePark = $row{"Park"};
                $thePrice = $row{"Price"};
                $theDescription = $row{"ImageDescription"};
                $objImage = new clsImage($theImageID, $theImageName, $theDescription, $thePrice, $theCity, $theState, $thePark);

                $objImages[] = $objImage;
            }
        }

        return $objImages;
    }
    
            public static function GetImagesByID($ID) {
        $objImages = new clsImages();

        $objImage = clsImage::GetImageByID($ID);
        $objImages[] = $objImage;

        return $objImages;
    }

}
