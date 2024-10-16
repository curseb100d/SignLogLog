<?php
$success = 0;
$user = 0;
$invalid = 0;

//if server connects properly
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirmpassword = $_POST['confirmpassword'];

    $sql = "SELECT * FROM `registration` WHERE username = '$username'";

    $result = mysqli_query($con, $sql);
    if($result){
        $num = mysqli_num_rows($result);
        if($num > 0){
            // echo "User already exist";
            $user = 1;
        } else {
            if($password === $confirmpassword){
                //Hash the password to prepare it for database
                $hash_password = password_hash($password, PASSWORD_DEFAULT);

                $sql = "INSERT INTO `registration`(username, password) VALUES('$username', '$hash_password')";
                $result = mysqli_query($con, $sql);
        
                if($result){
                    // echo "Data inserted in database successfully"
                    $success = 1;
                    header('location:signin.php');
                }
            } else {
                // die(mysqli_error($con));
                $invalid = 1;
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

            <label for="confirmpassword">Confirm Password</label>
            <input type="password" id="confirmpassword" name="confirmpassword">

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

            <!-- If password not match -->
            <?php
            if($invalid) {
                echo '
                <div class="alert warning">
                    <span class="closebtn" onclick="this.parentElement.style.display=\'none\';">&times;</span> 
                    <strong>Warning!</strong> Password not match!
                </div>';
            } ?>
        </form>
    </div>
</body>
</html>