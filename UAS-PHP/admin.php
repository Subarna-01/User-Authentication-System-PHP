<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="static/css/bootstrap.min.css">
    <link rel="stylesheet" href="static/css/admin.css">
    <title>Admin</title>
</head>
<body>
    <div class="mb-4 text-primary text-center" style="height: 40px;font-size: 20px;">
        Users
    </div>
    <?php
        require 'database/database.php';

        $sql = "select * from users";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            echo "<table class='table'>";
                echo "<tr class='table-light'>";
                    echo "<th>User Id</th>";
                    echo "<th>Username</th>";
                    echo "<th>Email Address</th>";
                    echo "<th>Password</th>";
                echo "</tr>";

                while($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                        echo "<td>".$row["user_id"]."</td>";
                        echo "<td>".$row["username"]."</td>";
                        echo "<td>".$row["email_id"]."</td>";
                        echo "<td>".$row["password"]."</td>";
                    echo "</tr>";
                }

            echo "</table>";
        } else {
            echo "0 results";
        }
        mysqli_close($conn);
    ?>
    <script src="static/js/popper.min.js"></script>
    <script src="static/js/jquery.js"></script>
    <script src="static/js/bootstrap.min.js"></script>
</body>
</html>