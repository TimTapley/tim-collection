<?php
require_once 'functions.php';

$db = getDB();

$firstEditions = retrieveBooks($db);

$result = displayBooks($firstEditions);

?>

<!DOCTYPE html>

<html lang="en-GB">

  <head>
    <title>First Edition Collection </title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="normalize.css" type="text/css" />
    <link rel="stylesheet" href="styles.css" type="text/css" />
  </head>

  <body>
    <nav class="wide-nav">
      <a href="#">Home</a>
      <input class="search" type="text" placeholder="Search..">
    </nav>

    <header>
      <h1>My Collection of First Edition Books</h1>
    </header>

    <main class="container">
      <?php
        echo $result;
      ?>
    </main>

    <footer class="footer">
      <div>
        <h3>Check back for more first editions or contact me at:</h3>
      </div>
      <div class="email">
        <h3>Email:</h3>
        <a href="mailto:timtapley@aol.com">timtapley@aol.com</a>
      </div>
    </footer>

  </body>

</html>
