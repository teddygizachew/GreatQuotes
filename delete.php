<?php

include 'csv_util.php';
$quotes_filename = 'data/quotes.csv';
$quotes = read_csv($quotes_filename);


$quote_line = explode(';', $quotes[$_GET['quote_id']]);
$single_quote = $quote_line[1];

if (isset($_POST['delete'])) {
  echo '<br/>';
  remove_element($quotes_filename, $_GET['quote_id']);
  echo '
  <a href="detail.php?quote_id=' . $_GET['quote_id'] . '&author_index=' . $_GET['author_index'] . '">
    <button>Go Back to Details</button>
  </a>';
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
  <form action="" method="POST">
    Are you sure you want to delete the following quote?
    <button type="submit" name="delete" value="submit">Yes</button>
    <a href="detail.php">
      <button type="submit" value="submit">No</button>
    </a>

    <br />
    <br />
    <?php
    echo '"' . $single_quote . '"';
    ?>
  </form>
</body>

</html>