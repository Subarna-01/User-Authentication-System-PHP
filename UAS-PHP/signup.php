<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/signup.css">
    <title>Sign Up</title>
</head>
<body>
    <?php
        error_reporting(0);

        require 'database/database.php';

        $username = $_POST["username"];
        $password1 = hash("md5",$_POST["password1"]);
        $password2 = hash("md5",$_POST["password2"]);
        $email = $_POST["email"];

        $success_msg = false;

        if(isset($_POST["submit"]) && ($password1 == $password2)) {

            $sql = "insert into users (username,email_id,password) values ('$username', '$email', '$password1')";

            if (mysqli_query($conn, $sql)) {
                $success_msg = true;
            } else {
                echo "Error: " . $sql . "<br>" . mysqli_error($conn);
            }
            mysqli_close($conn);
        }
    ?>
    <div class="signup-form card">
        <span class="card-header">Sign Up Form!</span>
        <div class="card-body">
            <form action="signup.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="mb-3">
                <label for="password1" class="form-label">Password</label>
                <input type="password" class="form-control" id="password1" name="password1">
            </div>
            <div class="mb-3">
                <label for="password2" class="form-label">Confirm Password</label>
                <input type="password" class="form-control" id="password2" name="password2">
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="submit" class="btn btn-primary">Sign Up</button>
            </div>
            </form>
        </div>
    </div>
    <?php
    if($success_msg) {
        echo '<div class="alert alert-primary" role="alert">
                        Account created successfully!
                </div>';
    }
    ?>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body>
</html>