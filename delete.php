<?php

include 'csv_util.php';
$quotes_filename = 'data/quotes.csv';
$quotes = read_csv($quotes_filename);

if (!isset($_SESSION['logged']) && $_SESSION['logged'] = true) {
  die('Go away!');
}

$quote_line = explode(';', $quotes[$_GET['quote_id']]);
$single_quote = $quote_line[1];
// <a href="detail.php?quote_id=' . $_GET['quote_id'] . '&author_index=' . $_GET['author_index'] . '"> 
if (isset($_POST['delete'])) {
  echo '<br/>';
  remove_element($quotes_filename, $_GET['quote_id']);
  echo '
  <a href="index.php">
    <button>Go Back to HomePage</button>
  </a>';
}

if (isset($_POST['NotDelete'])) {
  header('Location: index.php');
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
  <form action="" method="POST" class="center-screen">
    Are you sure you want to delete the following quote?
    <button type="submit" class="btn btn-outline-danger" name="delete" value="submit">Yes</button>
    <a href="index.php">
      <button type="submit" name="NotDelete" value="submit" class="btn btn-outline-secondary">No</button>
    </a>

    <br />
    <br />
    <?php
    echo '"' . $single_quote . '"';
    ?>
  </form>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>