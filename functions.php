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
 * uses filter_var to cleanse data input and create an array of data entered
 *
 * @param array $formInput input parameter for cleanseData function
 * @return array|string[] verifies if string is returned and informs user if incorrect
 */
function cleanseData(array $formInput) : array {
    $dataEntered = [];
    foreach($formInput as $bookInfo){
        if(!is_string($bookInfo)){
            return ['Please check input and try again'];
        }
    }

    foreach($formInput as $data){
        $dataEntered[] .= htmlspecialchars($data, FILTER_SANITIZE_SPECIAL_CHARS);
    }

    return $dataEntered;
}

/**
 * prepares data for insert into database
 *
 * @param string $postTitle
 * @param string $postAuthor
 * @param string $postCoverType
 * @param int $postPublished
 * @param string $postCondition
 * @param int $postSigned
 * @param string $postImage
 */
function prepareData(string $postTitle, string $postAuthor, string $postCoverType, int $postPublished, string $postCondition, int $postSigned, string $postImage)  {

}
