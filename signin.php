<?php
$success = 0;
$deny = 0;

//if server connects properly
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM `registration` WHERE username = '$username' AND password = '$password'"; 

    $result = mysqli_query($con, $sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            $success = 1;
            session_start();
            $_SESSION['username']=$username;
            header('location:home.php');
        } else {
            $deny = 1;
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Sign in Page</title>
</head>
<body>

    <h1 class="h1center">Sign In</h1>

    <div class="container">
        <form action="signin.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Login">

            <!-- If Login Successful -->
            <?php 
            if($success) {
                echo '
                <div class="alert success">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Yay!</strong> You may now proceed to hell :)
                </div>';
            } ?>

            <!-- If Login not Successful -->
            <?php
            if($deny) {
                echo '
                <div class="alert danger">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Oops!</strong> Login Denied
                </div>';
            } ?>
        </form>
    </div>
</body>
</html>