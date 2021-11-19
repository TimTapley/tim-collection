<?php

/**
 * creates path to database and sets fetch attributes for data retrieval
 *
 * @return PDO sets fetch attributes
 *
 * saves function output to $db
 */
function getDB() : PDO {
    $db = new PDO('mysql:host=db; dbname=tim-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

/**
 * creates fetch query to retrieve data from database
 *
 * @param $db input parameter for function
 * @return array
 *
 * retrieves data and creates an array captured in $query
 */
function retrieveBooks( PDO $db) : array {
    $query = $db->prepare("SELECT `id`,`title`, `author`, `covertype`, `published`, `condition`, `signed`,`image` FROM `first-editions`;");
    $query->execute();
    return $query->fetchAll();
}

/**
 * accesses data captured in $query array and concatenates into a string to be used with html
 *
 * @param array $firstEditions input parameter
 * @return string ordered string of data to be used with html
 *
 * displays output string which is placed in structured html
 */
function displayBooks(array $firstEditions) : string {
    if(!count($firstEditions)) {
        return 'Input error';
    }
    $displayString= '';

    foreach ($firstEditions as $book) {
        $signed = $book["signed"] == '1' ? 'Yes': 'No';

        $displayString .= '<article class="item">';
        $displayString .= '<div class="book">';
        $displayString .= '<img src="images/' . $book['image'] . '" alt="a picture of ' . $book['title'] . ' book cover" />';
        $displayString .= '<h1>' . $book["title"] . '</h1>';
        $displayString .= '</div>';
        $displayString .= '<div>';
        $displayString .= '<h2>Author: ' . $book['author'] . '</h2>';
        $displayString .= '<h3>Covertype: ' . $book["covertype"] . '</h3>';
        $displayString .= '<h3>Year published: ' . $book["published"] . '</h3>';
        $displayString .= '<h3>Condition: ' . $book["condition"] . '</h3>';
        $displayString .= '<h3>Signed: ' . $signed . '</h3>';
        $displayString .= '</div>';
        $displayString .='</article>';
    }

    return $displayString;
}


/**
 * Cleanses user input by converting special characters using filter_var()
 * @param array $postItems the $_POST superglobal that has been populated by user input
 * @return array the new array populated by cleansed user input
 */
function cleanseData(array $postItems) : array {
    if (!count($postItems)) {
        return 'Input error. Array doesn\'t exist.';
    }
    $cleansedArr = [];
    foreach($postItems as $postItem){
        $cleansedArr[] .= htmlspecialchars($postItem, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    return $cleansedArr;
}

function dbInsertion($db, array $cleansedArr) {

    $query = $db->prepare("INSERT INTO `first-editions` (`title`, `author`, `published`, `covertype`,  `condition`, `signed`,`image`)
    VALUES (:title, :author, :published, :covertype,  :condition, :signed, :image);");
    $query->execute(['title' => $cleansedArr[0], 'author' => $cleansedArr[1], 'published' => $cleansedArr[2], 'covertype' => $cleansedArr[3],
         'condition' => $cleansedArr[4], 'signed' => $cleansedArr[5], 'image' => $cleansedArr[6]]);
    $query->fetchAll();
}




