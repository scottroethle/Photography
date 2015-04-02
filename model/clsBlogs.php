<?php
require_once 'myDatabaseConnector.php';
require_once 'clsBlog.php';
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of clsBlogs
 *
 * @author sroethle
 */
class clsBlogs extends ArrayObject{
    
    public static function GetBlogs() {
        $objdb = new myDatabaseConnector();
        $objBlogs = new clsBlogs();

        $result = $objdb->GetBlogs();

        if ($result) {

            while ($row = mysqli_fetch_array($result)) {

                $theBlogID = $row{"BlogID"};
                $theBlogDate = $row{"BlogDate"};
                $theBlogText = $row{"BlogText"};
                $theAuthor = $row{"Author"};
                $theImage = $row{"Image"};
                $theHeading = $row{"BlogHeading"};
                 $theIntro = $row{"BlogIntro"};
                
                 $objBlog = new clsBlog($theBlogID, $theBlogDate, $theBlogText, $theIntro, $theHeading, $theAuthor, $theImage);
               
                $objBlogs[] = $objBlog;
            }
        }

        return $objBlogs;
    }
    

    

}
