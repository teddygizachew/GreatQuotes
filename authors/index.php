<?php
include '../csv_util.php';

$authors_filename = '../data/authors.csv';
$authors_array = read_csv($authors_filename);

function display_authors($authors_array)
{
  foreach ($authors_array as $authors) {
    echo '<h4>' . $authors . '<h4/>';
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
  <h1>Authors name</h1>
  <?php
  display_authors($authors_array);
  ?>
</body>

</html>