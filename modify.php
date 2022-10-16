<?php
include 'csv_util.php';

$authors_filename = 'data/authors.csv';
$authors = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';
$quotes = read_csv($quotes_filename);

if (isset($_POST['quote'])) {
  $index = $_GET['quote_id'];
  $new_quote = $_GET['author_index'] . ';' . trim($_POST['quote']);
  echo '<br/>';
  echo $new_quote;
  echo '<br/>';
  $modified = modify_element($quotes_filename, $index, trim($new_quote));
  // echo "<meta http-equiv='refresh' content='0'>";
  // if ($modified) {
  //   echo 'You\'ve successfully modified the quote by' . $_POST['author'];
  //   echo '<br/>';
  //   echo 'Go to <a href="detail.php">Detail Page</a>' . ' page';
  // }
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
    <p>Modify the Quote</p>
    <!-- <label for="author">Author</label> -->
    <!-- <input name="author" type="text" placeholder="asas" value="
      <?php
      echo $authors[$_GET['author_index']];
      ?>
    ">
    <br /> -->

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Quote</label>
      <!-- <input type="text" name="new_quote" class="form-control" id="exampleFormControlInput1" placeholder="Knowledge is power" required> -->
      <input name="quote" type="text" placeholder="asas" class="form-control" value="<?php
                                                                                      $split_quote = explode(';', $quotes[$_GET['quote_id']]);
                                                                                      echo $split_quote[1];
                                                                                      ?>">
    </div>

    <!-- <label for="quote">Quote: </label> -->
    <!-- <input name="quote" type="text" placeholder="asas" value="<?php
                                                                    $split_quote = explode(';', $quotes[$_GET['quote_id']]);
                                                                    echo $split_quote[1];
                                                                    ?>"> -->
    <br />
    <button type="submit" class="btn btn-outline-success">Modify</button>
  </form>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>