<?php
include 'csv_util.php';

$authors_filename = 'data/authors.csv';
$authors_array = read_csv($authors_filename);

$quotes_filename = 'data/quotes.csv';
$quotes_array = read_csv($quotes_filename);

function show_each_quote($quotes_array, $authors_array, $index)
{
  foreach ($quotes_array as $line) {
    $quote_line = explode(';', $line);
    $author_index = $quote_line[0];
    $single_quote = $quote_line[1];
    if ($index == $author_index) {
      // echo $author_index . ' ---> ' . $single_quote;
      echo "<p>" . '<a href="detail.php?id=' . $index . '&name=' . $authors_array[$index] . '">' . $single_quote . '</a>' . "</p>";
      // echo '<p>' . $single_quote . '</p>';
      // echo '<br/>';
      // return $single_quote;
    }
  }
}

function display_datas($authors_array, $quotes_array)
{
  $i = 0;
  while ($i < count($authors_array)) {
    echo
    '
  <table style="table-layout:fixed" cellspacing=1 cellpadding=2 width="25%" border="1">
    <tr>
      <td>' . $authors_array[$i] . '</td>
      <td>
        ' . show_each_quote($quotes_array, $authors_array, $i) . '
        
      </td>
    </tr>
  </table>
  ';
    $i += 1;
  }
}

// $i = 0;
// while ($i < count($authors)) {
//   echo "<tr>";
//   echo "<td>" . $authors[$i] . "</td>";
//   echo "<td>" . '<a href="detail.php?id=' . $i . '&name=' . $authors[$i] . '">' . $quotes[$i] . '</a>' . "</td>";
//   echo "</tr>";
//   $i += 1;
// }

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
  <table style="table-layout:fixed" cellspacing=1 cellpadding=2 width="25%" border="1">
    <tr>
      <th>Author</th>
      <th>Quotes

      </th>
    </tr>

    <?php
    display_datas($authors_array, $quotes_array);
    ?>
  </table>
  <br />
  <a href="create.php">
    <button type="submit">Create quote</button>
  </a>

  <!-- <table border="5px" bordercolor="#8707B0">
    <tr>
      <td>Left side of the main table</td>
      <td>
        <table border="5px" bordercolor="#F35557">
          <h4 align="center">Nested Table</h4>
          <tr>
            <td>nested table C1</td>
            <td>nested table C2</td>
          </tr>
          <tr>
            <td>nested table</td>
            <td>nested table</td>
          </tr>
        </table>
      </td>
    </tr>
  </table> -->

</body>

</html>