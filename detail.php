<?php
include 'csv_util.php';
include 'auth.php';

session_start();

$authors_filename = 'data/authors.csv';
$authors = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';
$quotes = read_csv($quotes_filename);

function display_btns()
{
  if (logged_in()) {
    $str = '
      <a href="delete.php?quote_id=' . $_GET['quote_id'] . '&author_index=' . $_GET['author_index'] . '" style="text-decoration: none;">
        <button type="button" class="btn btn-outline-danger">Delete Quote</button>
      </a>
      <a href="modify.php?quote_id=' . $_GET['quote_id'] . '&author_index=' . $_GET['author_index'] . '" style="text-decoration: none;">
        <button type="button" class="btn btn-outline-warning">Modify</button>
      </a>
    ';
    return $str;
  }
}

function display_data($authors, $quotes)
{
  $quote_line = explode(';', $quotes[$_GET['quote_id']]);
  $single_quote = $quote_line[1];
  echo  '
  <div class="card" style="width: 18rem;">
    <div class="card-body">
      <h5 class="card-title">' . $authors[$_GET['author_index']] . '</h5>
      <p class="card-text">' . $single_quote . '</p>'
    . display_btns(). '
    </div>
  </div>
  ';
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="create.css">
</head>

<body>

  <div class="center-screen">
    <?php
    display_data($authors, $quotes);
    ?>
  </div>


  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>