<?php
include 'auth.php';

session_start();
// if the user is alreay signed in, redirect them to the members_page.php page

// use the following guidelines to create the function in auth.php
//instead of using "die", return a message that can be printed in the HTML page
if (count($_POST) > 0) {
  // 1. check if email and password have been submitted
  // 2. check if the email is well formatted
  // 3. check if the password is well formatted
  // 4. check if the file containing banned users exists
  // 5. check if the email has been banned
  // 6. check if the file containing users exists
  // 7. check if the email is registered
  // 8. check if the password is correct
  // 9. store session information
  // 10. redirect the user to the members_page.php page

  signin();
  /*
	echo 'check email+password';
	if(true){
		$_SESSION['logged']=true;
		
	}else $_SESSION['logged']=false;
	*/
}

// improve the form
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="create.css">
</head>

<body>
  <form method="POST" class="center-screen">

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Email</label>
      <input type="email" name="email" class="form-control" id="exampleFormControlInput1" placeholder="Email" required>
    </div>

    <div class="form-group" style="width: 18rem;">
      <label for="exampleFormControlInput1">Password</label>
      <input type="password" name="password" class="form-control" id="exampleFormControlInput1" placeholder="Password" required>
    </div>

    <div class="add-button-div">
      <button type="submit" class="btn btn-outline-primary">Log in</button>
    </div>
  </form>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>