<?php
include 'csv_util.php';

$authors_filename = 'data/authors.csv';
$authors_array = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';
$quotes_array = read_csv($quotes_filename);

function display_quotes($authors_array, $quotes_array)
{
  $i = 0;

  while ($i < count($quotes_array)) {

    $quote_line = explode(';', $quotes_array[$i]);
    $author_index = $quote_line[0];
    $single_quote = $quote_line[1];
    echo '"<a href="detail.php?quote_id=' . $i . '&author_index=' . $author_index . '">' . $single_quote . '</a>"' . ' - ' . $authors_array[$author_index];
    echo '<br/>';
    $i += 1;
  }
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

  <?php
  display_quotes($authors_array, $quotes_array);
  ?>

  <br />
  <a href="create.php">
    <button type="submit">Create Quote</button>
  </a>

</body>

</html>