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
} else if ($q === 'tracks') {
    $page = 'tracks';
} else {
    $page = '404';
}

// Includes
require '' . $page . '.php';