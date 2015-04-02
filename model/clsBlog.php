<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsBlog
 *
 * @author sroethle
 */
class clsBlog {
    var $blogID;
    var $blogDate;
    var $blogText;
    var $blogIntroText;
    var $blogHeading;
    var $author;
    var $image;
    
    function __construct($blogID, $blogDate, $blogText, $blogIntroText, $blogHeading, $author, $image) {
        $this->blogID = $blogID;
        $this->blogDate = $blogDate;
        $this->blogText = $blogText;
        $this->blogIntroText = $blogIntroText;
        $this->blogHeading = $blogHeading;
        $this->author = $author;
        $this->image = $image;
    }

            function getBlogID() {
        return $this->blogID;
    }

    function getBlogDate() {
        return $this->blogDate;
    }

    function getBlogText() {
        return $this->blogText;
    }

    function getAuthor() {
        return $this->author;
    }

    function setBlogID($blogID) {
        $this->blogID = $blogID;
    }

    function setBlogDate($blogDate) {
        $this->blogDate = $blogDate;
    }

    function setBlogText($blogText) {
        $this->blogText = $blogText;
    }

    function setAuthor($author) {
        $this->author = $author;
    }

        //put your code here
}
