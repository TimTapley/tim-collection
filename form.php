<?php






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

    <header>
      <h1>My Collection of First Edition Books</h1>
    </header>
    <section class="new-books">
      <form method="post" action="output.php">
        <h3>New first editions to be added to collection</h3><br>
          <div class="title">
              <label for="title" >Book Title:</label>
              <input type="text" id="title" name="title" maxlength="255"  /><br><br>
          </div>

          <div class="author">
            <label for="author" >Author:</label>
            <input type="text" id="author" name="author" maxlength="255"  /><br><br>
          </div>

          <div>
              <label for="published" >Year published:</label>
              <input type="number" id="published" name="published" maxlength="4" min="0000" max="9999" /><br><br>
          </div>

          <div class="covertype">
            <label for="covertype" >Cover Type:</label>
            <input type="text" list="covertypes" id="covertype" name="covertype" maxlength="255"  /><br><br>
              <datalist id="covertypes">
                <option value="hardback"></option>
                <option value="softback"></option>
              </datalist>
          </div>

          <div>
            <label for="condition" >Condition:</label>
            <input type="text" list="conditions" id="condition" name="condition" maxlength="255"  /><br><br>
              <datalist id="conditions">
                  <option value="mint"></option>
                  <option value="good"></option>
                  <option value="fair"></option>
                  <option value="poor"></option>
              </datalist>
          </div>

          <div>
            <label for="signed" >Signed: 0 = No; 1 = Yes</label>
            <input type="number" id="signed" name="signed" min="0" max="1"  /><br><br>
          </div>

          <div>
            <label for="image" >Image URL:</label>
            <input type="text" id="image" name="image" maxlength="255"  /><br><br>
          </div>

          <input type="submit" value="Submit">
          <h4>Refresh page to clear form</h4>
          <div class="return-home">
              <h4><a href="index.php?message=1">Return to home page</a></h4>
          </div>

      </form>

<!--
    </section>










  </body>
