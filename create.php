<?php
include 'csv_util.php';

$authors_filename = 'data/authors.csv';
$authors_array = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';

function display_select_box($authors)
{
  $i = 0;
  foreach ($authors as $author) {
    echo '<option value="' . $i . '">' . $author . '</option>';
    $i += 1;
  }
}

if (isset($_POST['formSubmit'])) {
  $new_quote = $_POST['new_quote'];
  $author_index = $_POST['formSubmit'];
  $add_quote = $author_index . ';' . $new_quote;
  add_element($quotes_filename, $add_quote);
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

  <div class="home-page-link">
    <a class="homeLink" href="index.php">
      <img src="assets/home.svg" alt="">
    </a>
  </div>

  <form method="POST" class="center-screen">
    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Quote</label>
      <input type="text" name="new_quote" class="form-control" id="exampleFormControlInput1" placeholder="Knowledge is power" required>
    </div>

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlSelect1">Author</label>
      <select name="formSubmit" class="form-control" id="exampleFormControlSelect1">
        <?php
        display_select_box($authors_array);
        ?>
      </select>
    </div>
    <div class="add-button-div">
      <button type="submit" class="btn btn-outline-primary">Add quote</button>
    </div>
  </form>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>