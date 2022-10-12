<?php
include 'csv_util.php';

$authors_filename = 'data/authors.csv';
$authors = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';
$quotes = read_csv($quotes_filename);

if (isset($_POST['quote'])) {
  $index = $_GET['id'];
  $new_quote = $_POST['quote'];
  $modified = modify_element($quotes_filename, $index, $new_quote);
  // echo "<meta http-equiv='refresh' content='0'>";
  if ($modified) {
    echo 'You\'ve successfully modified the quote by' . $_POST['author'];
    echo 'Got to <a href="deatil.php">Detail Page</a>' . ' page';
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
  <form action="" method="POST">
    <p>Modify the Quote</p>
    <br />
    <label for="author">Author</label>
    <input name="author" type="text" placeholder="asas" value="
      <?php
      echo $authors[$_GET['author_index']];
      ?>
    ">
    <br />
    <label for="quote">Quote</label>
    <input name="quote" type="text" placeholder="asas" value="
      <?php
      echo $quotes[$_GET['quote_id']];
      ?>
    ">
    <br />
    <button type="submit">Modify</button>
  </form>
</body>

</html>