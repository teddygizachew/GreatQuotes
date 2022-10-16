<?php
include '../csv_util.php';
$line_counter = 0;
$index = $_GET['index'];
$authors_array = read_csv('../data/authors.csv');
$author_name = $authors_array[$index];

function printQuote($filename,$index){
    $fh=fopen('../data/quotes.csv', 'r');

    $i=0;
    while($line=fgets($fh)) {
    $line_array = explode(";",$line);
    if ($index==trim($line_array[0])) {
        echo "\"".$line_array[1]."\"<br>";
    }
    $i = $i + 1;
    }
    fclose($fh);
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
  <link rel="stylesheet" href="../create.css">
</head>

<body>

<div class="home-page-link">
    <a class="homeLink" href="../index.php">
      <img src="../assets/home.svg" alt="">
    </a>
  </div>

<h1 class="top-header"><?= $author_name ?></h1>

<div class="center-screen">
<?= printQuote('../data/quotes.csv', $index) ?>
</div>

<script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>