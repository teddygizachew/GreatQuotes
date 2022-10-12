<?php 

$fh=fopen('../data/authors.csv', 'r');

while($line=fgets($fh)) {
  echo '<h1>'.trim($line).'<h1/>';
}

fclose($fh);
?>