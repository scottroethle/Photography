<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsImage
 *
 * @author sroethle
 */
class clsImage {
    var $imageID;
    var $imageName;
    var $imageDescription;
    var $price;
    var $city;
    var $state;
    var $park;
    
    function __construct($imageID, $imageName, $imageDescription, $price, $city, $state, $park) {
        $this->imageID = $imageID;
        $this->imageName = $imageName;
        $this->imageDescription = $imageDescription;
        $this->price = $price;
        $this->city = $city;
        $this->state = $state;
        $this->park = $park;
    }
 
    function getImageID() {
        return $this->imageID;
    }

    function getImageName() {
        return $this->imageName;
    }

    function getPrice() {
        return $this->price;
    }

    function getCity() {
        return $this->city;
    }

    function getState() {
        return $this->state;
    }

    function getPark() {
        return $this->park;
    }

    function setImageID($imageID) {
        $this->imageID = $imageID;
    }

    function setImageName($imageName) {
        $this->imageName = $imageName;
    }

    function setPrice($price) {
        $this->price = $price;
    }

    function setCity($city) {
        $this->city = $city;
    }

    function setState($state) {
        $this->state = $state;
    }

    function setPark($park) {
        $this->park = $park;
    }
    
            public static function GetImageByID($imageID) {
        $objdb = new myDatabaseConnector();

        $result = $objdb->GetImageByID($imageID);

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

            }
        }

        return $objImage;
    }



}
