<?php
include '../csv_util.php';

session_start();


if (!isset($_SESSION['logged']) && $_SESSION['logged'] = true) {
  die('Go away!');
}

if (!isset($_GET['index'])) {
  die('Please enter the author you want to delete');
}

$fh = fopen('../data/quotes.csv', 'r');
$index = $_GET['index'];
$i = 0;
while ($line = fgets($fh)) {
  $line_array = explode(";", $line);
  if ($index == trim($line_array[0])) {
    remove_element('../data/quotes.csv', $i);
    $i = $i - 1;
  }
  $i = $i + 1;
}

empty_element('../data/authors.csv', $_GET['index']);

fclose($fh);


?>

<a href="index.php">back to index page</a>