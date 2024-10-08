<?php

//if server connects properly
if($_SERVER['REQUEST_METHOD']=='POST'){
    include 'connect.php';
    $username = $_POST['username'];
    $password = $_POST['password'];

    // $sql = "INSERT INTO `registration`(username, password) values('$username', '$password')";
    // $result = mysqli_query($con, $sql);

    // if($result){
    //     echo "Data inserted in database successfully";
    // } else {
    //     die(mysqli_error($con));
    // }

    
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

    <h1 class="h1center">Sign Up</h1>

    <div class="container">
        <form action="sign_up.php" method="POST">
            <label for="username">Username</label>
            <input type="text" id="username" name="username">

            <label for="password">Password</label>
            <input type="password" id="password" name="password">

            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>