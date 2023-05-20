<?php
    session_start();

    if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true) {
        header("Location: login.php");
        exit;
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <title>Profile Page</title>
</head>
<body>
    <?php
       $username = $_SESSION['username'];
       echo "<div class='bg-light text-warning display-6' style='font-size: 30px;'>
                Welcome back <strong class='text-info'>$username</strong>
            </div>"
    ?>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body>
</html>