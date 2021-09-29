<?php

/**creates path to database and sets attributes for data retrieval
 * @return PDO
 */
function getDB() : PDO {
    $db = new PDO('mysql:host=db; dbname=tim-collection', 'root', 'password');
    $db->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $db;
}

function retrieveBooks($db) : array {
    $query = $db->prepare("SELECT `id`,`title`, `author`, `covertype`, `published`, `condition`, `signed`,`image` FROM `first-editions`;");
    $query->execute();
    return $query->fetchAll();
}

function displayBooks(array $firstEditions) : string {
    $displayString= '';

    foreach ($firstEditions as $book) {
        $signed = $book["signed"] == '1'? 'Yes': 'No';
//        $displayString .= '<div class="book">' .
//            $book['title'] . ' ' . $book['author'] . ' ' . $book['covertype'] . ' ' . $book['published'] . ' ' . $book['condition'] . ' ' . $book['signed'] . ' ' . $book['image'] . '</div>';
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