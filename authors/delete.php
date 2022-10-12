<?php
$author_to_be_deleted = $_GET['index'];

$line_counter = 0;
$new_file_content='';
$fh = fopen('../data/authors.csv', 'r');
while($line=fgets($fh)) {
  if ($line_counter == $_GET['index']) {
    $new_file_content.=PHP_EOL;
  }
  else{
    $new_file_content.=$line;
  }
  $line_counter++;
}
fclose($fh);

file_put_contents('../data/authors.csv', $new_file_content);
?>

// http://localhost/NKU/Great_Quotes/authors/delete.php?index=2