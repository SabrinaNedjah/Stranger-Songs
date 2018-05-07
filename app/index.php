<?php
// Includes - Top
include 'partials/_header.php';
include 'partials/_menu.php';

// Routing
if(!isset($_GET['q'])){
$q = '';
}else{
$q = $_GET['q'];
}

switch ($q) {
    case '':
        $page = 'home';
        break;
    case $q === 'home':
        $page = 'home';
        break;
    case $q === 'about':
        $page = 'about';
        break;
    case $q === 'tracks':
        $page = 'tracks';
        break;
    default:
        $page = '404';
}

// Includes 
require 'pages/' . $page . '.php';
// Includes - Footer
include 'partials/_social.php';
include 'partials/_footer.php';
