<?php
include 'csv_util.php';
include 'auth.php';


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

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="create.css">
</head>

<body>

  <h1 class="top-header">Great Quotes</h1>


  <div class="center-screen">
    <?php
    display_quotes($authors_array, $quotes_array);
    ?>

    <br />
    <div class="add-button-div">
      <a href="create.php" class="link-tag">
        <button type="button" class="btn btn-success" type="submit">Create Quote</button>
      </a>
      <a href="authors/index.php" class="link-tag">
        <button type="button" class="btn btn-primary" type="submit">View Authors</button>
      </a>
      <br>
      <br>
      <br>
      <a href="signup.php" class="link-tag">
        <button type="button" class="btn btn-outline-info" type="submit">Sign up</button>
      </a>
    </div>
  </div>


  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>

</html>