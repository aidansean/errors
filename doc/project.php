<?php
include_once($_SERVER['FILE_PREFIX']."/project_list/project_object.php") ;
$github_uri   = "https://github.com/aidansean/errors" ;
$blogpost_uri = "http://aidansean.com/projects/?tag=errors" ;
$project = new project_object("errors", "HTTP error pages", "https://github.com/aidansean/errors", "http://aidansean.com/projects/?tag=errors", "errors/images/project.jpg", "errors/images/project_bw.jpg", "As part of my webspace I wanted to add some humourous error pages to soften the blow when there's a problem.", "Tools,Meta,Web design", "Apache,CSS,HTML,PHP") ;
?>