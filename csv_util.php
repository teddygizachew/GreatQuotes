<?php

function read_csv($filename): array
{
  if (file_exists($filename)) {
    $fh = fopen($filename, 'r');

    $line_array = array();
    while ($line = fgets($fh)) {
      array_push($line_array, (trim($line)));
    }
    fclose($fh);
    return $line_array;
  } else {
    echo '404: File not found!';
  }
  return null;
}

function get_element($filename, $index)
{
  $line_array = read_csv($filename);
  return $line_array[$index];
}

function add_element($filename, $element)
{
  $error='';
  if (file_exists($filename)) {
    $fh = fopen($filename, 'r');

    while ($line = fgets($fh)) {
      if ($element == trim($line)) {
        // element already exists in our database
        $error = 'The element you\'re trying to add already exists';
      }
    }

    fclose($fh);
  } else {
    echo '404: File Does Not Exist!';
    return false;
  }

  if (strlen($error) > 0) {
    echo $error;
  } else {
    // Add the element to the csv file
    $fh = fopen($filename, 'a');
    fputs($fh, $element . PHP_EOL);
    fclose($fh);
    echo 'Thanks for adding ' . $element . ' to our website.';
    return true;
  }
  return false;
}

function modify_element($filename, $index, $element)
{
  $line_counter = 0;
  $new_file_content = '';
  $line_array = read_csv($filename);
  $fh = fopen($filename, 'r');
  while ($line = fgets($fh)) {
    if ($line_counter == $index) {
      if ($line_array[$line_counter] != $element) {
        $new_file_content .= $element . PHP_EOL;
      }
    } else {
      $new_file_content .= $line;
    }
    $line_counter++;
  }
  fclose($fh);

  file_put_contents($filename, $new_file_content);
  return true;
}

function empty_element($filename, $index)
{
  $line_counter = 0;
  $new_file_content = '';
  $fh = fopen($filename, 'r');
  while ($line = fgets($fh)) {
    if ($line_counter == $index) {
      $new_file_content .= PHP_EOL;
    } else {
      $new_file_content .= $line;
    }
    $line_counter++;
  }
  fclose($fh);

  file_put_contents($filename, $new_file_content);
}

function remove_element($filename, $index)
{
  $line_counter = 0;
  $new_file_content = '';
  $fh = fopen($filename, 'r');
  while ($line = fgets($fh)) {
    if ($line_counter == $index) {
      $new_file_content .= '';
    } else {
      $new_file_content .= $line;
    }
    $line_counter++;
  }
  fclose($fh);

  file_put_contents($filename, $new_file_content);
  echo 'You\'ve successfully deleted the quote';
}

function contain_element($filename, $element){
  if (file_exists($filename)) {
    $fh = fopen($filename, 'r');
    

    while ($line = fgets($fh)) {
        $line = explode(";",$line);
        if (trim($line[0])==trim($element)){
            return TRUE;
        }
    }
    return FALSE;
    fclose($fh);
    
  } else {
    echo '404: File not found!';
  }
  return null;
}

$filename = 'data/authors.csv';
// read_csv($filename);
// get_element($filename, 0);
// add_element($filename, ["Norwich", "eoeoe"]);
// empty_element($filename, 0);
// modify_element($filename, 5, 'teddy modified');
// remove_element($filename, 0)

// Make sure the name is not already in the file
// $error = '';
// if (file_exists('../data/authors.csv')) {
// $fh = fopen('../data/authors.csv', 'r');

// while ($line = fgets($fh)) {
// if ($_POST['name'] == trim($line)) {
// // name already exists in our database
// $error = 'The authors already exists';
// }
// }

// fclose($fh);
// }

?>

<!-- <form action="" method="POST">
  Enter the author's name<br />
  <input type="text" name="name"><br />
  <button type="submit">Add author</button>
</form> -->