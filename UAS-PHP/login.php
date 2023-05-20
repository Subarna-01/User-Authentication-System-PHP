<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/login.css">
    <title>Login</title>
</head>
<body>
    <?php
        error_reporting(0);

        require 'database/database.php';

        $username = $_POST["username"];
        $password = hash("md5",$_POST["password"]);

        $login = false;
        $error_msg = false;

        if (isset($_POST["login"])) {
            $sql = "select * from users where username='$username' and password='$password'";
            $result = mysqli_query($conn,$sql);
            $num = mysqli_num_rows($result);
            if ($num == 1){
                $login = true;
                session_start();
                $_SESSION["loggedin"] = true;
                $_SESSION["username"] = $username;
                header("Location: profile.php");
            } else {
                $error_msg = "Invalid credentials";
            }
        }
    ?>
    <div class="login-form card">
        <div class="card-body">
            <form action="login.php" method="post">
            <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" id="username" name="username">
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" id="password" name="password">
            </div>
            <div class="mb-3 d-grid">
                <button type="submit" name="login" class="btn btn-primary">Login</button>
            </div>
            </form>
        </div>
    </div>
    <?php
        if($login) {
            echo '<div class="alert alert-primary" role="alert">
                        You are logged in.
                    </div>';
        }
        if($error_msg) {
            echo '<div class="alert alert-danger" role="alert">
                        Error : Invalid user credentials!
                    </div>';
        }
    ?>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body>
</html>