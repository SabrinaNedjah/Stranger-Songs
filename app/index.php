<?php
// Routing
if(!isset($_GET['q'])){
$q = '';
}else{
$q = $_GET['q'];
}


if ($q === '') {
    $page = 'home';
} else if ($q === 'home') {
    $page = 'home';
} else if ($q === 'about') {
    $page = 'about';
} else if ($q === 'letsplay') {
    $page = 'letsplay';
} else if ($q === 'tracks') {
    $page = 'tracks';
} else {
    $page = '404';
}


include 'partials/_header.php';
include 'partials/_menu.php';
require 'pages/' . $page . '.php';
include 'partials/_social.php';
include 'partials/_footer.php';