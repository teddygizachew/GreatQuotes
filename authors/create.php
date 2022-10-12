<?php
if (count($_POST) > 0) {

  // Make sure the name is not already in the file
  $error = '';
  if (file_exists('../data/authors.csv')) {
    $fh=fopen('../data/authors.csv', 'r');

    while($line=fgets($fh)) {
      if ($_POST['name']==trim($line)) {
        // name already exists in our database
        $error = 'The authors already exists';
      }
    }
    
    fclose($fh);
  } else {
    echo '404: File Does Not Exist!';
  }
  
  if (strlen($error) > 0) {
    echo $error;
  }
  else {
    // Add the name to the csv file
    $fh = fopen('../data/authors.csv', 'a');
    fputs($fh, $_POST['name'].PHP_EOL);
    fclose($fh);
    echo 'Thanks for adding '.$_POST['name'].' to our website';
  }
}

?>

<form action="" method="POST">
  Enter the author's name<br/>
  <input type="text" name="name"><br/>
  <button type="submit">Add author</button>
</form>