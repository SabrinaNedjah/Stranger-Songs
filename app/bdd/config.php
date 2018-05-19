
<?php
/*
INSERT INTO tracks (Title, Artist, Time, Share) 
VALUES ('Dark sky', 'Luisa a.', 00, 'link'), ('Stranger things', 'Lola', 00, 'link')
*/

// BDD
define('DB_HOST', 'localhost');
define('DB_PORT', '8889');
define('DB_NAME', 'stranger_songs');
define('DB_USER', 'root');
define('DB_PASS', 'root');

// If there is an issue
try
{
    $pdo = new PDO('mysql:dbname='.DB_NAME.';host='.DB_HOST.';port='.DB_PORT, DB_USER, DB_PASS);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
}
catch(PDOException $e)
{
    die('Couldn\'t connect');
}

// Retrieve elements of the BDD
$query = $pdo->query('SELECT * FROM tracks'); 
$tracks = $query->fetchAll(); 
