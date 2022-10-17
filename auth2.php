<?php

function signup2()
{
	if (count($_POST) > 0) {
		$fh = fopen('users.csv', 'a+');
		fputs($fh, $_POST['email'] . ';' . password_hash($_POST['password'], PASSWORD_DEFAULT) . PHP_EOL);
		fclose($fh);
		echo "You created your account. Sign in please.";
		return;
	}

	// echo '<form method="POST">
	// 	<input type="email" name="email" placedholder="Email" />
	// 	<input type="password" name="password" placedholder="password" />
	// 	<input type="submit">Create Account</button>
	// </form>';	

}
?>


<?php
function signin2()
{
	session_start();

	if (count($_POST) > 0) {
		$fh = fopen('users.csv', 'r');
		while ($line = fgets($fh)) {
			$line = trim($line);
			$line = explode(';', $line);
			if ($line[0] == $_POST['email']) {
				if (password_verify($_POST['password'], $line[1])) {
					$_SESSION['logged'] = true;
					$_SESSION['email'] = $line[0];
					$_SESSION['products'] = [];
					header('location: private.php');
				} else die('Not today: incorrect password');
			}
		}
		fclose($fh);
		echo "Not today: you must ccreate an account first";
		return;
	}

	echo '<form method="POST">
	<input type="email" name="email" placeholder="Name"/>
	<input type="password" name="password" placeholder="Password"/>
	<button type="submit" value="submit">Submit</button>
</form>';
}
?>

<?php
function signout2()
{

	session_start();
	if (!isset($_SESSION['logged'])) header('location: public.php');
	unset($_SESSION['logged']);
	session_destroy();
	header("public.php");
}
?>

<?php
function is_logged()
{
	return (isset($_SESSION['logged']) && $_SESSION['logged'] == true);
}
?>