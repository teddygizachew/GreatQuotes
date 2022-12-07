<?php

include 'auth.php';
include 'csv_util.php';

session_start();
// if the user is alreay signed in, redirect them to the members_page.php page
// use the following guidelines to create the function in auth.php
// instead of using "die", return a message that can be printed in the HTML page
if (count($_POST) > 0) {
  // check if the fields are empty
  if (!isset($_POST['email'])) die('please enter your email');
  if (!isset($_POST['password'])) die('please enter your email');

  // check if the email is valid
  if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) die('Your email is invalid');

  // check if password length is between 8 and 16 characters
  if (strlen($_POST['password']) < 8 && $_POST['password'] > 16) die('Please enter a password between 8 and 16 characters');


  // check if the password contains at least 2 special characters
  $regex = "/[^a-zA-Z0-9]/";

  // Use preg_match to check if the password contains at least 3 special characters
  if (!preg_match($regex, $_POST['password']) >= 2) {
    die('Your password needs to have more than 2 special characters');
  }
  // check if the file containing banned users exists
  if (contain_element('data/banUser.csv', $_POST['email'])) die('You are a banned user');
  // check if the email has not been banned
  // check if the file containing users exists
  // check if the email is in the database already
  if (contain_element('data/users.csv', $_POST['email'])) die('You are a already have an account with this email');
  // encrypt password
  // save the user in the database 
  // show them a success message and redirect them to the sign in page

  signup();
}

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
      <button type="submit" class="btn btn-outline-primary">Create account</button>
    </div>
  </form>

  <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
  </script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>