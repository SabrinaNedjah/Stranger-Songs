<?php

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
    case $q === 'letsplay':
        $page = 'letsplay';
        break;
    case $q === 'tracks':
        $page = 'tracks';
        break;
    case $q === 'category':
        $page = 'category';
        break;
    case $q === 'sequencer':
        $page = 'sequencer';
        break;
    default:
        $page = '404';
}

if ($q === 'record') {
    require 'pages/' . $q . '.php';
  } else {
    include 'partials/_header.php';
    include 'partials/_menu.php';
    require 'pages/' . $page . '.php';
    include 'partials/_social.php';
    include 'partials/_footer.php';
  }