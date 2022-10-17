<?php
include '../csv_util.php';

if (!isset($_SESSION['logged']) && $_SESSION['logged'] = true) {
    die('Go away!');
}

if (!isset($_GET['index'])) {
    die('Please enter the author you want to modify');
}

$filename = '../data/authors.csv';
$authors_array = read_csv($filename);
$index = $_GET['index'];

if (count($_POST) > 0) {
    $name = $_POST['name'];
    $success = modify_element($filename, $index, $name);
    if (isset($success)) {
        header('Location: index.php');
    }
} else {
    $author_name = '';
    $line_counter = 0;
    $fh = fopen($filename, 'r');
    while ($line = fgets($fh)) {
        if ($line_counter == $index) {
            $author_name = trim($line);
        }
        $line_counter++;
    }
    fclose($fh);

?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>

        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <link rel="stylesheet" href="../create.css">
    </head>

    <body>

        <div class="home-page-link">
            <a class="homeLink" href="../index.php">
                <img src="../assets/home.svg" alt="">
            </a>
        </div>

        <div class="center-screen">
            <form method="POST" class="center-screen">
                <div class="form-group" style="width: 18rem;">
                    <h4 class="top-header" for="exampleFormControlInput1">Modify Author</h4>
                    <input type="text" name="name" class="form-control" id="exampleFormControlInput1" placeholder="<?= $authors_array[$index] ?>">
                </div>


                <div class="add-button-div">
                    <button type="submit" class="btn btn-outline-primary">Modify</button>
                </div>
            </form>
        </div>




        <script script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous">
        </script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    </body>

    </html>
<?php
}
