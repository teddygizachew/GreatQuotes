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
  $add_quote = $author_index.';'.$new_quote;
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
</head>

<body>
  <form action="" method="POST">
    Enter a quote add:
    <input type="text" name="new_quote" required><br />
    <p>
      Author name:
      <select name="formSubmit">
        <option selected>Select...</option>
        <?php
        display_select_box($authors_array);
        ?>
      </select>
    </p>
    <button type="submit">Add quote</button>
  </form>


</body>

</html>