<?php
include '../csv_util.php';

$authors_filename = '../data/authors.csv';
$authors_array = read_csv($authors_filename);

function display_authors($authors_array)
{
  $index=0;
  foreach ($authors_array as $authors) {
    // echo '<h4>' . $authors . '<h4>';
    echo '<h4><a href=detail.php?index='.$index.'>'.$authors.'</a><h4/>';
    $index++;
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
  
  <div class="home-page-link">
    <a class="homeLink" href="../index.php">
      <img src="../assets/home.svg" alt="">
    </a>
  </div>
    
  <h1>Authors name</h1>
  <?php
  display_authors($authors_array);
  ?>
</body>

</html>
