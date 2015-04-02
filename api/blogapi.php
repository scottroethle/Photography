<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

require_once $_SERVER['DOCUMENT_ROOT'] . '/SRPhotography/model/clsBlogs.php';
require_once $_SERVER['DOCUMENT_ROOT'] . '/SRPhotography/model/clsBlog.php';
 
$blogs = clsBlogs::GetBlogs();
echo json_encode($blogs);
      
?>