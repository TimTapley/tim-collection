<?php

//connect to database
$db = new PDO('mysql:host=db; dbname=tim-collection', 'root', 'password');

//prepare statement to fetch player information and ratings from database
$query = $db->prepare("SELECT `id`,`title`, `author`, `covertype`, `published`, `condition`, `signed`,`image` FROM `first-editions`;");

//set fetch attribute to create resulting fetch as an associative array
$db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

//execute fetch to import data from database
$query->execute();


$firstEditions = $query->fetchAll();

echo '<pre>';
var_dump($firstEditions);
echo '</pre>';

foreach($firstEditions as $book) {
    echo 'Id: ' . $book['id'] . ', Title: ' . $book['title'] . ', Author: ' . $book['author'] . ', Covertype: ' . $book['covertype'] . ',Published: ' . $book['published'] . ', Condition: ' . $book['condition'] . ', Signed: ' . $book['signed'] . ', Image: ' . $book['image']  .'<br>';
}


?>