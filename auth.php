<?php 

function signup()
{

  if (count($_POST) > 0) {
    echo 'dfhbvkhsdvkbhdsv';

    $fh = fopen('data/users.csv', 'a+');
    fputs($fh, $_POST['email'] . ';' . password_hash($_POST['password'], PASSWORD_DEFAULT) . PHP_EOL);
    fclose($fh);
    echo "You created your account. Sign in please.";
    return;
  }
}

?>