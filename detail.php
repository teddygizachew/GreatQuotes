<?php
include 'csv_util.php';

$authors_filename = 'data/authors.csv';
$authors = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';
$quotes = read_csv($quotes_filename);

function display_data($authors, $quotes)
{
  $quote_line = explode(';', $quotes[$_GET['quote_id']]);
  $single_quote = $quote_line[1];
  echo "<h1> \"{$single_quote}\" - {$authors[$_GET['author_index']]}</h1>";
  echo  '
  <a href="delete.php?quote_id=' . $_GET['quote_id'] . '&author_index=' . $_GET['author_index'] . '">
    <button>Delete Quote</button>
  </a>
  <br/>
  <br/>
  <a href="modify.php?quote_id=' . $_GET['quote_id'] . '&author_index=' . $_GET['author_index'] . '">
    <button>Modify</button>
  </a>
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
</head>

<body>
  <p>
    <?php
    display_data($authors, $quotes);
    ?>
  </p>
</body>

</html>