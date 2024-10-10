<?php
$success = 0;
$user = 0;

//if server connects properly
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `registration` WHERE username = '$username'";

    $result = mysqli_query($con, $sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            // echo "User already exist";
            $user = 1;
        } else {
            $sql = "INSERT INTO `registration`(username, password) values('$username', '$password')";
            $result = mysqli_query($con, $sql);
    
            if($result){
                // echo "Data inserted in database successfully"
                $success = 1;
                header('location:signin.php');
            } else {
                die(mysqli_error($con));
            }
        } 
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- Style for alert because it won't work in external CSS -->
    <style>
        .alert {
            padding: 20px;
            color: white;
        }

        .alert.success {
            background-color: #04AA6D;
        }

        .alert.danger {
            background-color: #f44336;
        }

        .closebtn {
            margin-left: 15px;
            color: white;
            font-weight: bold;
            float: right;
            font-size: 22px;
            line-height: 20px;
            cursor: pointer;
            transition: 0.3s;
        }

        .closebtn:hover {
            color: black;
        }
    </style>

    <link rel="stylesheet" href="styles.css">
    <title>Sign Up Page</title>
</head>
<body>

    <h1 class="h1center">Sign Up</h1>

    <div class="container">
        <form action="signup.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Sign Up">

            <!-- If it's already added -->
            <?php 
            if($user) {
                echo '
                <div class="alert danger">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Oops!</strong> Someone already exist
                </div>';
            } ?>

            <!-- If it's not added -->
            <?php
            if($success) {
                echo '
                <div class="alert success">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Success!</strong> You are now added!
                </div>';
            } ?>
        </form>
    </div>
</body>
</html>