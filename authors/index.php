<?php
include '../csv_util.php';
include '../auth.php';

session_start();

$authors_filename = '../data/authors.csv';
$authors_array = read_csv($authors_filename);

function display_authors($authors_array)
{
  $index = 0;
  foreach ($authors_array as $authors) {
    // echo '<h4>' . $authors . '<h4>';
    echo '<h4><a href=detail.php?index=' . $index . '>' . $authors . '</a><h4/>';
    $index++;
  }
}

function logged()
{
  if (logged_in()) {
    echo '
      <br/>
      <a href="create.php" class="link-tag">
        <button type="button" class="btn btn-success" type="submit">Create Author</button>
      </a>
    ';
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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="../create.css">
</head>

<body>
  <div class="home-page-link">
    <a class="homeLink" href="../index.php">
      <img src="../assets/home.svg" alt="">
    </a>
  </div>

  <h1 class="top-header">Authors name</h1>
  <div class="center-screen">
    <?php
    display_authors($authors_array);
    logged();
    ?>
  </div>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>