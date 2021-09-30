<?php

require_once 'functions.php';

$bookTitle= ' ';
$author= ' ';
$yearPublished= ' ';
$coverType= ' ';
$condition= ' ';
$signed= ' ';
$image = ' ';

if(isset($_POST['title']) && isset($_POST['author']) && isset($_POST['published']) && isset($_POST['covertype']) && isset($_POST['condition']) && isset($_POST['signed']) && isset($_POST['image'])) {
    if((strlen($_POST['title'])
            || strlen($_POST['author'])
            || strlen($_POST['covertype'])
            || strlen($_POST['condition'])
            || strlen($_POST['image']) < 255)
        && (strlen($_POST['published']) === 4)
        && ($_POST['signed'] < 2));


    $bookTitle = $_POST['title'];
    $author = $_POST['author'];
    $yearPublished = $_POST['published'];
    $coverType = $_POST['covertype'];
    $condition = $_POST['condition'];
    $signed = $_POST['signed'];
    $image = $_POST['image'];
} else {
    echo 'Item name is too long or year entered is incorrect format';
    return $_POST = NULL;
}

    $dataOutput = cleanseData($_POST);

var_dump($dataOutput);

?>