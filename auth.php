<?php

function signup()
{
	if (count($_POST) > 0) {
		$fh = fopen('data/users.csv', 'a+');
		fputs($fh, $_POST['email'] . ';' . password_hash($_POST['password'], PASSWORD_DEFAULT) . PHP_EOL);
		fclose($fh);
		echo "You created your account. Sign in please.";
		return;
	}
}

function signin()
{
	session_start();

	// If user is already logged, they'll be taken to the private page
	if (isset($_SESSION['logged']) && $_SESSION['logged' == true]) {
		header('location: index.php');
	}

	if (count($_POST) > 0) {
		$fh = fopen('data/users.csv', 'r');
		while ($line = fgets($fh)) {
			$line = trim($line);
			$line = explode(';', $line);
			if ($line[0] == $_POST['email']) {
				if (password_verify($_POST['password'], $line[1])) {
					$_SESSION['logged'] = true;
					$_SESSION['email'] = $line[0];
					$_SESSION['products'] = [];
					header('location: index.php');
				} else die('Not today: You\'re password didn\'t match our records');
			}
		}
		fclose($fh);
		echo "Not today: you must create an account first";
		return;
	}
}

function logged_in()
{
	// return (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
	if (isset($_SESSION['logged']) && $_SESSION['logged'] == true) {
		return true;
	} else {
		return false;
	}
}
